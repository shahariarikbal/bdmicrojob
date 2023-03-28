<?php

namespace App\Models;

use App\Models\Membership;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    protected $guarded = [];

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

    public function membership(){
        return $this->belongsTo(Membership::class,'membership_id', 'id');
    }

    public function nidrequest(): HasMany
    {
        return $this->hasMany(NidVerification::class);
    }

    public function withdrawrequest(): HasMany
    {
        return $this->hasMany(Withdraw::class);
    }

    public function submittedJob(): HasMany
    {
        return $this->hasMany(PostSubmit::class);
    }
}
