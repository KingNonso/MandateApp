<?php

namespace Mandate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;


class Announcement extends Model
{
    use SoftDeletes;
    use Sluggable, SluggableScopeHelpers;


    protected $dates = ['deleted_at'];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'subject'
            ]
        ];
    }
}
