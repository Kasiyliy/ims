<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'phone_number', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isAdmin(){
        return $this->role_id == Role::ADMIN_ID;
    }

    public function isInvestor(){
        return $this->role_id == Role::INVESTOR_ID;
    }

    public function isEnterpreneur(){
        return $this->role_id == Role::ENTERPRENEUR_ID;
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
