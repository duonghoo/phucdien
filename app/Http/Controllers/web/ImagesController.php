<?php
namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\InternalLink;
use App\Models\Match;
use App\Models\User;
use Request;
use Redirect;
use App\Models\ImageUpload;
// use App\Models\Category;
// //use App\Models\Post_tag;
// use App\Models\Post_Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function __construct()
    {

    }

    public function upload(){
        return Request::all();
    }

    public function proxy($key,$slug){
        $data = ImageUpload::where('name', $slug)->first();
        if(empty($data)) abort(404); 
        
        $key = empty($key)? 'image' : $key; // get image large size default
        $img = (array) json_decode($data->data);
        // dd($img);
        $img = $img[$key];
        // $stream = $this->get_stream($img->url);
        // dd($img->url);
        $ext = explode('.',$img->url);
        // $ext = end($ext);
        // dd($ext);
        $this->get_stream($img->url);


        // $img = Image::make($stream);
        // return response()->make($img->encode($img->mime()), 200, array('Content-Type' => $img->mime(),'Cache-Control'=>'max-age=86400, public'));
    }

    private function get_stream($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
        curl_setopt($ch, CURLOPT_BUFFERSIZE, 12800);
        curl_setopt($ch, CURLOPT_NOPROGRESS, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36');
        curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, function($DownloadSize, $Downloaded, $UploadSize, $Uploaded) { return ($Downloaded > 1024 * 4096) ? 1 : 0; } ); # max 4096kb

        $version = curl_version();
        if ($version !==FALSE && ($version['features'] & CURL_VERSION_SSL)) { // Curl do support SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        }

        $response = curl_exec ($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);



        curl_close ($ch);

        $header_blocks =  array_filter(preg_split('#\n\s*\n#Uis' , substr($response, 0, $header_size)));
        $header_array = explode("\n", array_pop($header_blocks));

        $body = substr($response, $header_size);

        $headers = [];
        foreach($header_array as $header_value) {
            $header_pieces = explode(':', $header_value);
            if(count($header_pieces) == 2) {
                $headers[strtolower($header_pieces[0])] = trim($header_pieces[1]);
            }
        }

        if (array_key_exists('content-type', $headers)) {
            $ct = $headers['content-type'];
            if (preg_match('#image/png|image/.*icon|image/jpe?g|image/gif|image/webp|image/svg\+xml#', $ct) !== 1) {
                header('HTTP/1.1 404 Not Found');
                exit;
            }
            header('Content-Type: ' . $ct);
        } else {
            header('HTTP/1.1 404 Not Found');
            exit;
        }

        if (array_key_exists('content-length', $headers))
            header('Content-Length: ' . $headers['content-length']);
        if (array_key_exists('expires', $headers))
            header('Expires: ' . $headers['expires']);
        if (array_key_exists('cache-control', $headers))
            header('Cache-Control: ' . $headers['cache-control']);
        if (array_key_exists('last-modified', $headers))
            header('Last-Modified: ' . $headers['last-modified']);
        echo $body;
        exit;
        
    }

}
