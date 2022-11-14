<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDivision extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function country_cities(){
        return $this->hasMany(ShippingDistrict::class,'division_id','id')->orderBy('district_name','asc');
    }
}
