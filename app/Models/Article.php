<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\User;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','description','content','date','user_id'];

    protected $dates = ['deleted_at'];

    public function getDateAttribute($value)
    {
        
        return str_replace(' ', 'T', $value);;
    }

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Using Mutators: format attribute.
     */
    public function getUserIdAttribute()
    {
        /**
         * Using DB class
         * returnDB::table('users')->where('id', $this->attributes['user_id'])->value('name');
         * 
         * or
         * 
         * Using Model class
         */
        return User::where('id', $this->attributes['user_id'])->value('name');

    }

    /**
     * self: to reference a calling class
     * in the context of static inheritance.
     * 
     * @param $num : paginate number
     * 
     * @return articles collection
     */
    public static function getAll($num)
    {
        $user = auth()->user();
        if ($user->admin == 'T') {
            return self::select('id','title','description','user_id','date')
            ->orderBy('date','desc')
            ->paginate($num);    
        }else {
            return self::select('id','title','description','user_id','date')
            ->where('user_id','=',$user->id)
            ->orderBy('date','desc')
            ->paginate($num);
        }
    }

    /**
     * select article order by desc date
     * 
     * @param $num : paginate number
     * 
     * @return articles collection
     */
    public static function getAllByDate($num)
    {
        return self::select('id','title','description','user_id','date')
        ->whereDate('date','<=', date('Y-m-d'))
        ->orderBy('date','desc')
        ->paginate($num);
    }

    public static function searchOrList($search)
    {
        if (isset($search) && $search != "") {
            $articles = self::orWhere('title', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->paginate(12);
        }else{
            $articles = self::getAllByDate(12);
            $search = "";
        }

        return compact('articles', 'search');
    }

}
