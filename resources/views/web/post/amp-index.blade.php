
@extends('web._layout')
@section('main')
<main class="container my-3">
    <div class="row">
        <!-- Breadcrumb -->
        <div class="d-flex pt-2 pb-1 bg-white1 w-100 align-items-center rounded-d">
            <a href="/amp/"><i class="icon-home" style="font-size: 1.2rem; color:black"></i></a>
            <a href="" class="d-block ms-2" title="">Trang chủ / </a>
            <a href="{{$breadcrumb[0]['item']}}" class="d-block ms-2" title="">{{$breadcrumb[0]['name']}} </a>
            
        </div>
        <!-- Main content -->
        <div class="col-lg-8 bg-white1 main-content-post mt-4 px-3 rounded-d">
                <!-- Article -->
            <section class="mx-0 pt-2 px-lg-0 px-2">
                <h2 class="fs-24 p-0">{{$oneItem->title}}</h2>
                <div class="d-flex flex-wrap">
                    <p class="mb-0 time-of-match text-grey3">{{$time}}</p>
                    <div class="ms-0 mb-3 ms-lg-auto">
                        {{-- @include('web.block._vote', ['data' => $oneItem]) --}}
                            </div>
                          </form>
                    </div>
                </div>
                <h5 class="font-16">{!!$oneItem->description!!}</h5>
               
                @if(!empty($oneItem->match))
                    {{-- @include('web.block._bet_box', $oneItem->match) --}}
                @endif
                <!-- Content navigation -->
                {{-- <div class="bg-grey4 p-3 my-2">
                    <h4 class="text-red1 text-uppercase fs-18 fw-normal">Nội dung chính</h4>
                    <ul class="nav flex-column">
                        <li ><a href="#before" class="nav-link">1. Soi kèo real trước trận đấu</a></li>
                        <li class="px-3"><a href="#before" class="nav-link">1. Soi kèo real trước trận đấu</a></li>
                        <li class="px-3"><a href="#after" class="nav-link">1. Soi kèo real sau trận đấu</a></li>
                        <li class="px-3"><a href="#" class="nav-link">1. Soi kèo real trước trận đấu</a></li>
                    </ul>
                </div> --}}

                <!-- Content  -->
                <div class="mt-3 content" id="table-of-content">
                   {!! short_code($oneItem->content) !!}
                </div>
                @if(!empty($user->author))
            <section class="w-100 p-3 d-flex" style="background-color: #f6f6f6">
                {!! genImage($user->thumbnail, 120, 120, '') !!}
                <div class="ps-2 ps-lg-5 d-flex align-items-center">
                    <ul class="list-unstyled mb-0">
                        <li class="font-weight-bold"><a href="{{getUrlAuthor($user)??''}}" class="text-decoration-none text-black1 slidebar__link">{{ $user->author }}</a></li>
                        @if (!empty($user->description))
                        <li>{!! $user->description !!}</li>
                        @endif
                        @php $optional = json_decode($user->optional) @endphp
                        <li>Kết nối với tác giả:
                            <div class="d-lg-inline">
                            <a target="_blank" rel="nofollow" href="{{ $optional->facebook }}"><i class="icon-facebook ms-2"></i></a>
                            <a target="_blank" rel="nofollow" href="{{ $optional->twitter }}"><i class="icon-twitter ms-4"></i></a>
                            <a target="_blank" rel="nofollow" href="{{ $optional->instagram }}"><i class="icon-instagram ms-4"></i></a>
                            <a target="_blank" rel="nofollow" href="{{ $optional->reddit }}"><i class="icon-reddit ms-4"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            @endif
            {{-- <div id="fb-comment" class="my-3">
                <amp-facebook-comments
                    width="486"
                    height="657"
                    layout="responsive"
                    data-numposts="5"
                    data-href="{{ getUrlPost($oneItem) }}"
                >
                </amp-facebook-comments>
            </div> --}}
            </section>    
        </div>
                    <!-- End main-content -->

        @include('web.block._sidebar')
    </div>
    <div class="row">
        
        <div class="col-lg-8 main-content-post mt-4 px-2 px-lg-0 rounded-d max-100">
            @php $src = url('/') @endphp
            <!-- Tin cùng chuyên mục -->
            <section class="pt-3 bg-body">
                <h3 class="title-default"> Tin cùng chuyên mục</h3>

                <amp-list class="mt-2" width="auto" height="{{count($related_post) * 113}}" layout="fixed-height"
                        src="{{$src}}/ajax-load-more-post-amp?category_id={{isset($category->id) ? $category->id : ''}}&limit={{$limit}}&page={{$page}}" binding="refresh"
                        load-more="manual" load-more-bookmark="next">
                <template type="amp-mustache">
                    <article class="col-12 col-lg-4 d-flex flex-wrap mb-3 px-0">
                        <div class="col-12 px-0 position-relative">
                            <a href="@{{ slug }}" rel="nofollow">
                                <amp-img src="@{{ thumbnail }}" alt="@{{ title }}" layout="responsive" width="269" height="187"></amp-img>
                            </a>
                            
                        </div>
                        <div class="col-12 px-2">
                            <a href="@{{ slug }}"><h3 class="fs-16 mt-1 text-justify max-line-3">@{{ title }}</h3></a>
                            <p class="news-category-title text-red1 fw-bold my-2"></p>
                        </div>
                        {{-- <h3 class="col-12 font-17 font-lg-13 font-weight-500 pl-3 pl-lg-0 pr-0 mt-0 mt-lg-2">
                            <a rel="nofollow" class="ps-2 text-black3 text-decoration-none box-news-title font-17" href="@{{ slug }}">@{{ title }}</a>
                        </h3> --}}
                    </article>
                </template>
                <div fallback>
                    FALLBACK
                </div>
                <div placeholder>
                    Đang tải...
                </div>
                <amp-list-load-more load-more-failed>
                    ERROR
                </amp-list-load-more>
                <amp-list-load-more load-more-end>
                    <p class="text-center">Đã tải hết</p>
                </amp-list-load-more>
                <amp-list-load-more load-more-button>
                    <!-- My custom see more button -->
                    <div class="mt-2 category-load-more text-center overflow-hidden" style="background-color: #f4f4f4">
                        <button class="d-block bg-grey1 border px-5 py-2 font-11 text-decoration-none view-more load-more position-relative mx-auto">XEM THÊM</button>
                    </div>
                </amp-list-load-more>
            </amp-list>

            </section>  
        </div>
    </div>
</main>
@endsection