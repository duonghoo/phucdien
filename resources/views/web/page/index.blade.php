@extends('web._layout')
@section('main')
    <div class="container my-3" style="margin-top:15rem">
        <div class="row ">
            <div class="d-flex pt-2 pb-1 bg-white1 w-100 align-items-center rounded-d" style="padding-left:2rem">
                <a href="/"><i class="ti-home text_primary fs-16" style="font-size: 1.2rem; color:black"></i></a>
                <a href="/" class="d-block ms-2 text_primary fs-16" style="padding-left:1rem" title="">Trang chủ  / </a>
                <a href="{{$breadCrumb[0]['item']}}" class="d-block ms-2 text_primary fs-16" style="padding-left:0.5rem; border-bottom:1px $primary_color" title="">{{$breadCrumb[0]['name']}} </a>
            </div>
            <div class="col-lg-8 mt-4 pe-lg-0 bg-white1 rounded-2">

                <h1 class="fs-28 pt-2 text-upcase">{{$oneItem->title}}</h1>
                <div class="d-flex flex-wrap">
                    <p class="mb-0 time-of-match text-grey3">{{$time}}</p>
                    {{-- <div class="ms-0 mb-3 ms-lg-auto me-3">@include('web.block._vote', ['data' => $oneItem])</div> --}}
                </div>
                
                <div class="d-block d-md-flex justify-content-between">
                    <div class="main-content mr-md-4 px-2 p-md-0">
                        
                        <div class="row">
                            <div class="col-12 col-md-11 font-weight-bold">
                                @if(!empty($oneItem->thumbnail))
                                {!! genImage($oneItem->thumbnail, 736, 530, 'img-fluid w-100', $oneItem->title) !!}
                                @endif
                                @if(!empty($oneItem->description))
                                <div class="single-header">
                                    <div class="fst-italic mb-3">{!! $oneItem->description !!}</div>
                                </div>
                                @endif
                                <div class="line-height-24 entry-content max-100 w-100" style="margin-top: 2rem">
                                    {!! short_code($oneItem->content) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($breadCrumb[0]['name']=='Giới thiệu')

            @else
            @include('web.block._sidebar')
            @endif
        </div>
        
    </div>
@endsection
