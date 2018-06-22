<?php

namespace Mandate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMembers extends Model
{
    use SoftDeletes;
    protected $fillable = ['team_id', 'member_id'];

    protected $dates = ['deleted_at'];

    public function team(){
        return $this->belongsTo('Mandate\Team');
    }


}
