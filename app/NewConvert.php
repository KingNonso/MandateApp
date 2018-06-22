<?php

namespace Mandate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class NewConvert extends Model
{
    use Sluggable, SluggableScopeHelpers;

    protected $fillable = [
        'firstname','surname','phone','sex','address','slug', 'email', 'age','occupation','request','soul_winner_id','team_id','church_id'
    ];

    

    public function sluggable(){
        return [
            'slug' => [
                'source' => ['firstname', 'surname']
            ]
            ];
    }

    public function team()
    {
        return $this->belongsTo('Mandate\Team');
    }

    public function fullName()
    {
        $name = $this->firstname. ' '. $this->surname;
        return $name;
    }

    public function action()
    {
        return $this->hasMany('Mandate\NewConvertAction');
    }


}
