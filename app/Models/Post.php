<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function getPosts($category_id = null) {
        $query = static::select();
        if($category_id){
            return $query->get();
        }else{
            return $this->hasManyThrough('App\Post', 'App\User');
//            return $query->get();
        }
    }
    
    
}
