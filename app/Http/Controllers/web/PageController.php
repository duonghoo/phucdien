<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Config;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\Page;
use App\Models\Post;
use App\Models\Nha_Cai;
use App\Models\Product;
use App\Models\SiteSetting;

class PageController extends Controller
{
    public function index($slug) {
        $oneItem = Page::where('slug', $slug)->first();
        // dd($slug);

        if (empty($oneItem) || $oneItem->status == 0)
            return Redirect::to(url('404.html'));
        $id = $oneItem->id;
        // if ($oneItem->slug != $slug) return Redirect::to(getUrlStaticPage($oneItem), 301);
        $data['oneItem'] = $oneItem;
        $view = 'index';
        if($oneItem->slug == 'lien-he'){
            $view = 'contact';
        } else if($oneItem->slug == 'gioi-thieu')
        {
            $view = 'preview';
        }



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

        if($oneItem->id = 13){
            $data['ltd'] = true; 
        } //ltd

        $breadCrumb = [];
        
        $breadCrumb[] = [
            'name' => $oneItem->title,
            'item' => getUrlStaticPage($oneItem),
            'schema' => true,
            'show' => true
        ];
        $data['breadCrumb'] = $breadCrumb;
      
        $data['schema'] = getSchemaBreadCrumb($breadCrumb);


        $data['seo_data'] = initSeoData($oneItem, 'page');
        // dd($data);
        if(IS_AMP) $layout = 'web.page.amp-'.$view;
        $layout = 'web.page.'.$view;

        return view($layout, $data);
    }

    public function ampIndex($slug){
        return $this->index($slug);
    } 

    private function parse_content($content) {
        $array_str_remove = array(
            'background-color: #EEEEEE;'
        );
        $content = str_replace($array_str_remove, '', $content);
        return $content;
    }

    public function not_found() {
        abort(404);
    }

    public function any() {
        return Redirect::to(url('404.html'));
    }

    public function detail_doi_dau($slug_home, $slug_away) {
        $club_home = getDataAPI('http://api.sblradar.net/api/v2/club/list_data_club_main?slug='.$slug_home.'&limit=1');
        $club_away = getDataAPI('http://api.sblradar.net/api/v2/club/list_data_club_main?slug='.$slug_away.'&limit=1');
        $home_id = $club_home[0]['team_id'] ?? 0;
        $away_id = $club_away[0]['team_id'] ?? 0;
        $data['name_home'] = $club_home[0]['title'] ?? '';
        $data['name_away'] = $club_away[0]['title'] ?? '';
        $matches = getDataAPI('http://api.sblradar.net/api/v2/match/lastMeetings?home_id='.$home_id.'&away_id='.$away_id);
        $matches = array_slice($matches, 0, 7);
        $data['matches'] = $matches;
        $data['seo_data'] = [
            'index' => 'noindex,nofollow'
        ];
        return view('web.page.detail_doi_dau', $data);
    }

    public function detail_soi_keo()
    {
        
        return view('web.page.detail_soi_keo');
    }

    private function tyLeKeo(){
        $response = Http::withHeaders(['headers' => [
            'Token' => Config::get('app.token_sbr')
        ]])->get(Config::get('app.api_sbr')."api/v2/page/getPage?id=1");
        return json_decode($response->body());
    }
    public function redirectCart(Request $request)
    {
        // $data['oneItem'] = Product::all();
        $arr = [];
        $product = null;
        if(isset($_COOKIE['product_cart'])){
            $product = $_COOKIE['product_cart'];
            if($product){
                $product = json_decode($product);
            }
        }
        if(empty($product)) return view('web.page.cart',['oneItem' => null]);

        $data['oneItem'] = Product::whereIn('id', $product)->get();
        
        return view('web.page.cart',$data);
    }

    private function setCookie($key,$value, $minutes){
        Cookie::queue($key, $value, $minutes);
    }
    private function getCookie(Request $request){
        $value = $request->cookie('name');
        return $value;
    }
}
