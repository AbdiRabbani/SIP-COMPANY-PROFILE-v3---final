<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tb_contact';
    protected $guarded = [];

    public function partner_section() 
    {
        return $this->belongsTo('App\Partnershipcategory', 'id_product');
    }
}
