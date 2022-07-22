@extends('web._layout')
@section('main')



<div id="page-content">
    <section class="breadcrumb">
        <div class="container">
            <h2>{{ $oneItem->meta_title }}</h2>
            <ul>
                <li><a href="/">Home</a> &gt;</li>
                <li><a href="{{$breadcrumb[0]['item']}}">{{$breadcrumb[0]['name']}}</a></li>
            </ul>
        </div>
    </section>
    <section class="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">        
                    <div class="single-post">
                        <div class="blog-img">
                            <a href="#">
                                {!! genImage($oneItem->thumbnail, 750, 313, 'img-responsive', $oneItem->title) !!}
                            </a>
                            <div class="blog-icon"><img src="images/example/icon2.png"></div>
                        </div>
                        <h2 class="blog-title">{{$oneItem->title}}</h2>
                        <div class="blog-meta">
                            <a href="" class="ml-0"><i class="blue-text fa fa-calendar"></i> {{convertDateTime($oneItem->displayed_time)}}</a> 
                            <a href="{{getUrlAuthor($oneItem->user)}}"><i class="blue-text fa fa-user"></i> {{$oneItem->user->fullname}}</a> 
                        </div>
                        <div id="table-of-content">
                            {!! short_code($oneItem->content) !!}
                        </div>
                    </div>
                    <div class="social-post">
                        <div>{!! genImage($oneItem->user->thumbnail, 100, 100, 'img-responsive social-img', $oneItem->user->fullname) !!}</div>
                        <div class="social-text">
                            <h6><i class="fa fa-user mr-5"></i> {{$oneItem->user->fullname}}</h6>
                            <h5>"{{$oneItem->user->description}}"</h5>
                        </div>
                    </div>
                </div>
                @include('web.block._sidebar')
            </div>
        </div>
    </section>
    

</div>

@endsection
