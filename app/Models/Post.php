<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function getPosts($category_id = null) {
        $query = static::select()
                ->join('posts_languages', 'posts.id', '=', 'posts_languages.post_id')
                ->join('languages', 'languages.id', '=', 'posts_languages.language_id')
                ->join('currencies', 'currencies.id', '=', 'posts.currency_id')
                ->join('currencies_languages', 'currencies.id', '=', 'currencies_languages.currency_id')
                ->select('posts.id', 'posts.price', 'posts.viewed_post', 'posts.viewed_contacts', 'posts_languages.name','posts_languages.description', 'currencies_languages.name as currency_name')
                ->orderBy('posts.sort', 'asc');
                if($category_id){
                    $query = $query->where('posts.category_id', '=', $category_id);
                }
                
                //$query = $query->where('languages.iso', =, );
                $query = $query->get();
//                var_dump($query);
        return $query;

    }
}
