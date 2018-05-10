<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;
use App;
class Category extends Model
{
    public static function getCategoryByUrl($category_url) {
//        dd($category_url);
//        dd(Config::get('app.locale_id'));
        $query = static::select()
                    ->join('categories_languages', 'categories.id', '=', 'categories_languages.category_id')
                    ->where('categories.url', '=', $category_url)
                    ->where('categories_languages.language_id', '=', Config::get('app.locale_id'))
                    ->where('categories.status', '>=', 1)
                    ->select('categories.id', 'categories.url', 'categories_languages.name', 'categories_languages.description', 'categories_languages.metatitle', 'categories_languages.metadescription')
                    ->first();
//        dd($query);
        return $query;

    }
}
