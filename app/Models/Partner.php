<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * @package App\Models
 */
class Partner extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partners';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    // protected $connection = 'mysql_contacts';

    /**
     * Mass Assignage
     * @var array
     */
    protected $fillable = ['name', 'protocol', 'domain', 'base_url', 'search'];

    /**
     * @return string
     */
    public function getFullUrlAttribute()
    {
        return $this->protocol . "://" . $this->domain . $this->base_url;
    }

    public function fields()
    {
        return $this->partnerfields();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partnerfields()
    {
        return $this->hasMany('App\Models\PartnerField');
    }
}
