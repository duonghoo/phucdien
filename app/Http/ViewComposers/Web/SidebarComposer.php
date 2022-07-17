<?php

namespace App\Http\ViewComposers\Web;

use App\Models\Football_league;
use App\Models\Tag;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\Page;
use App\Models\Category;
use Cache;
class SidebarComposer
{
    public function compose(View $view)
    {
        $data['categoryTree'] = Category::getTree();

        if(Cache::has('new_post_sidebar-id-desc-limit-5')){
            $data['new_post'] = Cache::get('new_post_sidebar-id-desc-limit-5');
        }else{
            $data['new_post'] = Post::where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
            Cache::set('new_post_sidebar-id-desc-limit-5', $data['new_post'], now()->addHours(12));
        }
        if(Cache::has('tag::all()')){
            $data['tag'] = Cache::get('tag::all()');
        }else{
            $data['tag'] = Tag::all();
            Cache::set('tag::all()', $data['tag'], now()->addHours(12));
        }

        // get random page exclude (Liên hệ)
        if(Cache::has('page_side_bar_with_user_exclude')){
            $data['page_rd'] = Cache::get('page_side_bar_with_user_exclude');
        }else{
            $data['page_rd'] = Page::with('user')->whereNotIn('slug', ['lien-he'])->inRandomOrder()->limit(3)->get();
            Cache::set('page_side_bar_with_user_exclude', $data['page_rd'], now()->addHours(12));
        }
        $view->with($data);
    }
}
