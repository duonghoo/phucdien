@extends('web._layout')
@section('main')


<div id="page-content">
    <section class="breadcrumb">
        <div class="container">
            <h2>{{ $oneItem->meta_title }}</h2>
            <ul>
                <li><a href="/">Home</a> &gt;</li>
                <li><a href="{{$breadCrumb[0]['item']}}">{{$breadCrumb[0]['name']}}</a></li>
            </ul>
        </div>
    </section>


<section class="blog-page">
    <div class="container">
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