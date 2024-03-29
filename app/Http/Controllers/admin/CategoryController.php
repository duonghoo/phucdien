<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Request;
use Redirect;
use App\Models\Category;
use App\Models\Post_Category;
use Route;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function index() {
        $listItem = Category::all();
        foreach ($listItem as $key => $item) {
            $listItem[$key]->count_post = Post_Category::where('category_id', $item->id)->count();
        }
        $data['listItem'] = $listItem;
        return view('admin.category.index', $data);
    }

    public function update($id = 0) {
        $data['categoryTree'] = Category::getTree();
        if ($id > 0) $data['oneItem'] = $oneItem = Category::findOrFail($id);
        if (!empty(Request::post())) {
            $post_data = Request::post();
            // dd($post_data['parent_id']);
            if($post_data['parent_id'] == 0) unset($post_data['parent_id']);
            Category::updateOrInsert(['id' => $id], $post_data);
            return Redirect::to('/admin/category');
        }
        return view('admin.category.update', $data);
    }

    public function delete($id) {
        Category::destroy($id);
        return back();
    }
}
