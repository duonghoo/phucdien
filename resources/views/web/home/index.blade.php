@extends('web._layout')
@section('main')


	<!-- hero section -->
	<section id="hero">

		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">
					
					@if(!empty($post_feature))
					<!-- featured post large -->
					<div class="post featured-post-lg">
						<div class="details clearfix">
							<a href="{{getUrlCate($post_feature->category)}}" class="category-badge">{{$post_feature->category->title}}</a>
							<h2 class="post-title"><a href="{{getUrlPost($post_feature)}}">{{$post_feature->title}}</a></h2>
							<ul class="meta list-inline mb-0">
								<li class="list-inline-item"><a href="{{getUrlAuthor($post_feature->user)}}">{{$post_feature->user->fullname}}</a></li>
								<li class="list-inline-item">{{convertDateTime($post_feature->displayed_time)}}</li>
							</ul>
						</div>
						<a href="{{getUrlPost($post_feature)}}">
							<div class="thumb rounded">
								<div class="inner data-bg-image" data-bg-image="{{getThumbnail($post_feature->thumbnail, 736, 533)}}"></div>
							</div>
						</a>
					</div>
					@endif

				</div>

				<div class="col-lg-4">

					<!-- post tabs -->
					<div class="post-tabs rounded bordered">
						<!-- tab navs -->
						<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
							<li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Xu hướng</button></li>
							<li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Tin tức</button></li>
						</ul>
						<!-- tab contents -->
						<div class="tab-content" id="postsTabContent">
							<!-- loader -->
							<div class="lds-dual-ring"></div>

							@if(!empty($trending))
							<!-- popular posts -->
							<div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">

								@foreach($trending as $item_trending)
								<!-- post -->
								<div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="{{getUrlCate($item_trending->category)}}">
											<div class="inner">
												{!! genImage($item_trending->thumbnail, 60, 60 ,'img-fluid avatar', $item_trending->title) !!}
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{getUrlPost($item_trending)}}">{{$item_trending->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{convertDateTime($item_trending->displayed_time)}}</li>
										</ul>
									</div>
								</div>
								@endforeach
							</div>
							@endif

							<!-- recent posts -->
							<div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
								<!-- post -->
								{{-- <div class="post post-list-sm circle">
									<div class="thumb circle">
										<a href="blog-single.html">
											<div class="inner">
												<img src="images/posts/tabs-2.jpg" alt="post-title" />
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">29 March 2021</li>
										</ul>
									</div>
								</div> --}}
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Phân tích kĩ thuật</h3>
						<img src="images/wave.svg" class="wave" alt="wave" />
					</div>

					@if(!empty($tech))
					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
							<div class="col-sm-6">
								<!-- post -->
								<div class="post">
									<div class="thumb rounded">
										<a href="{{getUrlCate($tech[0]->category)}}" class="category-badge position-absolute">{{$tech[0]->category->title}}</a>
										<span class="post-format">
											<i class="icon-picture"></i>
										</span>
										<a href="{{getUrlPost($tech[0])}}">
											<div class="inner">
												{!! genImage($tech[0]->thumbnail, 550, 397, 'img-fluid img-item-large', $tech[0]->title) !!}
											</div>
										</a>
									</div>
									<ul class="meta list-inline mt-4 mb-0">
										<li class="list-inline-item"><a href="{{getUrlAuthor($tech[0]->user)}}">
											{!! genImage($tech[0]->user->thumbnail, 30,30,'author avatar', $tech[0]->user->fullname) !!}
											{{$tech[0]->user->fullname}}</a></li>
										<li class="list-inline-item">{{convertDateTime($tech[0]->displayed_time)}}</li>
									</ul>
									<h5 class="post-title mb-3 mt-3"><a href="{{getUrlPost($tech[0])}}">{{$tech[0]->title}}</a></h5>
									<p class="excerpt mb-0">{!! $tech[0]->desc !!}</p>
								</div>
							</div>
							@php unset($tech[0]); @endphp
							<div class="col-sm-6">
								@foreach ($tech as $item_tech)								
								<!-- post -->
								<div class="post post-list-sm square">
									<div class="thumb rounded">
										<a href="{{getUrlPost($item_tech)}}">
											<div class="inner">
												{!! genImage($item_tech->thumbnail, 110, 80, 'img-fluid img-item-small', $item_tech->title) !!}
											</div>
										</a>
									</div>
									<div class="details clearfix">
										<h6 class="post-title my-0"><a href="{{getUrlPost($item_tech)}}">{{$item_tech->title}}</a></h6>
										<ul class="meta list-inline mt-1 mb-0">
											<li class="list-inline-item">{{convertDateTime($item_tech->displayed_time)}}</li>
										</ul>
									</div>
								</div>
								<!-- post -->
								@endforeach
								
								
							</div>
						</div>
					</div>
					@endif

					<div class="spacer" data-height="50"></div>

					{{-- <!-- horizontal ads đoạn quảng cáo-->
					<div class="ads-horizontal text-md-center">
						<span class="ads-title">- Sponsored Ad -</span>
						<a href="#">
							<img src="images/ads/ad-750.png" alt="Advertisement" />
						</a>
					</div> --}}

					<div class="spacer" data-height="50"></div>

					@if(!empty($market))
					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Nhận định thị trường</h3>
						<img src="images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">
						<div class="row gy-5">
							@foreach ($market as $key => $item_market)
								@if($key < 2)
								<div class="col-sm-6">
									<!-- post large -->
									<div class="post">
										<div class="thumb rounded">
											<a href="{{getUrlCate($item_market->category)}}" class="category-badge position-absolute">{{$item_market->category->title}}</a>
											<span class="post-format">
												<i class="icon-picture"></i>
											</span>
											<a href="{{getUrlPost($item_market)}}">
												<div class="inner">
													{!!  genImage($item_market->thumbnail, 550, 395, 'img-fluid img-item-large', $item_market->title) !!}
												</div>
											</a>
										</div>
										<ul class="meta list-inline mt-4 mb-0">
											<li class="list-inline-item"><a href="{{getUrlAuthor($item_market->user)}}">
												{!! genImage($item_market->user->thumbnail, 30, 30, 'author avatar', $item_market->user->fullname) !!}
												{{$item_market->user->fullname}}</a></li>
											<li class="list-inline-item">{{convertDateTime($item_market->displayed_time)}}</li>
										</ul>
										<h5 class="post-title mb-3 mt-3"><a href="{{getUrlPost($item_market)}}">{{$item_market->title}}</a></h5>
										<p class="excerpt mb-0">{!! $item_market->desc !!}</p>
									</div>
								</div>
								@else
									<div class="col-sm-6">
										<!-- post -->
										<div class="post post-list-sm square before-seperator">
											<div class="thumb rounded">
												<a href="{{getUrlPost($item_market)}}">
													<div class="inner">
														{!! genImage($item_market->thumbnail, 110, 80, 'img-fluid img-item-small', $item_market->title) !!}
													</div>
												</a>
											</div>
											<div class="details clearfix">
												<h6 class="post-title my-0"><a href="{{getUrlPost($item_market)}}">{{$item_market->title}}</a></h6>
												<ul class="meta list-inline mt-1 mb-0">
													<li class="list-inline-item">{!! get_limit_content($item_market->desc, 150) !!}</li>
												</ul>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>
					@endif

					<div class="spacer" data-height="50"></div>

					@if(!empty($strategy))
					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Phương pháp chiến lược</h3>
						<img src="images/wave.svg" class="wave" alt="wave" />
						<div class="slick-arrows-top">
							<button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
							<button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
						</div>
					</div>

					<div class="row post-carousel-twoCol post-carousel">
						@foreach($strategy as $item_strategy)
						<!-- post -->
						<div class="post post-over-content col-md-6">
							<div class="details clearfix">
								<a href="{{getUrlCate($item_strategy->category)}}" class="category-badge">{{$item_strategy->category->title}}</a>
								<h4 class="post-title"><a href="{{getUrlCate($item_strategy)}}">{{$item_strategy->title}}</a></h4>
								<ul class="meta list-inline mb-0">
									<li class="list-inline-item"><a href="{{getUrlAuthor($item_strategy->user)}}">{{$item_strategy->user->fullname}}</a></li>
									<li class="list-inline-item">{{convertDateTime($item_strategy->displayed_time, false)}}</li>
								</ul>
							</div>
							<a href="{{getUrlCate($item_strategy)}}">
								<div class="thumb rounded">
									<div class="inner">
										{!! genImage($item_strategy->thumbnail, 356, 297, 'img-fluid img-item-large', $item_strategy->category->title) !!}
									</div>
								</div>
							</a>
						</div>
						@endforeach
					</div>
					@endif

					<div class="spacer" data-height="50"></div>

					@if(!empty($recent_post))
					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Bài viết gần đây</h3>
						<img src="images/wave.svg" class="wave" alt="wave" />
					</div>

					<div class="padding-30 rounded bordered">

						<div class="row" id="ajax_content">
							
							@foreach($recent_post as $item_recent)
							<div class="col-md-12 col-sm-6">
								<!-- post -->
								<div class="post post-list clearfix">
									<div class="thumb rounded">
										<a href="{{getUrlPost($item_recent)}}">
											<div class="inner">
												{!! genImage($item_recent->thumbnail, 275, 208,  'img-fluid img-item-medium', $item_recent->title) !!}
											</div>
										</a>
									</div>
									<div class="details">
										<ul class="meta list-inline mb-3">
											<li class="list-inline-item"><a href="{{getUrlAuthor($item_recent->user)}}">
												{!! genImage($item_recent->user->thumbnail, 30, 30, 'author avatar', $item_recent->user->fullname) !!}
												{{$item_recent->user->fullname}}</a></li>
											<li class="list-inline-item"><a href="{{getUrlAuthor($item_recent->category)}}">{{$item_recent->category->title}}</a></li>	
										</ul>
										<h5 class="post-title"><a href="{{getUrlPost($item_recent)}}">{{$item_recent->title}}</a></h5>
										<ul class="meta list-inline">
											<li class="list-inline-item">{{convertDateTime($item_recent->displayed_time, true)}}</li>
										</ul>
										<p class="excerpt mb-0">{!! get_limit_content($item_recent->des, 150) !!}</p>
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
												<a href="{{getUrlPost($item_recent)}}"><span class="icon-options"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
						@if($loadmore)
							<!-- load more button -->
							<div class="text-center">
								<button class="btn btn-simple load-more" data-url="load-more-posts-home" data-page="{{$page}}">Xem thêm</button>
							</div>
						@endif

					</div>
					@endif

				</div>
				@include('web.block._sidebar')

			</div>

		</div>
	</section>

	@include('web.block._embed')
	


@endsection