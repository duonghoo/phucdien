<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Request;
use Redirect;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {

    }

    public function index() {
        $limit = 10;
        $count = Product::count();
        $pagination = (int) ceil($count/$limit);
        #
        $page = !empty($_GET['page']) ? $_GET['page'] : 1;
        #
        $condition = [];
      
        if (!empty($_GET['user_id'])) {
            $condition[] = ['user_id', $_GET['user_id']];
        }
        if (!empty($_GET['title'])) {
            $condition[] = ['title','LIKE', '%'.$_GET['title'].'%'];
        }
        #
        $data['listUser'] = User::where('status', 1)->get();
        #
       
        $data['listItem'] = Product::where($condition)->offset(($page-1)*$limit)->limit($limit)->get();
        $data['pagination'] = $pagination;
        $data['page'] = $page;
        return view('admin.product.index', $data);
    }

    public function update($id = 0) {
        $data = [];
        $data['user_id'] = Auth::id();

        if ($id > 0) {
            $data['oneItem'] = $oneItem = Product::findOrFail($id);
            $data['optional'] = json_decode($oneItem->optional);
        }
        if (!empty(Request::post())) {
            $post_data = Request::post();
            $post_data['color'] = explode('|',$post_data['color']);
            $post_data['color'] = array_filter($post_data['color']);
            $post_data['color'] = json_encode($post_data['color']);
            Product::updateOrInsert(['id' => $id], $post_data);

            return Redirect::to('/admin/product?page=1');
        }
        return view('admin.product.update', $data);
    }

    public function delete($id) {
        Product::destroy($id);
        return back();
    }
}
