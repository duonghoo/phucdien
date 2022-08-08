
<header>
    <div class="top-bar bg_primary">
        <div class="container">
            <div class="row ">
                <div class="col-sm-6 address">
                    <p ><i class="ti-location-pin"></i> {!! getSiteSetting('address') ?? ''!!}</p>
                </div>
                <div class="col-sm-2">
                    <select class="form-control changeLang">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }} data-content='<img src="http://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Gota07.svg/120px-Gota07.svg.png">'><img src="http://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Gota07.svg/120px-Gota07.svg.png"></option>
                        <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>Vietnamese</option>
                    </select>
                </div>
                <div class="col-sm-4 social">
                    <ul>

                        <li><a href="{{getSiteSetting('site_youtube')}} ?? ''" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
                        <li><a href="{{getSiteSetting('site_twitter')}} ?? ''" target="_blank"><i class="fab fa-twitter "></i></a></li>
                        <li><a href="{{getSiteSetting('site_instagram')}} ?? ''" target="_blank"><i class="fab fa-instagram "></i></a></li>
                        {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li> --}}
                        <li><a href="{{getSiteSetting('site_youtube')}} ?? ''" target="_blank" ><i class="fab fa-youtube "></i></a></li>
                     
                        

                        
                    </ul>
                </div>
              
            </div>
        </div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top bg_secondary" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">
                    <span>Phúc Diễn</span>
                </a>
                
                <p>Liên hệ với chúng tôi <b>{!! getSiteSetting('site_hotline') ?? ''!!}</b></p>
            </div>
            <div class="collapse navbar-collapse navbar-main-collapse">
                @include('web.block._menu',['breadCrumb' => $breadCrumb ?? ''])
            </div>
        </div>
    </nav>
</header>