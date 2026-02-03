<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VipSlider extends Model
{
    use HasFactory;

    protected $table = 'vip_sliders';

    protected $fillable = [
        'title',
        'image', 
        'status',
        'order'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];
}