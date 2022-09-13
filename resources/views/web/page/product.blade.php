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
                <div class="d-flex flex-wrap">
                    {{-- <p class="mb-0 time-of-match text-grey3">{{$time}}</p> --}}
                    {{-- <div class="ms-0 mb-3 ms-lg-auto me-3">@include('web.block._vote', ['data' => $oneItem])</div> --}}
                </div>
                
                <div class="d-block d-md-flex justify-content-between">
                   
                    <div class="main-content mr-md-4 px-2 p-md-0">
                        @if(!empty($product))
                            @foreach ($product as $item)
                                <div class="col col-sm-12 col-md-3">
                                    <div class="mx-1 content d-sm-block w-100">
                                      <a href="{{getUrlProduct($item)}}">{!! genImage($item->thumbnail,263, 263, 'img-responsive border-r1') !!}</a>
                                        <div class="card-body flex-column justify-content-center">
                                            <h5 class="card-title text-center fs-16" style="margin-top:1rem; margin-bottom:1rem">{{$item->title}}</h5>
                                            <button class="btn-product text-center mx-2 add-cart" id="addcart{{$item->id}}" value="{{$item->id}}">Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <script>
                    $(".add-cart" ).click(function() {
                    var id = this.value;
                    $.ajax({                                      
                    url: '/page/add-cart',              
                    type: "post",          
                    data: {id:id,"_token":"{{ csrf_token() }}"},              
                    success: function()
                    {
                        $('#addcart'+id).html("Đã thêm vào giỏ");
                    },
                });
                });
            </script>

            @include('web.block._product_filter')
        </div>
        
    </div>
@endsection
