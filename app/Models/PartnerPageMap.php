<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $partnerpage_id
 * @property integer $sequence
 * @property string $fieldtype
 * @property string $theirfield
 * @property string $ourfield
 * @property string $required
 * @property string $static
 * @property string $staticvalue
 * @property string $valuemap
 */
class PartnerPageMap extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'partnerpagemaps';

    /**
     * @var array
     */
    protected $fillable = ['partnerpage_id', 'sequence', 'fieldtype', 'theirfield', 'ourfield', 'required', 'static', 'staticvalue', 'valuemap'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql_contacts';

}
