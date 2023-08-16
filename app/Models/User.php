<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\softDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_fname',
        'user_lname',
        'email',
        'password',
        'user_age',
        'user_contact',
        'user_address',
        'user_picture',
        'user_gender',
        'role',
        'remember_token',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     public function rescuer(){
        return $this->hasOne('App\Models\Rescuer');
    }

    public function veterenarian(){
        return $this->hasOne('App\Models\Veterenarian');
    }

     public function adopter(){
        return $this->hasOne('App\Models\Adopter');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment','user_id');
    }
}
