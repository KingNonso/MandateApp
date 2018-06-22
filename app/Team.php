<?php

namespace Mandate;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'church_id', 'creator_id'];


    public function members()
    {
        return $this->hasMany('Mandate\TeamMembers');
    }

    public function newconverts()
    {
        return $this->hasMany('Mandate\NewConvert');
    }
    
}
