<!-- sidebar  -->
<div class="col-sm-4">
    <div class="blog-post">
        <!-- Search -->
        <h2>Tìm kiếm</h2>
        @php
            $search = isset($_GET['product_search']) ? "value=\"$_GET[product_search]\"" : 'placeholder="Tìm kiếm.."';
        @endphp
        <form action="" method="get" class="input-group search-text">
            <input type="text" class="form-control search" name="product_search" {!! $search !!} >
            <span class="input-group-btn">
                <button class="btn btn-default btn-search" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </form>
        <!-- Categories -->
        {{-- <h2>Chuyên mục</h2>
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
          
        </ul> --}}
    </div>
</div>