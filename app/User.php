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
        'name', 'email', 'password', 'role_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function thumbs()
    {
        return $this->hasMany('App\Models\CommentReplyThumb', 'user_id');
    }

    // public function setRoleTypeAttribute($value)
    // {
    //     if($value == 'manager')
    //     {
    //         $this->attributes['role_type'] = $manager;
    //     }
    //     else
    //     {
        
    //     }
    // }

    public function scopeSearch($query, $where = [])
    {
        if(is_array($where) && !empty($where))
        {
            foreach ($where as $key => $value) 
            {
                if(in_array($key, ['name', 'role_type']))
                {
                    if($key == 'name')
                    {
                        $query->where('name', 'like', $value.'%');
                    }
                    else
                    {
                        $query->where('role_type', $value);
                    }
                }
            }
        }
        return $query;
    }
}
