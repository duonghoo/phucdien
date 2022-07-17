<!-- footer -->
<footer>
    <div class="container-xl">
        <div class="footer-inner">
            <div class="row d-flex align-items-center gy-4">
                <!-- copyright text -->
                <div class="col-md-4">
                    {!! getSiteSetting('site_dmca') !!}
                    <span class="copyright">Copyright © 2022 by Forextradingvn. All rights reserved reserved</span>
                </div>

                <!-- social icons -->
                <div class="col-md-4 text-center">
                    <ul class="social-icons list-unstyled list-inline mb-0">
                        <li class="list-inline-item"><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="{{getSiteSetting('site_twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="{{getSiteSetting('site_instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li> --}}
                        <li class="list-inline-item"><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>

                <!-- go to top button -->
                <div class="col-md-4">
                    <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
                </div>
            </div>
        </div>
    </div>
</footer>