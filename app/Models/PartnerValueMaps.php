<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * @package App\Models
 */
class PartnerValueMaps extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partnervaluemaps';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // protected $connection = 'mysql_contacts';

    /**
     * Mass Assignment
     * @var array
     */
    protected $fillable = ['name', 'valuemap', 'description'];
}
