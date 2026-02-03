<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'tab',
        'amount',
        'hourly',
        'daily_income',
        'daily_limit',
        'return_total',
        'date',
        'validity',
        'expires_at',
        'status',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Check if this purchase is currently active according to status and expires_at
     * @return bool
     */
    public function isActive()
    {
        if ($this->status !== 'active') return false;
        if ($this->expires_at) {
            return now()->lt($this->expires_at);
        }
        return true;
    }

    /**
     * Static helper: returns true if the purchase with given id is active
     */
    public static function isPlanActive($id)
    {
        $p = self::find($id);
        return $p ? $p->isActive() : false;
    }
}
