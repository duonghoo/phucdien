

@if(!empty($post))
@foreach($post as $p)
<div class="col-sm-6">
<!-- post -->
    <div class="post post-grid rounded bordered">
        <div class="thumb top-rounded">
            <a href="{{ getUrlCate($p->category) }}" class="category-badge position-absolute">{{ $p->category->title }}</a>
            <span class="post-format">
                @if($p->category->title == 'video')
                <i class="icon-camrecorder"></i>
                @else
                <i class="icon-picture"></i>
                @endif
            </span>
            <a href="{{getUrlPost($p)}}">
                <div class="inner">
                    {!! genImage($item_recent->thumbnail, 550, 367, 'img-fluid thumb-post-list') !!}
                </div>
            </a>
        </div>
        <div class="details">
            <ul class="meta list-inline mb-0">
                <li class="list-inline-item"><a href="#">
                    {!! genImage($p->user->thumbnail, 30, 30, 'author avatar', $p->user->fullname) !!}
                    {{$p->user->fullname}}</a></li>
                <li class="list-inline-item">{{convertDateTime($p->displayed_time)}}</li>
            </ul>
            <h5 class="post-title mb-3 mt-3"><a href="{{getUrlPost($p)}}">{{$p->title}}</a></h5>
            <p class="excerpt mb-0">{!! $p->desc !!}</p>
        </div>
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
                <a href="{{getUrlPost($p)}}"><span class="icon-options"></span></a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif