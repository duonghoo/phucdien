
<div class="col-lg-4">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- widget about -->
        <div class="widget rounded">
            <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                <img src="images/logo.svg" alt="logo" class="mb-4" />
                <p class="mb-4">Một cổng thông tin cập nhật nhưng tin tức, sự kiện liên quan đến tài chính thế giới. Phân tích những phương pháp giao dịch, chiến lược forex, chứng khoán và tiền ảo...</p>
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item"><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="{{getSiteSetting('site_twitter')}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="{{getSiteSetting('site_instagram')}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    {{-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li> --}}
                    <li class="list-inline-item"><a href="{{getSiteSetting('site_youtube')}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- widget popular posts -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Bài viết được bình chọn</h3>
                <img src="images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                {{-- <!-- post -->
                <div class="post post-list-sm circle">
                    <div class="thumb circle">
                        <span class="number">1</span>
                        <a href="blog-single.html">
                            <div class="inner">
                                <img src="images/posts/tabs-1.jpg" alt="post-title" />
                            </div>
                        </a>
                    </div>
                    <div class="details clearfix">
                        <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                        <ul class="meta list-inline mt-1 mb-0">
                            <li class="list-inline-item">29 March 2021</li>
                        </ul>
                    </div>
                </div>
                <!-- post -->
                <div class="post post-list-sm circle">
                    <div class="thumb circle">
                        <span class="number">2</span>
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
                </div>
                <!-- post -->
                <div class="post post-list-sm circle">
                    <div class="thumb circle">
                        <span class="number">3</span>
                        <a href="blog-single.html">
                            <div class="inner">
                                <img src="images/posts/tabs-3.jpg" alt="post-title" />
                            </div>
                        </a>
                    </div>
                    <div class="details clearfix">
                        <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
                        <ul class="meta list-inline mt-1 mb-0">
                            <li class="list-inline-item">29 March 2021</li>
                        </ul>
                    </div>
                </div> --}}
                Đang cập nhật
            </div>		
        </div>

        <!-- widget categories -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Khám phá chủ đề</h3>
                <img src="images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <ul class="list">
                    @foreach($categoryTree as $value)
                    <li><a href="{{ getUrlCate((object) $value) }}">{!! str_replace('---', "<span class='mx-2'></span>", $value['title']) !!}</a><span>({{$value['count']}})</span></li>
                    @endforeach
                </ul>
            </div>
            
        </div>

        <!-- widget newsletter -->
        {{-- <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Newsletter</h3>
                <img src="images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                <form>
                    <div class="mb-2">
                        <input class="form-control w-100 text-center" placeholder="Email address…" type="email">
                    </div>
                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                </form>
                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
            </div>		
        </div> --}}

        @if(!empty($page_rd))
        <!-- widget post carousel -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Page ngẫu nhiên</h3>
                <img src="images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <div class="post-carousel-widget">
                    @foreach($page_rd as $rd)
                    <!-- post -->
                    <div class="post post-carousel">
                        <div class="thumb rounded">
                            <a href="{{getUrlStaticPage($rd)}}" class="category-badge position-absolute">Page</a>
                            <a href="blog-single.html">
                                <div class="inner">
                                    {!! genImage($rd->thumbnail, 300, 200, 'img-fluid img-item-slick', $rd->title ) !!}
                                </div>
                            </a>
                        </div>
                        <h5 class="post-title mb-0 mt-4"><a href="{{getUrlStaticPage($rd)}}">{{$rd->title}}</a></h5>
                        <ul class="meta list-inline mt-2 mb-0">
                            <li class="list-inline-item"><a href="{{getUrlAuthor($rd->user)}}">{{$rd->user->fullname}}</a></li>
                            <li class="list-inline-item">{{convertDateTime($rd->displayed_time, false)}}</li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <!-- carousel arrows -->
                <div class="slick-arrows-bot">
                    <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                    <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>		
        </div>
        @endif 

        {{-- <!-- widget advertisement -->
        <div class="widget no-container rounded text-md-center">
            <span class="ads-title">- Sponsored Ad -</span>
            <a href="#" class="widget-ads">
                <img src="images/ads/ad-360.png" alt="Advertisement" />	
            </a>
        </div> --}}

        <!-- widget tags -->
        <div class="widget rounded">
            <div class="widget-header text-center">
                <h3 class="widget-title">Tag phổ biến</h3>
                <img src="images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                @if(!empty($tag))
                    @foreach ($tag as $t)
                        <a href="{{getUrlTag($t)}}" class="tag">#{{$t->title}}</a>
                    @endforeach
                @endif
            </div>		
        </div>

    </div>

</div>