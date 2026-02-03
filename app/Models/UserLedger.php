<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLedger extends Model
{
    protected $fillable = [
        'user_id',
        'get_balance_from_user_id',
        'reason',
        'perticulation',
        'amount',
        'debit',
        'status',
        'step',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
