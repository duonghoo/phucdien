
<footer>
    <div class="container">
        <div class="row contact-sec">
            <div class="col-md-5 col-lg-5">
                <h2><span>Hotline 1</span></h2>
                <div class="row">
                    <div class="col-sm-6">
                        <p>{!! getSiteSetting('address') !!}
                            {{-- <br/>Zip - 382481 --}}
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <ul>
                            <li><a href="#"><i class="fa fa-phone"></i> {!! getSiteSetting('site_hotline') !!}</a></li>
                            <li class="text-nowrap"><a href="#"><i class="ti-email"></i> {!! getSiteSetting('site_email') !!}</a></li>
                        </ul>
                    </div>
                </div>
                <a href="/lien-he.html" class="btn-default">Liên hệ</a>
            </div>

        </div>
        <div class="row">
            <div class="col-md-8 col-lg-8">
                @if(!empty($menu_footer))
                
                <ul class="footer-nav">
                    @foreach($menu_footer as $menu_f)
                    <li><a href="{{$menu_f['url']}}">{{$menu_f['name']}}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-md-2 col-lg-2 col-md-offset-2 col-lg-offset-2">
                <ul class="footer-social">
                    <li><a href="{{getSiteSetting('site_facebook')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{getSiteSetting('site_twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{getSiteSetting('site_instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li> --}}
                    <li><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6 text-start">
                    <p>Copyright &copy; 2022 distributed by <a href="https://themewagon.com/">MD</a></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-right">
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>