
<header>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 address">
                    <i class="ti-location-pin"></i> 2109 WS 09 Oxford Rd #127 ParkVilla Hills, MI 48334
                </div>
                <div class="col-sm-6 social">
                    <ul>
                        <li><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{getSiteSetting('site_twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{getSiteSetting('site_instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li> --}}
                        <li><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    Insurance<span>Press</span>
                </a>
                <p>Call Us Now <b>+215 (362) 4579</b></p>
            </div>
            <div class="collapse navbar-collapse navbar-main-collapse">
                @include('web.block._menu',['breadCrumb' => $breadCrumb ?? ''])
            </div>
        </div>
    </nav>
</header>