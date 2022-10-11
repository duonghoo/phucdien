<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cache;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'crawler', 'user_id', 'status'];
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'products';
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function getContentAttribute($value)
    // {
    //     return short_code($value);
    // }
    public function posts() {
        return $this->hasMany(Post::class);
    }

    static function getProduct($params) {
        //$key_cache = md5('product-'.serialize($params));
        // if(Cache::has($key_cache)){
            // return Cache::get($key_cache);
        // }
        extract($params);
        $data = self::where([
            'status' => 1,
        ]);
     

        if (isset($author)) {
            $data = $data->with('user');
        }

        if (isset($search)) {
            $data = $data->where('title', 'like', "%$search%");
        }
       
        $offset = $offset ?? 0;
        $limit = $limit ?? 10;

        $data = $data->orderBy('id', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
        //Cache::set($key_cache, $data, now()->addHours(12));
        return $data;
    }

    static function getCount($params) {
        $key_cache = md5('product-'.serialize($params).'count');
        if(Cache::has($key_cache)){
            return Cache::get($key_cache);
        }
        extract($params);
        $data = self::where([
            'status' => 1,
        ]);

        $count_data = $data->count();
        Cache::set($key_cache, $count_data, now()->addHours(12));

        return $count_data;
    }
}
