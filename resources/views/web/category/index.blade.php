@extends('web._layout')
@section('main')

<section class="page-header">
    <div class="container-xl">
        <div class="text-center">
            <h1 class="mt-0 mb-2">{{ $oneItem->meta_title }}</h1>
            <p class="fst-italic">{{ $oneItem->description }}</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{$breadCrumb[0]['item']}}">{{$breadCrumb[0]['name']}}</a></li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">

                <div class="row gy-4" id="ajax_content">

                    @if(!empty($post))
                    @foreach($post as $p)
                    <div class="col-sm-6">
                        <!-- post -->
                        <div class="post post-grid rounded bordered">
                            <div class="thumb top-rounded">
                                <a href="{{ getUrlCate($p->category) }}" class="category-badge position-absolute">{{ $p->category->title }}</a>
                                <span class="post-format">
                                    @if($p->category->title == 'video')
                                    <i class="icon-camrecorder"></i>
                                    @else
                                    <i class="icon-picture"></i>
                                    @endif
                                </span>
                                <a href="{{getUrlPost($p)}}">
                                    <div class="inner">
                                        {!! genImage($p->thumbnail, 550, 367, 'img-fluid thumb-post-list', $p->title) !!}
                                    </div>
                                </a>
                            </div>
                            <div class="details">
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">
                                        {!! genImage($p->user->thumbnail, 30, 30, 'author avatar', $p->user->fullname) !!}
                                        {{$p->user->fullname}}</a></li>
                                    <li class="list-inline-item">{{convertDateTime($p->displayed_time)}}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{getUrlPost($p)}}">{{$p->title}}</a></h5>
                                <p class="excerpt mb-0">{!! $p->desc !!}</p>
                            </div>
                            <div class="post-bottom clearfix d-flex align-items-center">
                                <div class="social-share me-auto">
                                    <button class="toggle-button icon-share"></button>
                                    <ul class="icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="more-button float-end">
                                    <a href="{{getUrlPost($p)}}"><span class="icon-options"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="fs-1">Không có dữ liệu</div>
                    @endif

                </div>

                <nav>
                    @if($loadmore)
                        <ul class="pagination justify-content-center post">
                            <a href="#" class="category-badge active load-more" aria-current="page" data-page="{{$page}}" data-category="{{$main_category}}" data-url="load-more-posts">Xem thêm</a>
                        </ul>
                    @endif
                </nav>

            </div>

            @include('web.block._sidebar')

        </div>
    </div>
</section>


@endsection