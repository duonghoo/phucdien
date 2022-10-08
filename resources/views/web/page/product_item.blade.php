@extends('web._layout')
@section('main')
<div class="container my-3" style="margin-top:15rem">
    <div class="row">
        <div class="d-flex pt-2 pb-1 bg-white1 w-100 align-items-center rounded-d" style="padding-left:2rem">
            <a href="/"><i class="ti-home text_primary fs-16" style="font-size: 1.2rem; color:black"></i></a>
            <a href="/" class="d-block ms-2 text_primary fs-16" style="padding-left:1rem" title="">Trang chủ  / </a>
            <a href="{{$breadCrumb[0]['item']}}" class="d-block ms-2 text_primary fs-16" style="padding-left:0.5rem; border-bottom:1px $primary_color" title="">{{$breadCrumb[0]['name']}} </a>
        </div>
        <div class="col-lg-8 mt-4 pe-lg-0 bg-white1 rounded-2">

            <h1 class="fs-28 pt-2 text-upcase">{!! $oneItem->title !!}</h1>
            <div class="d-flex flex-wrap">
                {{-- <p class="mb-0 time-of-match text-grey3">{{$time}}</p> --}}
                {{-- <div class="ms-0 mb-3 ms-lg-auto me-3">@include('web.block._vote', ['data' => $oneItem])</div> --}}
            </div>
            
            <div class="d-block d-md-flex justify-content-between pt-2">
                <div class="main-content mr-md-4 px-2 p-md-0">
                    <div class="single-post">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                {!! genImage($oneItem->thumbnail, 750, 313, 'img-responsive thumbnail-root', $oneItem->title) !!}
                                <div class="d-flex product-imgs">
                                    {!! genImage($oneItem->thumbnail, 750, 313, 'img-responsive img-product img-product-active', $oneItem->title) !!}
                                    @if(!empty($oneItem->img1))
                                        {!! genImage($oneItem->img1, 750, 313, 'img-responsive img-product', $oneItem->title) !!}
                                    @endif
                                    @if(!empty($oneItem->img2))
                                        {!! genImage($oneItem->product->img2 ?? "", 750, 313, 'img-responsive img-product', $oneItem->title) !!}
                                    @endif
                                    @if(!empty($oneItem->img3))
                                        {!! genImage($oneItem->product->img3 ?? "", 750, 313, 'img-responsive img-product', $oneItem->title) !!}
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                {{-- <div class="blog-title"> <p class="fs-16 m-0 p-0">{{$oneItem->title}}</p></div> --}}
                                <div class="code-product">Mã sản phầm: <span>{{$oneItem->sku}}</span></div>
                                @php
                                    $color = json_decode($oneItem->color);
                                @endphp
                                <div class="color-product">Màu sắc: 
                                    @if(!empty($color))
                                        @foreach ($color as $key => $cl)
                                            <span class="color{{$key}}" style="display:inline-block; width: 13px; height: 13px; background-color: {{$cl}}; border-radius: 20%"></span>
                                        @endforeach 
                                    @else
                                    <span>Liên hệ</span>
                                    @endif

                                </div>

                                <div class="price-product">Giá bán: 

                                    @if(!empty($oneItem->price))
                                        {{number_format($oneItem->price, 0, '', ',')}}
                                    @else 
                                    <span>Liên hệ</span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>   
                </div>

                
                <div class="content">
                    <h1>Phần giới thiệu</h1>
                    <p>
                        {!! $oneItem->description !!}
                    </p>
                </div>

            </div>
        </div>
        @include('web.block._sidebar')
    </div>
    
</div>

@endsection