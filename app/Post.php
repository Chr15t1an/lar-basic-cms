<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    // protected $primaryKey = 'slug';
    // protected $keyType = 'string';

    public function category()
    {
      return $this->belongsTo('App\Category');
    }


    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }
}
