<?php

namespace Mandate;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable, SluggableScopeHelpers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','surname','church_id','phone','country_id','state_id','city_id', 'email', 'password','slug','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => ['firstname', 'surname', 'othername']
            ]
            ];
    }

    public function fullName() {
        return $this->firstName . ' ' . $this->surname . ' ' . $this->othername;
    }

    public function testimony(){
        return $this->hasMany('Mandate\Testimony');
    }


}
