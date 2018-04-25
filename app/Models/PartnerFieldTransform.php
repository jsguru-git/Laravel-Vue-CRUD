<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;
use App\Models\PartnerField;
use App\Models\PartnerValueMaps;
use App\Models\Contact;
use App\Models\Finance;
use App\Models\Internal;
use App\Models\VerticalFha;
use App\Helpers\TransformHelper;

/**
 * Class Partnerfieldtransforms
 * @package App\Models
 */
class PartnerFieldTransform extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partnerfieldtransforms';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // protected $connection = 'mysql_contacts';

    /**
     * Mass Assign
     * @var array
     */
    protected $fillable = [
        'partner_id_left',
        'partner_id_right',
        'partnerfield_id_left',
        'partnerfield_name_left',
        'partnerfield_id_right',
        'partnerfield_name_right',
        'sanitizer',
        'validate',
        'transforms',
        'partnervaluemaps_id',
        'default_if_empty',
        'hardcoded',
        'required', // added by alexei 4/25/2018
        'note',
    ];

    /**
     * Rxmg partner id
     */
    const RXMG_PARTNER_ID = 5;

    /**
     * Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner_value_map()
    {
        return $this->belongsTo('App\Models\PartnerValueMaps', 'partnervaluemaps_id');
    }

    public function partner_field_left()
    {
        return $this->belongsTo('App\Models\PartnerField', 'partnerfield_id_left');
    }

    public function partner_field_right()
    {
        return $this->belongsTo('App\Models\PartnerField', 'partnerfield_id_right');
    }

    /**
     * Pass in a session_id and a partner to convert the session data to.
     * @param int $session_id
     * @param int $out_partner
     * @return array
     */
    public static function transformSession(int $session_id, int $out_partner)
    {
        $session = Session::where('id', '=', $session_id)->first();
        if (is_null($session)) {
            $session = collect([]);
        }
        $finance = Finance::where("session_id", $session_id)->first();
        if(is_null($finance)){
            $finance = collect([]);
        }
        $contact = Contact::where("session_id", $session_id)->first();
        if(is_null($contact)){
            $contact = collect([]);
        }
        $vert_fha = VerticalFha::where("session_id", $session_id)->first();
        if(is_null($vert_fha)){
            $vert_fha = collect([]);
        }
        $internal = Internal::where("session_id", $session_id)->first();
        if(is_null($internal)){
            $internal = collect([]);
        }

        $data = $session->toArray() + $finance->toArray() + $contact->toArray() + $vert_fha->toArray() + $internal->toArray();

        return self::transform(self::RXMG_PARTNER_ID, $out_partner, $data);
    }

    /**
     * @param $left_partner_id
     * @param $right_partner_id
     * @param array $data
     * @param bool $preserve_fields
     * @return array
     */
    public static function transform($left_partner_id, $right_partner_id, array $data, $preserve_fields = false)
    {
        // Send in a partner_id or a string
        if (!is_integer($left_partner_id)) {
            $left_partner_id = Partner::where('name', $left_partner_id)->first()->id;
        }
        if (!is_integer($right_partner_id)) {
            $right_partner_id = Partner::where('name', $right_partner_id)->first()->id;
        }


        $field_maps = self::where('partner_id_left', $left_partner_id)
            ->where('partner_id_right', $right_partner_id)
            ->with('partner_value_map')
            ->with('partner_field_left')
            ->with('partner_field_right')
            ->get();


        $out = [];
        // Note: All of the database calls have already happened.
        // The rest is done in memory.
        foreach ($field_maps as $map_row) {

            // get partner_left key
            $old_key = (!empty($map_row->partner_field_left)
                ? $map_row->partner_field_left->fieldname
                : null
            );
            $old_key = trim($old_key);

            // get partner right key
            $new_key = $map_row->partner_field_right->fieldname;
            $new_key = trim($new_key);


            // check if the value is null
            if (!isset($data[$old_key])) {
                $data[$old_key] = null;
            }

            $value = $data[$old_key];
            $value = trim($value);

            // set/return hardcoded value if it exists
            $hardcoded_value = $map_row->hardcoded;
            $hardcoded_value = $hardcoded_value;

            if (!self::is_empty($hardcoded_value)) {
                $out[$new_key] = $hardcoded_value;
                continue;
            }

            // pipeline
            $sanitizer = $map_row->sanitizer;
            $value = self::sanitizer($value, $sanitizer);

            // transformer
            $transforms = $map_row->transforms;
            $value = self::transformer($value, $transforms);

            // valuemaps
            if (isset($map_row->partner_value_map)) {

                $valuemaps = json_decode(self::remove_formatting(
                    $map_row->partner_value_map->valuemap
                ), TRUE);

                $value = self::mapper($value, $valuemaps);
            }

            // use default if empty
            $default_if_empty = $map_row->default_if_empty;
            if (self::is_empty($value)) {
                $value = $default_if_empty;
            }

            // do not include the field if we're not preserving fields
            if (self::is_empty($value) && !$preserve_fields) {
                continue;
            }

            $out[$new_key] = trim($value);

        }


        return $out;
    }

    /**
     * Returns true if value is: empty, null.
     *
     * @param $value
     * @return bool
     */
    private static function is_empty($value)
    {
        if (($value === 0) || $value==='0') {
            return false;
        }
        return empty($value);
    }

    /**
     * Removes any extra white spaces, tabs, newlines, any potential whitespace
     * fuckery that comes in from the database
     *
     * @param $value
     * @return mixed
     */
    private static function remove_formatting($value)
    {
        return preg_replace('/\s+/S', " ", $value);
    }

    /**
     * @param $value
     * @param $mapper
     * @return mixed
     */
    private static function sanitizer($value, $mapper)
    {

        if (empty($mapper) || empty($value)) {
            return $value;
        }

        // guard against single entrys as non arrays
        if (!is_array($mapper)) {
            $mapper = [$mapper];
        }

        foreach ($mapper as $op) {
            if ($op == 'string') {
                $value = filter_var($value, FILTER_SANITIZE_STRING);
            }

            if ($op == 'integer') {
                $words = explode('.', $value);
                $value = $words[0];
                $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            }

            if ($op == 'float' || $op == 'decimal') {
                $value = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            }
        }
        return $value;
    }

    /**
     * @param $value
     * @param $mapper
     * @return mixed|string
     */
    public static function transformer($value, $mapper)
    {

        if (empty($mapper)) {
            return $value;
        }

        $mapper = json_decode($mapper, 1);

        foreach ($mapper as $op) {

            if (function_exists($op)) {
                $value = $op($value);
                continue;
            }

            if (method_exists(TransformHelper::class, $op)) {
                $value = TransformHelper::$op($value, TransformHelper::get_params($op));
                continue;
            }

        }

        return $value;
    }

    /**
     * @param string $value
     * @param array $mapper
     * @return string
     */
    private static function mapper($value, $mapper)
    {
        if (empty($mapper) || (empty($value) && $value !=0) ) {
            return $value;
        }

        // handle raw key->value arrays, this applys to next if statement only.
        // It essentially tests if the mapper is a traditional key value json string or
        // the custom mapper string with conditional testing
        reset($mapper);
        $first_key = key($mapper);

        if (!is_array($mapper[$first_key])) {
            foreach ($mapper as $key => $value2) {
                if ($value == $key) {
                    return $value2;
                }
            }
        }

        // handle value mappers
        foreach ($mapper as $item) {
            // Numeric ops
            if (is_array($item)) {

                // test for the default string

                // This is the default.
                // Typically can put it at the end of the end of the mapper as a catch all in case no mappings occur,
                // To always at least map a valid value
                if($item[0] == 'default'){
                    return $item[1];
                }

                // sets the parameters from the single array row in the 2d array
                $operation = $item[0];
                $test_value = $item[1];
                $return_value = $item[2];

                if ($operation == 'in_array') {
                    if (is_array($test_value)) {
                        if (in_array($value, $test_value)) return $return_value;
                    }
                }

                // Note: this applies to non-numerics as well
                if ($operation == 'equals' || $operation == "==") {
                    if ($value == $test_value) return $return_value;
                }

                if (is_numeric($value)) {
                    if ($operation == 'less_than' || $operation == "<") {
                        if ($value < $test_value) return $return_value;
                    }
                    if ($operation == 'greater_than' || $operation == ">") {
                        if ($value > $test_value) return $return_value;
                    }
                    if ($operation == 'less_than_or_equals' || $operation == "<=") {
                        if ($value <= $test_value) return $return_value;
                    }
                    if ($operation == 'greater_than_or_equals' || $operation == ">=") {
                        if ($value >= $test_value) return $return_value;
                    }
                }
            }
        }
        return $value;
    }

    /**
     * Pulls a parameter string out of parenthesis i.e. whatsup("this") returns a string of "this".
     * @param $string
     * @return mixed
     */
    public static function get_params($string){
         preg_match('#\((.*?)\)#', $string, $match);
         $out = str_replace('"', "", $match[1]);
         $out = str_replace("'", "", $out);
         return $out;
    }
}