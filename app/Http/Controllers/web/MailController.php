<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;
use App\Models\Product;
use Mail;


class MailController extends Controller
{
    public function submit_form(Request $request){
        $data = $request->all();
        $product = Product::find($data['product']);
        $product = !empty($product) ? $product->title : 'Sản phầm chưa xác định';
        $content = '
        <center>
        <table>
        <thead>
        <tr>
            <th style="padding: 0px 10px">Tên</th>
            <th style="padding: 0px 10px">email</th>
            <th style="padding: 0px 10px">Số điện thoại</th>
            <th style="padding: 0px 10px">Mặt hàng quan tâm</th>
            <th style="padding: 0px 10px">Lời nhắn</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="padding: 0px 10px">'.$data['name'].'</td>
            <td style="padding: 0px 10px">'.$data['email'].'</td>
            <td style="padding: 0px 10px">'.$data['ph-no'].'</td>
            <td style="padding: 0px 10px">'.$product.'</td>
            <td style="padding: 0px 10px">'.$data['content'].'</td>
        </tr>
        </tbody>
        </table>
        </center>
        ';

        Mail::send('mail.mail', [
            'company'=> 'Phúc Diễn Company',
            'title_mail'=> 'Đối tác có lời nhắn', 
            'title'=> $data['name']." đã để lại lời nhắn", 
            'content' => $content, 
            'link' => url('/')
        ], function($message) use ($data){
	        $message->to($data['email'], 'Người thông báo')->subject('Khách hàng '.$data['name'].' để lại lời nhắn!');
	    });
        return \response()->json(['status' => true]);
    }

}
