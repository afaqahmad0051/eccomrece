<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title_ur',
        'title_en',
        'desc_ur',
        'desc_en',
        'slider_image',
        'status',
    ];
}
