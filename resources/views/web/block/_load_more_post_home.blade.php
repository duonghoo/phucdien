@if(!empty($post))
@foreach($post as $item_recent)
<div class="col-md-12 col-sm-6">
    <!-- post -->
    <div class="post post-list clearfix">
        <div class="thumb rounded">
            <a href="{{getUrlPost($item_recent)}}">
                <div class="inner">
                    {!! genImage($item_recent->thumbnail, 275, 208, 'img-fluid img-item-medium') !!}
                </div>
            </a>
        </div>
        <div class="details">
            <ul class="meta list-inline mb-3">
                <li class="list-inline-item"><a href="{{getUrlAuthor($item_recent->user)}}">
                    {!! genImage($item_recent->user->thumbnail, 30, 30, 'author avatar', $item_recent->user->fullname) !!}{{$item_recent->user->fullname}}</a></li>
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
@endif