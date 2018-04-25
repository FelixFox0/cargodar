<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;
    public static function getLangageByIso($iso) {
        $query = static::select()
                ->where('iso', '=', $iso)
                ->where('status', '>=', 1)
                ->first();
        return $query;

    }
}
