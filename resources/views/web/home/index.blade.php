@extends('web._layout')
@section('main')

<div id="page-content">
	@include('web.block._slider')

	<div class="container">
		<div class="row">
			<section class="col-sm-7 col-md-8 col-lg-8">
				<div class="intro">
					<h2>Welcome to Insurance press</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci nisi, porta sed diam id, venenatis dignissim urna. Duis sit amet eros a sem viverra mollis nec eu sem. Quisque rutporta sed diam id, venenatis dignissim urna. Duis sit amet eros a sem viver uisque rurum euismod fermentum.</p>
					<ul class="row">
						<li class="col-sm-4">
							<i class="fa fa-life-ring"></i>
							<h3>27x7 Support</h3>
							<p>Lorem ipsum dolor sit amet, consectetur.</p>
						</li>
						<li class="col-sm-4">
							<i class="ti-marker-alt"></i>
							<h3>Easy Claim system</h3>
							<p>Lorem ipsum dolor sit amet, consectetur.</p>
						</li>
						<li class="col-sm-4">
							<i class="ti-email"></i>
							<h3>Get Started with us</h3>
							<p>Lorem ipsum dolor sit amet, consectetur.</p>
						</li>
					</ul>
				</div>
			</section>
			<section class="col-sm-5 col-md-4 col-lg-4">
				<div class="get-quote-form">
					<h2>Get a free quote form</h2>
					<form id="get-quote">
						<div>
							<input type="text" name="name" placeholder="Your Name" />
						</div>
						<div>
							<input type="text" name="email" placeholder="Email" />
						</div>
						<div>
							<input type="text" name="ph-no" placeholder="Phone no" />
						</div>
						<div class="form-select">
							<span></span>
							<select>
								<option>Product</option>
							</select>
						</div>
						<div>
							<textarea rows="1" cols="1" placeholder="Message"></textarea>
						</div>
						<div class="text-center">
							<input type="submit" class="btn-default" value="Get Free Quote" />
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>

	{{-- product tab  --}}

	<div class="container">
		<div class="row">

			<h2 class="title">Danh sách các sản phẩm</h2>
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
		

			  <div class="card col-12 col-md-6 col-lg-3 mb-5" style="max-width: 50rem;">
                <div class="mx-1 content d-flex d-sm-block w-100">
					{!! genImage($item->product->thumbnail, 400 , 400, 'img-responsive') !!}
                  <div class="card-body d-flex flex-column justify-content-center">
					<h5 class="card-title">{{$item->product->title}}</h5>
                    <a href="#" class="btn_primary mt-3 px-lg-1 px-1 text-nowrap w-100">Xem chi tiết</a>
                  </div>
                 </div>
              </div>

			@endforeach
			@endif
		</div>
	</div>
	

</div>


@endsection