<?php

namespace Mandate;

use Illuminate\Database\Eloquent\Model;

class NewConvertAction extends Model
{
    protected $fillable = [
        'done', 'schedule','feedback','action','actor_id','team_id'
    ];
    

    public function convert()
    {
        return $this->belongsTo('Mandate\NewConvert');
    }
}
