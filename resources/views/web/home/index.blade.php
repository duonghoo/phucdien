@extends('web._layout')
@section('main')

<div id="page-content">
	@include('web.block._slider')

	<div class="container">
		<div class="row">
			<section class="col-sm-7 col-md-8 col-lg-8">
				<div class="intro">
					<h2>Chào mừng bạn đến với Phúc Diễn</h2>
					<p>Ở đây chúng tôi chuyên sản xuất và cung cấp bao bì</p>
					<ul class="row">
						<li class="col-sm-4">
							<i class="fa fa-life-ring"></i>
							<h3>Hỗ trợ tận tâm</h3>
							<p>Lorem ipsum dolor sit amet, consectetur.</p>
						</li>
						<li class="col-sm-4">
							<i class="ti-marker-alt"></i>
							<h3>Dễ dàng đặt hàng</h3>
							<p>Lorem ipsum dolor sit amet, consectetur.</p>
						</li>
						<li class="col-sm-4">
							<i class="ti-email"></i>
							<h3>Liên hệ với chúng tôi</h3>
							<p>Lorem ipsum dolor sit amet, consectetur.</p>
						</li>
					</ul>
				</div>
			</section>
			<section class="col-sm-5 col-md-4 col-lg-4">
				<div class="get-quote-form">
					<h2>Liên hệ với chúng tôi</h2>
					<form id="get-quote">
						<div>
							<input type="text" name="name" placeholder="Tên của bạn" />
						</div>
						<div>
							<input type="text" name="email" placeholder="Email" />
						</div>
						<div>
							<input type="text" name="ph-no" placeholder="Số điện thoại" />
						</div>
						<div class="form-select">
							<span></span>
							<select class="form-control product" name="product">
								<option value="0">Sản phẩm</option>
							</select>
						</div>
						<div>
							<textarea name="content" rows="1" cols="1" placeholder="Lời nhắn"></textarea>
						</div>
						<div class="text-center">
							<input type="submit" class="btn-default" value="Gửi mail" />
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>

	{{-- product tab  --}}

	<div class="container">
		<div class="row mt-3">

			<h2 class="title ms-2" style="">Danh sách các sản phẩm</h2>
			{{-- @if(!empty($product))
			@foreach ($product as $item)
			<div class="col-sm-12 col-md-3 py-0 px-2 rounded">
				<div class="p-1">
					{!! genImage($item->product->thumbnail, 400 , 400, 'img-responsive') !!}
				</div>
				<div class="p-1 border">
					<h3 class="post_title font-14">{{$item->product->title}}</h3>
					<button class="btn btn-primary w-100 mx-2"><a href="{{getUrlPost($item)}}">Xem sản phẩn</a></button>
				</div>
			</div>
			@endforeach --}}
			@if(!empty($product))
			@foreach ($product as $item)
			  <div class="card col-12 col-md-6 col-lg-3 mb-5 mt-3" style="max-width: 50rem">
                <div class="mx-1 content d-sm-block w-100">
					{!! genImage($item->product->thumbnail, 400 , 400, 'img-responsive border-r1') !!}
                  <div class="card-body flex-column justify-content-center">
					<h5 class="card-title text-center fs-16" style="margin-top:1rem; margin-bottom:1rem">{{$item->product->title}}</h5>
                    <a href="{{getUrlPost($item)}}" class="btn-product text-center mx-2">Xem chi tiết</a>
                  </div>
                 </div>
              </div>

			@endforeach
			@endif
		</div>
	</div>
	

</div>


@endsection