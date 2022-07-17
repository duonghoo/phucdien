@extends('web._layout')
@section('main')
    <div class="container my-3">
        <div class="d-flex pt-2 ps-2 pb-1 bg-white1 w-100 align-items-center rounded-d ms-2">
            <a href="/"><i class="icon-home" style="font-size: 1.2rem; color:black"></i></a>
            <a href="/" class="d-block ms-2" title="">Trang chủ / </a>
            <a href="{{$breadCrumb[0]['item']}}" class="d-block ms-2" title="">{{$breadCrumb[0]['name']}} </a>
            
        </div>
        <div class="row">
            <div class="col-lg-8 mt-4 pe-lg-0">
                <div class="d-block d-md-flex justify-content-between">
                    <div class="main-content mr-md-4 px-2 p-md-0">
                        
                        <div class="row">
                            <div class="col-12 col-md-11">
                                @if(empty($oneItem->description))
                                <div class="single-header">
                                    <div class="font-weight-bold mb-3">{!! $oneItem->description !!}</div>
                                </div>
                                @endif
        
                                <div class="line-height-24 entry-content {{$ltd ? 'table_ltd' : ''}}">
                                    {!! short_code($oneItem->content) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('web.block._sidebar')
        </div>
        
    </div>
@endsection
