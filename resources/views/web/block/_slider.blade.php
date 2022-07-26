@if(!empty($post_feature))
<section class="flexslider">
    <ul class="slides">
        @foreach($post_feature as $pf)
        <li>
            {!! genImage($pf->thumbnail, 1920, 822) !!}
            <div class="slide-info">
                <div class="slide-con">
                    <b>{{$pf->category->title}}</b>
                    <h3>{{$pf->title}}</h3>
                    <p>{!! get_limit_content($pf->desc, 120) !!}</p>
                    <a href="{{getUrlPost($pf)}}" class="ti-arrow-right"></a>
                </div>
            </div>  
        </li>
        @endforeach
    </ul>
</section>
@endif