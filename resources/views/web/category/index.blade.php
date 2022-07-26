@extends('web._layout')
@section('main')


<div id="page-content">
    


<section class="blog-page">
    
    <div class="container">

        <div class="d-flex pt-2 pb-1 bg-white1 w-100 align-items-center rounded-d mt-3">
            <a href="/"><i class="ti-home text_primary fs-16" style="font-size: 1.2rem; color:black"></i></a>
            <a href="/" class="d-block ms-2 text_primary fs-16" style="padding-left:1rem" title="">Trang chủ  / </a>
            <a href="{{$breadCrumb[0]['item']}}" class="d-block ms-2 text_primary fs-16" style="padding-left:0.5rem; border-bottom:1px $primary_color" title="">{{$breadCrumb[0]['name']}} </a>
        </div>

        <div class="row">
            <div class="col-sm-8" id="ajax_content">
                @if(!empty($post))
                @foreach($post as $p)
                <div class="single-post">
                    <div class="blog-img">
                        <a href="{{getUrlPost($p)}}">
                            {!! genImage($p->thumbnail, 550, 367, 'img-responsive thumb-post-list', $p->title) !!}
                        </a>
                        <div class="blog-icon"><img src="/images/example/icon2.png"></div>
                    </div>
                    <h2 class="blog-title">{{$p->title}}</h2>
                    <div class="blog-meta">{{convertDateTime($p->displayed_time)}} </div>
                    <p>{!! get_limit_content($p->desc, 150) !!}</p>
                    <div class="blog-btn">
                        <a href="{{getUrlPost($p)}}" class="btn-default">Read More</a>
                        <div class="img-inline">{!! genImage($p->user->thumbnail, 30, 30) !!}<a href="{{getUrlAuthor($p->user)}}">{{$p->user->fullname}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            @if(!IS_AMP)
             @if($loadmore)

                <div class="my-3 category-load-more text-center">
                        <a href="#" class="nav-link text-black4 load-more" data-category="{{$main_category}}">Tải thêm bài viết</a>
                </div>
                @endif
            @endif
            @include('web.block._sidebar')

        </div>
    </div>
</section>

</div>

@endsection