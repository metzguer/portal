<?php

namespace laradex;

use Illuminate\Database\Eloquent\Model;

class TrainerModel extends Model
{
    protected $fillable = ['nombre','desc','avatar','slug'];

    public function getRouteKeyName(){
        return 'slug';
    }
}
