<!-- sidebar  -->
<div class="col-sm-4">
    <div class="blog-post">
        <!-- Search -->
        <h2>Search</h2>
        <div class="input-group search-text">
          <input type="text" class="form-control search" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-default btn-search" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>
        <!-- Categories -->
        <h2>Chuyên mục</h2>
        <ul class="category-post">
            @foreach($categoryTree as $value)
            <li>
                <a href="{{ getUrlCate((object) $value) }}">
                    <div class="inline-text">
                        <i class="glyphicon glyphicon-play blue-text"></i>
                        <h4>{!! str_replace('---', "<span class='mx-2'></span>", $value['title']) !!}</h4>
                        <div class="margin-left-auto blue-text">
                            <span>({{$value['count']}})</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
          
        </ul>
        <!-- Recent Posts -->
        <h2>Các trang mới nhất</h2>
        @if(!empty($page_rd))
        <ul class="recent-post">
            @foreach($page_rd as $rd)
            <li class="border-bottom">
                <a href="{{getUrlStaticPage($rd)}}"><h5>{{$rd->title}}</h5></a>
                <h6>{{convertDateTime($rd->displayed_time, false)}}</h6>
            </li>
            @endforeach
        </ul>
        @endif
        <!-- Tags -->
        <h2>Tags</h2>
        @if(!empty($tag))
        <div class="tags">
            @foreach ($tag as $t)
            <a href="{{getUrlTag($t)}}">#{{$t->title}}</a>
            @endforeach
        </div>
        @endif
    </div>
</div>