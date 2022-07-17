<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte\Client;
use App\Models\ImageUpload;
use App\Models\Post;
use App\Models\Post_Category;
use App\Service\Upload;
use Exception;

class crawler_blogfxvn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:blogfxvn {link} {--category_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    private $client = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        if($this->client == null){
            $this->client = new Client();
        }
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $link = $this->argument('link');
        $category = $this->option('category_id');
        $crawler = $this->client->request('GET', $link);
        $crawler->filter('.post-outer-container .post-title a')->each(function($node,$i) use($category){
            $data = $this->getData($node->link()->getUri(), $category);
        });


        return 0;
    }

    private function getData($link, $category){
        $crawler = $this->client->request('GET', $link);
        $data = [];
        $data['title'] = $crawler->filter('.post-outer-container .post-title')->text();
        $image = $crawler->filter('.post-outer-container img')->image();
        $content = $crawler->filter('.post-outer-container p')->each(function($node, $i){
            // var_dump($node->html());
            return $node->html();
        });
        $data['content'] = '';
        foreach($content as $c){
            $data['content'] .= $c;
        }
        // upload image get link
        $data_res = file_get_contents($image->getUri());
        $data_res = Upload::uploadViaStream($data_res);

        $post = Post::where('thumbnail', $data_res['data']->data->image->filename)->first();
        if(!empty(ImageUpload::where('name', $data_res['data']->data->image->filename)->first())){
            if(!empty($post)){
                Post_Category::create(['category_id' => $category, 'post_id' => $post->id, 'is_primary' => 1]);
                $this->info("Update category post \"".$post->title."\"");
                return 0;
            }else{
                $post = Post::where('title', $data['title'])->first();
                $post->thumbnail = $data_res['data']->data->image->filename;
                $id = $post->save();
                Post_Category::create(['category_id' => $category, 'post_id' => $id, 'is_primary' => 1]);
                $this->info("Update post \"".$post->title."\"");
                return 0;
            }
        }else{
            $img = new ImageUpload();
            $img->name = $thumbnail = $data_res['data']->data->image->filename;
            $img->data = json_encode(['image' => $data_res['data']->data->image, 'thumb' => $data_res['data']->data->thumb]);
            $img->delete_url = $data_res['data']->data->delete_url;
            $img->save();
            $thumbnail = ImageUpload::find($img->id);
            $thumbnail = $thumbnail->name;
        }
        

        $image = $data_res['data']->data->image->filename;

        // save post
        try{
            $post = new Post();
            $post->title = $data['title'];
            $post->meta_title = $data['title'];
            $post->slug = toSlug($data['title']);
            $post->content = $data['content'];
            $post->category_primary_id = $category;
            $post->thumbnail = $thumbnail;
            $post->user_id = 1;
            $post->status = 1;
            $post->index = 1;
            $post->crawler = 1;
            $post->displayed_time = date('Y-m-d H:i:s');
            $post->word_count = 50;
            $post->seo_score = 50;
            $id = $post->save();
            Post_Category::create(['category_id' => $category, 'post_id' => $id, 'is_primary' => 1]);
        }catch(\Illuminate\Database\QueryException $e){
            $this->error($e->getMessage());
        }
        

        $this->info("Insert post \"".$data["title"]."\"");
    }
}
