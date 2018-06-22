<?php

namespace Mandate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class HomeCellMembers extends Model
{
    protected $dates = ['deleted_at'];

    public function cell(){
        return $this->belongsTo('Mandate\Homecell','cell_id');
    }
}
