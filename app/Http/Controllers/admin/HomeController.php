<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index() {
        $data = [];
        return view('admin.home.index', $data);
    }

    public function cache_clear(){
        Artisan::call('cache:clear');
        echo 'Đã Xóa thành công!';
        return;
    }
}
