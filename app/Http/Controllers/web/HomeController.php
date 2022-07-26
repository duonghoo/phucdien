<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Match;
use App\Models\Post;
use Cache;

class HomeController extends Controller
{
    private $arr_exclude = [];

    public function index($is_amp = false) {


        $data['loadmore'] = true;

        // bài viết sản phầm
        $post_product_home = md5('post_product_home');
        if(Cache::has($post_product_home)){
            $data['product'] = Cache::get($post_product_home, now()->addHours(12));
        }else{
            $data['product'] = Post::with('product')->whereNotNull('product_id')->orderBy('displayed_time', 'DESC')->offset(0)->limit(8)->get();
            Cache::set($post_product_home, $data['product']);
        }

        // dd($data['product']);
        
        // exclude cho one post new 
        // $this->arr_exclude[] = $data['post_feature']->id;

        // // bài viết phổ biến (xu hướng) id=10
        // $cache_post_trending = md5('post_trending-with-category-user-categories-category_post.category_id=10'.json_encode($this->arr_exclude));
        // if(Cache::has($cache_post_trending)){
        //     $data['trending'] = Cache::get($cache_post_trending, now()->addHours(12));
        // }else{
        //     $data['trending'] = Post::with(['category', 'user', 'categories'])->whereHas('categories', function($q){
        //         return $q->where('category_post.category_id', 10);
        //     })->whereNotIn('id', $this->arr_exclude)->orderBy('displayed_time', 'DESC')->offset(0)->limit(4)->get();
        //     Cache::set($cache_post_trending, $data['trending']);
        // }
        // // exclude post_tech cho trending post
        // foreach($data['trending'] as $T){
        //     $this->arr_exclude[] = $T->id;
        // }

        // // category phân tích kĩ thuật id=11
        // $cache_post_tech = md5('post_tech-with-category-user-categories-category_post.category_id=11'.json_encode($this->arr_exclude));
        // if(Cache::has($cache_post_tech)){
        //     $data['tech'] = Cache::get($cache_post_tech);
        // }else{
        //     $data['tech'] = Post::with(['category', 'user', 'categories'])->whereHas('categories', function($q){
        //         return $q->where('category_post.category_id', 11);
        //     })->whereNotIn('id', $this->arr_exclude)->orderBy('displayed_time', 'DESC')->offset(0)->limit(5)->get();
        //     Cache::set($cache_post_tech, $data['tech'], now()->addHours(12));
        // }
        
        // // exclude phân tích kĩ thuật id
        // foreach($data['tech'] as $T){
        //     $this->arr_exclude[] = $T->id;
        // }

        // // category nhận định thị trường id=12
        // $cache_post_market = md5('post_market-with-category-user-categories-category_post.category_id=11'.json_encode($this->arr_exclude));
        // if(Cache::has($cache_post_market)){
        //     $data['market'] = Cache::get($cache_post_market);
        // }else{
        //     $data['market'] = Post::with(['category', 'user', 'categories'])->whereHas('categories', function($q){
        //         return $q->where('category_post.category_id', 12);
        //     })->whereNotIn('id', $this->arr_exclude)->orderBy('displayed_time', 'DESC')->offset(0)->limit(6)->get();
        //     Cache::set($cache_post_market, $data['market'], now()->addHours(12));
        // }
        

        // // exclude post_tech cho recent post
        // foreach($data['market'] as $T){
        //     $this->arr_exclude[] = $T->id;
        // }

        // // Phương pháp chiến lược id=13
        // $cache_post_strategy = md5('post_strategy-with-category-user-categories-category_post.category_id=13'.json_encode($this->arr_exclude));
        // if(Cache::has($cache_post_strategy)){
        //     $data['strategy'] = Cache::get($cache_post_strategy);
        // }else{
        //     $data['strategy'] = Post::with(['category', 'user', 'categories'])->whereHas('categories', function($q){
        //         return $q->where('category_post.category_id', 13);
        //     })->orderBy('displayed_time', 'DESC')->offset(0)->limit(6)->get();
        //     Cache::set($cache_post_strategy, $data['strategy'], now()->addHours(12));
        // }

        // // exclude post_tech cho strategy
        // foreach($data['strategy'] as $T){
        //     $this->arr_exclude[] = $T->id;
        // }

        // // recent post
        // $limit = 4;
        // $page = 1;
        // $params = [
        //     'info_category' =>true,
        //     'exclude' => $this->arr_exclude,
        //     'author' =>true,
        //     'limit' => $limit,
        //     'offset' => ($page-1) * $limit,
        // ]; 
        // $count = Post::getCount($params);
        // if($count <= $limit) $data['loadmore'] = false;
        // $pagination = (int) ceil($count/$limit);
        // $data['pagination'] = $pagination;
        // $data['page'] = $page;
        // $data['recent_post'] = Post::getPosts($params);

        // $date = date('Y-m-d H:i:s l');
        // $date = strtotime($date);
        // $weekday = date("l");

	    // $weekday = strtolower($weekday);

        // switch($weekday) {
        //     case 'monday':
        //         $weekday = 'Thứ hai';
        //         break;
        //     case 'tuesday':
        //         $weekday = 'Thứ ba';
        //         break;
        //     case 'wednesday':
        //         $weekday = 'Thứ tư';
        //         break;
        //     case 'thursday':
        //         $weekday = 'Thứ năm';
        //         break;
        //     case 'friday':
        //         $weekday = 'Thứ sáu';
        //         break;
        //     case 'saturday':
        //         $weekday = 'Thứ bảy';
        //         break;
        //     default:
        //         $weekday = 'Chủ nhật';
        //         break;
        // }

        // $data['today_time'] = $weekday.', Ngày '.date('d/m/Y',$date);

        // if($is_amp) return view('web.home.amp-index', $data);

        // $data['schema'] = getSchemaLogo().getLocalBusiness();
        // $data['seo_data'] = initSeoData(null,'home');
        $breadCrumb = [];

        $breadCrumb[] = [
            'name' => 'home',
            'item' => 'home',
            'schema' => false,
            'show' => true
        ];
        $data['$breadCrumb']=$breadCrumb;
        return view('web.home.index', $data);
    }

    public function ampIndex(){
        return $this->index(true);
    }

    public function loadMorePostHome( $page)
    {
        $limit = 4;
        $page += 1;

        $params = [
            'info_category' =>true,
            'exclude' => $this->arr_exclude,
            'author' =>true,
            'limit' => $limit,
            'offset' => ($page-1) * $limit,
        ];

        $count = Post::getCount($params);
        $pagination = (int) ceil($count/$limit);
        $data['pagination'] = $pagination;
        $data['page'] = $page;

        $data['post'] = Post::getPosts($params);

        

        if($data['post']->isEmpty())
        {
            return null;
        }
        $html = view('web.block._load_more_post_home', $data)->render();

        return $html;
    }
}
