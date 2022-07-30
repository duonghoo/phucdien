<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="{{$seo_data['index'] ?? ''}}">
    <title>{{$seo_data['meta_title'] ?? ''}}</title>
    @if(!empty($seo_data['meta_keyword']))
        <meta name="keywords" content="{{$seo_data['meta_keyword']}}">
    @endif
    <meta name="description" content="{{$seo_data['meta_description'] ?? ''}}">
    <link rel="canonical" href="{{$seo_data['canonical'] ?? ''}}" />
    <meta property="og:title" content="{{$seo_data['meta_title'] ?? ''}}">
    @if(!empty($seo_data['site_image']))
        <meta property="og:image" content="/img/image/{{$seo_data['site_image']}}">
    @endif
    <meta property="og:site_name" content="forextradingvn">
    <meta property="og:description" content="{{$seo_data['meta_description'] ?? ''}}">
    @if(!empty($seo_data['published_time']))
        <meta property="article:published_time" content="{{$seo_data['published_time']}}" />
    @endif
    @if(!empty($seo_data['modified_time']))
        <meta property="article:modified_time" content="{{$seo_data['modified_time']}}" />
    @endif
    @if(!empty($seo_data['updated_time']))
        <meta property="article:updated_time" content="{{$seo_data['updated_time']}}" />
    @endif

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{$seo_data['meta_title'] ?? ''}}" />
    <meta name="twitter:description" content="{{$seo_data['meta_description'] ?? ''}}" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:url" content="{{$seo_data['twitter_url'] ?? ''}}" />
    @if(!empty($seo_data['site_image']))
        <meta name="twitter:image" content="{{url($seo_data['site_image'])}}" />
    @endif
    @if(!empty($seo_data['amphtml']))
        <link rel="amphtml" href="{{$seo_data['amphtml']}}">
    @endif

    <link rel="shortcut icon" href="{{url('images/favicon.png')}}" />
    <link rel="apple-touch-icon" href="{{url('images/favicon.png')}}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <div id="fb-root"></div>
    <script defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=432416328750166&autoLogAppEvents=1" nonce="730jaS1D"></script>
    {!! getSiteSetting('meta_head') ?? '' !!}

	
        @php
			$css = file_get_contents('css/page_compile/'.(!empty($css_file) ? $css_file : 'home').'.min.css' );  
		@endphp
        {!! '<style>'.$css.'</style>' !!}
    


	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	@if(!empty($schema))
		{!!$schema!!}
	@endif
</head>

<body data-spy="scroll" data-target=".navbar-fixed-top">
@include('web.block._header')
<div class="clear"></div>
@yield('main')
<div class="clear"></div>

<div class="card-area swap-position">
    {{-- <div class="coccoc-alo-ph-circle-fill" ></div>
    <a id="hotline-cta" href="#" rel="nofollow" class="hotline-cta-swap">
        <div class="card-icon text-center">
            <a href="{{getSiteSetting('site_youtube')}} ?? ''" target="_blank" ><i class="fas fa-shopping-cart"></i></a>
        </div>
    </a> --}}

    <div class="wrapper">
    <a href="/page/gio-hang">
        <div class="ring">
            
            <div class="coccoc-alo-phone coccoc-alo-green coccoc-alo-show">
                {{-- <div class="coccoc-alo-ph-circle"></div>
                <div class="coccoc-alo-ph-circle-fill"></div> --}}
                <div class="coccoc-alo-ph-img-circle"></div>
            </div>
        </div>
    </a>
    </div>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "109117821889369");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

</div>

@include('web.block._footer')
@include('web.block._script')
</body>
</html>