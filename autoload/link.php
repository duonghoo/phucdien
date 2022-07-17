<?php

function getUrlPost($item, $is_amp = ''){
    $item = (object) $item;
    if (!$is_amp)
        $is_amp = defined('IS_AMP') ? IS_AMP : 0;
    $slug = '';
    if ($is_amp)
        $slug = "/amp/";
    $slug .= "$item->slug-p$item->id.html";
    return url($slug);
}
function getUrlCate($item, $is_amp = ''){
    $slug = '';
    if (!$is_amp)
        $is_amp = defined('IS_AMP') ? IS_AMP : 0;
    if ($is_amp)
        $slug = "/amp/";
    $slug .= "$item->slug-c$item->id";

    return url($slug);
}
function getUrlTag($item, $is_amp = ''){
    if (!$is_amp)
        $is_amp = defined('IS_AMP') ? IS_AMP : 0;
    $slug = '';
    if ($is_amp)
        $slug = "/amp/";
    $slug .= "$item->slug-t$item->id";

    return url($slug);
}
function getUrlStaticPage($item, $is_amp = '') {
    $slug = '';
    if (!$is_amp)
        $is_amp = defined('IS_AMP') ? IS_AMP : 0;
        
    if ($is_amp)
        $slug = "/amp/";
    $slug .= "$item->slug.html";

    return url($slug);
}

function getUrlLink($slug, $is_amp = ''){
    $url = '';
    if (!$is_amp)
        $is_amp = defined('IS_AMP') ? IS_AMP : 0;
    if ($is_amp)
        $url .= "/amp";
    $check = explode('.',$slug);
    if(count($check) > 1 && end($check) == 'html'){
        $url = url($url.$slug);
    }else{
        $url = url($url.$slug).'/';
    }
    // if (substr($slug, -1) != '/') $slug .= '/';



    return $url;

}
function getUrlPage($page) {
    $parts = parse_url($_SERVER['REQUEST_URI']);
    parse_str($parts['query'], $query);
    $query['page'] = $page;
    return $parts['path'].'?'.http_build_query($query);
}

function getUrlAuthor($item, $is_amp = ''){
    if (!$is_amp)
        $is_amp = defined('IS_AMP') ? IS_AMP : 0;
    if (empty($item->slug)) return '';
    $url = '';
    if ($is_amp)
        $url = "/amp/";
    $slug = $url."author/$item->slug";
    $url = url($slug);

    return $url;
}

function tableOfContent($content) {
    preg_match_all("/<h[23456].*?<\/h[23456]>/",$content,$patt);
    if (empty($patt[0])) return $content;
    $patt2 = $patt[0];
    $index_h2 = 0;
    $index_h3 = 1;
    $danhmuc = "<div class='w-100 border py-2 px-3 mb-3'>
                    <p class='mb-2 d-flex align-items-center summary-title'>
                        <span class=\"square-blue mr-2\"></span>
                        <span class='font-weight-bold font-20 text-blue1 w-100 collapsible'>NỘI DUNG CHÍNH</span>
                    </p>";
    $danhmuc .= "<ul class='list-unstyled mb-2'>";

    foreach ($patt2 as $key=>$item){
        $contentItem = strip_tags($item);
        $slug = toSlug($contentItem,'-');
        if (strpos($item, '</h2>') !== false) {
            $index_h2++;
            $danhmuc .= "<li rel='dofollow' class='mb-1'><a class='text-black1 font-15' href='#$slug' >$index_h2. ".$contentItem."</a></li>";
            $index_h3 = 1;
        } else {
            $danhmuc .= "<li rel='dofollow' class='mb-1 pl-3'><a class='text-black1 font-15' href='#$slug' >$index_h2.$index_h3. ".$contentItem."</a></li>";
            $index_h3++;
        }
        $head = substr($item,0,3);
        $tail = substr($item,3);

        $id = " id='$slug'";
        $content = str_replace($item,$head.$id.$tail,$content);
    }
    $danhmuc .= "</ul></div>";
    $content = "$danhmuc<div class='post-content text-justify'>$content</div>";
    return $content;
}
?>
