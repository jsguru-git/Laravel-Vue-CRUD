<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Extensions\ParameterFieldsCollection;
use Partner;

/**
 * Class PartnerField
 * @package App\Models
 */
class PartnerField extends Model
{
    public $data;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partnerfields';

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
        'partner_id',
        'fieldname',
        'available_values',
        'type',
        'sanitizers',
        'validate',
        'transforms',
        'default_if_empty',
        'hardcode',
        'rx_faker_type',
        'default',
    ];


    public static function getDefaults(int $partner_id){
        $partner_fields = self::where('partner_id', $partner_id)->get();

        $out = [];
        foreach ($partner_fields as $partner_field){
            if(is_null($partner_field->default)) continue;
            $out[$partner_field->fieldname] = $partner_field->default;
        }
        return collect($out);
    }
}
