<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
    	'username', 'password', 'last_login_ip', 'last_login_time',
    ];

    public function setPasswordAttribute($value)
    {
    	$this->attributes['password'] = bcrypt($value);
    }
}
