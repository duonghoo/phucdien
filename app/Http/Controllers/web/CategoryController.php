<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index($slug, $id, $page = 1) {
        $search = isset($_GET['product_search']) ? $_GET['product_search'] : null;
        $oneItem = Category::find($id);
        if(!empty($oneItem))
        {
        if ($oneItem->status != 0)
        { 
        $data = [];
        $data['oneItem'] = $oneItem;
        if ($oneItem->slug != $slug) return Redirect::to(getUrlCate($oneItem), 301);
        $data['seo_data'] = initSeoData($oneItem,'category');
        }
    }

        $data['loadmore'] = true;
        // //video limit 9
        // if($id==2){
        //     $limit = 9;
        // }
        // else
        // {
        //     $limit = 15;
        // }

        $limit = 10;

        $params = [
            'search' => $search,
            'info_category' =>true,
            'author' =>true,
            'category_id' => $id,
            'limit' => $limit,
            'offset' => ($page-1) * $limit,
        ];

        $count = Post::getCount($params);
        if($count <= $limit) $data['loadmore'] = false;
        $count = Post::getCount($params);
        $pagination = (int) ceil($count/$limit);
        $data['pagination'] = $pagination;
        $data['page'] = $page;

        $data['post'] = Post::getPosts($params);

        $breadCrumb = [];
        $breadCrumb[] = [
            'name' => $oneItem->title,
            'item' => getUrlCate($oneItem),
            'schema' => true,
            'show' => true
        ];

        $data['breadCrumb'] = $breadCrumb;
        $data['main_category'] = $id;

        $data['schema'] = getSchemaBreadCrumb($breadCrumb);

        $view = 'index';
        if(IS_AMP) return view('web.category.amp-'.$view, $data);
        return view('web.category.'.$view, $data);
    }

    public function ampIndex($slug, $id){
        return $this->index($slug, $id);
    }


    public function loadMorePost($categoryId, $page)
    {
        $limit = 10;
        $page += 1;

        $params = [
            'info_category' =>true,
            'author' =>true,
            'category_id' => $categoryId,
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
        $html = view('web.block._load_more_post', $data)->render();

        return $html;
    }
}
