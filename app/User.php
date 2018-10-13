<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;    
use App\Traits\Uuids;

class User extends Authenticatable
{
    use Uuids;
    use Notifiable;
    use LaratrustUserTrait; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 
        'username', 'avatar',
        'activated', 'bio',
        'data_of_birth', 'linkedin',
        'facebook', 'instagram',
        'display_mail',
        'medium', 'password',
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
     * User has many stories
     */
    public function story()
    {
        return $this->hasMany('App\Story');
    }
}
