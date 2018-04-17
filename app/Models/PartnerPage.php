<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $vendor_id
 * @property boolean $sequence
 * @property string $url
 */
class PartnerPage extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'partnerpages';

    /**
     * @var array
     */
    protected $fillable = ['vendor_id', 'sequence', 'url'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'mysql_contacts';

}
