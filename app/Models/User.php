<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ref_id',
        'ref_by',
        'username',
        'code',
        'balance',
        'phone',
        'sign_every_day',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    
    public function spins()
    {
        return $this->hasMany(Spin::class, 'referrer_id');
    }
    
    public function referrer()
    {
        return $this->belongsTo(User::class, 'ref_by', 'ref_id');
    }
    
    public function referrals()
    {
        return $this->hasMany(User::class, 'ref_by', 'ref_id');
    }
}
