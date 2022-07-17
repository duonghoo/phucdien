<!-- search popup area -->
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form">
			<input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>
	</div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
		<img src="images/logo.svg" alt="Forextradingvn" />
	</div>


	@if(!empty($mainMenuMobile))
	<!-- menu -->
	<nav>
		<ul class="vertical-menu">
			@foreach($mainMenuMobile as $key => $value)
			<li class="{{ !empty($breadCrumb[0]) && ($breadCrumb[0]['item'] == url($value['url'])) ? 'active' : '' }}">
				<a href="{{ $value['url'] }}" title="{{$value['name']}}">{{$value['name']}}</a>
				@if(!empty($value['children']))
				<ul class="{{ !empty($value['children']) ? 'submenu' : '' }}">
					@foreach($value['children'] as $item)
						<li class="{{ !empty($breadCrumb[0]) && ($breadCrumb[0]['item'] == url($item['url'])) ? 'active' : '' }}"><a href="{{ $item['url'] }}" title="{{$item['name']}}">{{$item['name']}}</a></li>
					@endforeach
				</ul>
				@endif
			</li>
			@endforeach
	</nav>
	
	@endif
	<!-- social icons -->
	<ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
		<li class="list-inline-item"><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
		<li class="list-inline-item"><a href="{{getSiteSetting('site_twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
		<li class="list-inline-item"><a href="{{getSiteSetting('site_instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
		{{-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
		<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li> --}}
		<li class="list-inline-item"><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
	</ul>
</div>