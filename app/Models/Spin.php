<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spin extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'referrer_id',
        'package_amount',
        'reward_amount',
        'status',
    ];
    
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
}
