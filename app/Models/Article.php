<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','description','content','date'];

    protected $dates = ['deleted_at'];

    public function getDateAttribute($value)
    {
        $date = str_replace(' ', 'T', $value);
        return $date;
    }
}
