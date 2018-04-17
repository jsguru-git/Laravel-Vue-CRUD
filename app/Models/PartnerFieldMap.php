<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $from_partner_id
 * @property string $from_field
 * @property int $to_partner_id
 * @property string $to_field
 * @property string $databasename
 * @property string $tablename
 * @property string $required
 * @property string $static
 * @property string $staticvalue
 * @property string $valuemap
 */
class PartnerFieldMap extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partnerfieldmaps';

    /**
     * @var array
     */
    protected $fillable = [
        'from_partner_id',
        'from_field',
        'to_partner_id',
        'to_field',
        'databasename',
        'tablename',
        'required',
        'static',
        'staticvalue',
        'valuemap'
    ];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_contacts';

}
