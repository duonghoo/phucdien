@extends('web._layout')
@section('main')

<!-- cover header -->
<section class="single-cover data-bg-image" data-bg-image="{{getThumbnail($oneItem->thumbnail)}}">

    <div class="container-xl">

        <div class="cover-content post">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{$breadcrumb[0]['item']}}">{{$breadcrumb[0]['name']}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$oneItem->meta_title}}</li>
                </ol>
            </nav>

            <!-- post header -->
            <div class="post-header">
                <h1 class="title mt-0 mb-3">{{$oneItem->title}}</h1>
                <ul class="meta list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="{{getUrlAuthor($oneItem->user)}}">
                            {!!  genImage($oneItem->user->thumbnail, 30, 30, 'author avatar', $oneItem->user->fullname) !!}
                            {{$oneItem->user->fullname}}</a></li>
                    <li class="list-inline-item">{{$time}}</li>
                    <li class="list-inline-item">
                        @include('web.block._vote', ['data' => $oneItem])
                    </li>
                </ul>
            </div>
        </div>

    </div>

</section>


<!-- section main content -->
<section class="main-content">
    <div class="container-xl">

        <div class="row gy-4">

            <div class="col-lg-8">
                <!-- post single -->
                <div class="post post-single">
                    <!-- post content -->
                    <div class="post-content clearfix">
                        <p>{!!$oneItem->description!!}</p>

                        <!-- <figure class="figure">
                            <img src="/img/image/{{$oneItem->thumbnail}}" class="figure-img img-fluid rounded" alt="{{$oneItem->title}}">
                            {{-- <figcaption class="figure-caption text-center">A caption for the above image.</figcaption> --}}
                        </figure> -->

                        <div id="table-of-content">
                            {!! short_code($oneItem->content) !!}
                        </div>

                        
                    </div>
                    <!-- post bottom section -->
                    <div class="post-bottom">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6 col-12 text-center text-md-start">
                                @if(!empty($oneItem->tags))
                                <!-- tags -->
                                @foreach($oneItem->tags as $t)
                                <a href="{{getUrlTag($t)}}" class="tag">#{{$t->title}}</a>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-md-6 col-12">
                                <!-- social icons -->
                                <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="spacer" data-height="50"></div>

                <div class="about-author padding-30 rounded">
                    <div class="thumb">
                        {!! genImage($oneItem->user->thumbnail, 30, 30, 'author avatar', $oneItem->user->fullname) !!}
                    </div>
                    <div class="details">
                        <h4 class="name"><a href="{{getUrlAuthor($oneItem->user)}}">{{$oneItem->user->fullname}}</a></h4>
                        <p>{!! $oneItem->user->description !!}</p>
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            @if(!empty($oneItem->user->option))
                                <li class="list-inline-item"><a href="{{$oneItem->user->option->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="{{$oneItem->user->option->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="{{$oneItem->user->option->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="{{$oneItem->user->option->reddit}}" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                                {{-- <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li> --}}
                            @endif
                            
                        </ul>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>
              
            </div>

            @include('web.block._sidebar')

        </div>

    </div>
</section>
@include('web.block._instagram')

@endsection
