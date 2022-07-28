<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Rate;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Cache;

class ProductController extends Controller
{
    public function index($is_amp=false) {
        
        // $data['seo_data'] = initSeoData($oneItem,'category');
        $search = isset($_GET['product_search']) ? $_GET['product_search'] : null;

        $data['loadmore'] = true;
        // //video limit 9
        // if($id==2){
        //     $limit = 9;
        // }
        // else
        // {
        //     $limit = 15;
        // }
        $page = 1;
        $limit = 10;

        $params = [
            'search' => $search,
            'author' =>true,
            'limit' => $limit,
            'offset' => ($page-1) * $limit,
        ];

        $count = Product::getCount($params);
        if($count <= $limit) $data['loadmore'] = false;
        $count = Product::getCount($params);
        $pagination = (int) ceil($count/$limit);
        $data['pagination'] = $pagination;
        $data['page'] = $page;

        $data['product'] = Product::getProduct($params);

        $date = date('Y-m-d H:i:s l');
        $date = strtotime($date);
        $weekday = date("l");
	    $weekday = strtolower($weekday);
        switch($weekday) {
            case 'monday':
                $weekday = 'Thứ hai';
                break;
            case 'tuesday':
                $weekday = 'Thứ ba';
                break;
            case 'wednesday':
                $weekday = 'Thứ tư';
                break;
            case 'thursday':
                $weekday = 'Thứ năm';
                break;
            case 'friday':
                $weekday = 'Thứ sáu';
                break;
            case 'saturday':
                $weekday = 'Thứ bảy';
                break;
            default:
                $weekday = 'Chủ nhật';
                break;
        }
        $data['time'] = $weekday.', Ngày '.date('d/m/Y - h:m',$date);

        $breadCrumb = [];
        $breadCrumb[] = [
            'name' => 'Sản phẩm',
            'item' => '/product',
            'schema' => true,
            'show' => true
        ];

        $data['breadCrumb'] = $breadCrumb;

        $data['schema'] = getSchemaBreadCrumb($breadCrumb);

        $view = 'product';
        if(IS_AMP) return view('web.category.amp-'.$view, $data);

        return view('web.page.'.$view, $data);
    }

    public function Product($product){
        $key = md5('product-item-'.$product);
        if(Cache::has($key)){
            $oneItem = Cache::get($key);
        }else{
            $oneItem = Product::with(['user'])->where('id',$product)->first();
            Cache::set($key, $oneItem, now()->addHours(24));
        }

        if (empty($oneItem) || $oneItem->status == 0)
        {
            $user = Auth::user();
            if(empty($user))
                abort(404);
            $group = Group::find($user->group_id);
            $permission = json_decode($group->permission, 1);
            if(empty($permission['post']['index']))
                abort(404);
        }
        $breadCrumb = [];

        $breadCrumb[] = [
            'name' => $oneItem->title,
            'item' => getUrlProduct($oneItem),
            'schema' => false,
            'show' => true
        ];
        $breadCrumb[] = [
            'name' => $oneItem->title,
            'item' => getUrlPost($oneItem),
            'schema' => true,
            'show' => false
        ];
        $data['oneItem'] = $oneItem;
        $data['breadCrumb'] = $breadCrumb;

        if(IS_AMP) return view('web.page.product_item', $data);

        return view('web.page.product_item', $data);
    }


    public function ampIndex(){
        return $this->index(true);
    }

    public function ajax_list(){
        $key = md5('product-item-all');
        if(Cache::has($key)){
            $oneItem = Cache::get($key);
        }else{
            $oneItem = Product::orderBy('id', 'desc')->get();
            Cache::set($key, $oneItem, now()->addHours(24));
        }
        return \response()->json($oneItem);
    }

    private function parse_content($content) {
        return $content;
    }

    public function ajax_rate(Request $request){
        $data = $request->all();
        $ip = $this->getIp();
        if ($data['star'] == 0 || $data['star'] > 5) $data['star'] = 5;
        $check = Rate::where('slug', $data['slug'])->where('ip', $ip)->count();
        if($check == 0){
            $vote = DB::select('select COUNT(1) AS count_vote, ROUND( AVG(vote),1) AS avg  from rate where slug = ?', [$data['slug']]);
            $vote = $vote[0];
            $count_vote = $vote->count_vote;
            $avg = ($vote->avg * $vote->count_vote + 5) / ($vote->count_vote + 1);
            $count_vote++;

            $resultVote = new \stdClass();
            $resultVote->count_vote = $count_vote;
            $resultVote->avg = $avg;

            //save vote

            $rate = new Rate();
            $rate->slug = $data['slug'];
            $rate->ip = $ip;
            $rate->vote = $data['star'];
            $rate->save();
            $message['type'] = 'success';
            $message['message'] = "Bạn vừa đánh giá {$data['star']} sao cho bài viết này.";
            $message['vote'] = $resultVote;
            return \response()->json($message);
        }
        $message['type'] = 'warning';
        $message['message'] = "Bạn đã đánh giá bài viết này rồi.";
        return \response()->json($message);

    }

    public function ajax_load_more_post_amp(){
        turnOnAjaxAmp();
        $dataPost = $_GET;

        $category_id = $dataPost['category_id'] ?? die();
        $limit = $dataPost['limit'] ?? die();
        $page = $dataPost['page'] ?? die();

        $data = Post::where(['status' => 1, 'category_id' => $category_id, ['displayed_time', '<=', Post::raw('NOW()')]])
            ->orderBy('displayed_time', 'DESC')
            ->offset(($page-1)*$limit)
            ->limit($limit + 1)
            ->get()->toArray();

        foreach ($data as &$a){
            $cateItem = Category::getById($a['category_id']);
            $a['category_slug'] = getUrlCate($cateItem);
            $a['category_title'] = $cateItem->title;

            $a['description'] = !empty($a['description']) ? $a['description'] : get_limit_content($a['content'], 200);
            $a['slug'] = getUrlPost($a, 1);
        }

        $dataReturn = array_splice($data, 0, $limit);
        $checkLoadMore = count($data);

        $next = '';
        if ($checkLoadMore){
            $next = url("/ajax-load-more-post-amp?category_id=$category_id&limit=$limit&page=".++$page);
        }

        return \Response::json(['items' => $dataReturn, 'next' => $next]);
    }



    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
