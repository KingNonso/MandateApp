<?php

namespace Mandate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Homecell extends Model
{
    use Sluggable, SluggableScopeHelpers;

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function members()
    {
        return $this->hasMany('Mandate\HomeCellMembers','cell_id');
    }

}
