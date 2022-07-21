<?php

namespace App\Http\ViewComposers\Web;

use Illuminate\View\View;
use App\Models\Post;
use Cache;
class sliderComposer
{
    public function compose(View $view)
    {
        $cache_post_feature = md5('post_feature-with-category-user-displayed_time-desc');
        if(Cache::has($cache_post_feature)){
            $data['post_feature'] = Cache::get($cache_post_feature);
        }else{
            $data['post_feature'] = Post::with('category')->whereNull('product_id')->orderBy('displayed_time', 'DESC')->limit(3)->get();
            Cache::set($cache_post_feature, $data['post_feature'], now()->addHours(12));
        }
        $view->with($data);
    }
}
