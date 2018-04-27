<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;
class Category extends Model
{
    public static function getCategoryByUrl($category_url) {
        $query = static::select()
                    ->where('url', '=', $category_url)
                    ->first();
        return $query;

    }
}
