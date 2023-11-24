<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerConnector extends Model
{
    protected $table = 'tb_partnership_technology';
    protected $guarded = [];

    public function partner_section()
    {
        return $this->belongsTo('App\Partnershipcategory', 'technology');
    }
}
