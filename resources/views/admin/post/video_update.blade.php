@extends('admin.layout')
@section('content')
    <main class="c-main bg-white">
        <div class="container-fluid">
            <div class="fade-in">
                <form class="form-post" method="post" action="">
                    <input type="hidden" name="user_id" value="{{!empty($oneItem)? $oneItem->user_id: $user_id}}">
                    <input type="hidden" name="url_referer" value="{{$url_referer}}">
                    <div class="row">
                        <div class="col-md-8 pr-0">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#seo" role="tab" aria-controls="seo">Nội dung SEO</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#info" role="tab" aria-controls="info">Thông tin</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#info-match" role="tab" aria-controls="nha_cai">Thông tin trận đấu</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 border-bottom">
                            @empty($oneItem)
                                <button type="button" class="btn btn-danger float-right save-draft">Lưu nháp</button>
                                <button type="submit" class="btn btn-primary float-right mr-3">Đăng bài</button>
                            @else
                                <button type="submit" class="btn btn-primary float-right mr-3">Lưu trữ</button>
                            @endempty
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="seo" role="tabpanel">
                            <div class="row py-2">
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Tiêu đề</label>
                                                        <input class="form-control" required name="title" value="{!! !empty($oneItem->title) ? $oneItem->title : '' !!}" type="text" placeholder="Tiêu đề">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mô tả</label>
                                                        <textarea class="form-control tiny-featured" rows="4" name="description">{{!empty($oneItem->description) ? $oneItem->description : ''}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nội dung</label>
                                                        <textarea id="full-featured" class="form-control" name="content">{{!empty($oneItem->content) ? $oneItem->content : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card mb-4">
                                        <div class="card-header" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><span id="seo-score" class="btn btn-outline-danger"></span><strong class="ml-3">Đánh giá SEO</strong></div>
                                        <div class="collapse" id="collapseExample">
                                            <ul class="data-seo-score list-unstyled p-3">
                                                <li class="keyword-length" data-score="0"></li>
                                                <li class="keyword-in-slug" data-score="0"></li>
                                                <li class="keyword-in-title" data-score="0"></li>
                                                <li class="keyword-in-desc" data-score="0"></li>
                                                <li class="title-length" data-score="0"></li>
                                                <li class="desc-length" data-score="0"></li>
                                                <li class="position-keyword-in-title" data-score="0"></li>
                                                <li class="position-keyword-in-desc" data-score="0"></li>
                                                <li class="count-keyword-in-content" data-score="0"></li>
                                                <li class="link-in-content" data-score="0"></li>
                                                <li class="count-heading" data-score="0"></li>
                                                <li class="keyword-in-heading" data-score="0"></li>
                                                <li class="alt-img" data-score="0"></li>
                                            </ul>
                                        </div>
                                        <input name="word_count" type="hidden" value="{{$oneItem->word_count ?? 0}}">
                                        <input name="seo_score" type="hidden" value="{{$oneItem->seo_score ?? 0}}">
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>
                                                    Tiêu đề SEO
                                                    <span class="text-danger" id="title-count-text">
                                                    <span>Độ dài hiện tại: </span>
                                                    <span id="title-count">0</span> ký tự</span>
                                                </label>
                                                <input class="form-control" name="meta_title" value="{{!empty($oneItem->meta_title) ? $oneItem->meta_title : ''}}" type="text" placeholder="Tiêu đề SEO">
                                            </div>
                                            <div class="form-group">
                                                <label>Đường dẫn (URL)</label>
                                                <input class="form-control" name="slug" value="{{!empty($oneItem->slug) ? $oneItem->slug : ''}}" type="text" placeholder="Slug bài viết">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Mô tả SEO
                                                    <span class="text-danger" id="description-count-text">
                                                <span>Độ dài hiện tại: </span>
                                                <span id="description-count">0</span> ký tự
                                            </span>
                                                </label>
                                                <textarea class="form-control" name="meta_description" rows="4" placeholder="Mô tả SEO">{{!empty($oneItem->meta_description) ? $oneItem->meta_description : ''}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Từ khóa SEO
                                                </label>
                                                <input class="form-control" name="main_keyword" value="{{!empty($oneItem->main_keyword) ? $oneItem->main_keyword : ''}}" type="text" placeholder="Từ khóa SEO">
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Từ khóa liên quan
                                                </label>
                                                <input class="form-control" name="meta_keyword" value="{{!empty($oneItem->meta_keyword) ? $oneItem->meta_keyword : ''}}" type="text" placeholder="Từ khóa liên quan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="info" role="tabpanel">
                            <div class="row py-2">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Chuyên mục</label>
                                                        <div id="select-multi-category-video" data-video-id="{{!empty($oneItem->id) ? $oneItem->id : 0}}"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tag</label>
                                                        <div id="select-multi-tag-video" data-video-id="{{!empty($oneItem->id) ? $oneItem->id : 0}}"></div>
                                                    </div>
                                                    @if ($group_id == 1)
                                                        <div class="form-group row">
                                                            <div class="col-md-6">
                                                                <label>Trạng thái</label>
                                                                <select name="status" class="form-control">
                                                                    <option {{isset($oneItem->is_status) && $oneItem->is_status == 1 ? 'selected' : ''}} value="1">Công khai</option>
                                                                    <option {{isset($oneItem->is_status) && $oneItem->is_status == 0 ? 'selected' : ''}} value="0">Bản nháp</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Meta robots</label>
                                                                <select name="is_index" class="form-control">
                                                                    <option {{isset($oneItem->is_index) && $oneItem->is_index == 1 ? 'selected' : ''}} value="1">Index, follow</option>
                                                                    <option {{isset($oneItem->is_index) && $oneItem->is_index == 0 ? 'selected' : ''}} value="0">Noindex, nofollow</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <label>Url video</label>
                                                                <input type="text" class="form-control" name="url_video" value="{{$oneItem->url_video}}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Thumbnail</label>
                                                @if(!empty($oneItem->thumbnail))
                                                    <img style="width: 150px" src="{{$oneItem->thumbnail}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                                @else
                                                    <img style="width: 150px" src="{{url('admin/images/no-image.jpg')}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                                @endif
                                                <input type="hidden" name="thumbnail" id="hd_img" value="{{!empty($oneItem->thumbnail)? $oneItem->thumbnail: ''}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Thời gian hiển thị</label>
                                                <input class="form-control" name="displayed_time" value="{{!empty($oneItem->displayed_time) ? date('Y-m-d\TH:i:s', strtotime($oneItem->displayed_time)) : date('Y-m-d\TH:i:s')}}" type="datetime-local">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="info-match" role="tabpanel">
                            <div class="row py-2">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header"><strong>Thông tin trận đấu</strong></div>
                                        <div class="card-body">
                                            <div class="d-block d-md-flex justify-content-between border-bottom mb-3">
                                                <div class="form-group">
                                                    <label>ID Bóng Đá Lu</label>
                                                    <input type="text" name="id_bongdalu" class="form-control" placeholder="ID Bóng đá lu" value="{{!empty($oneItem->id_bongdalu) ? $oneItem->id_bongdalu : ''}}">
                                                    <small class="form-text text-muted">Bỏ trống nếu không phải bài viết soi kèo</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Thời gian thi đấu (tháng/ngày/năm, giờ:phút)</label>
                                                    <input type="datetime-local" name="match[scheduled]" class="form-control" placeholder="Thời gian thi đấu" value="{{!empty($match->scheduled) ? date('Y-m-d\TH:i:s', strtotime($match->scheduled)) : '' }}">
                                                    <small class="form-text text-muted">Cần nhập nếu là bài soi kèo</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Giải đấu</label>
                                                    <input type="text" name="match[tournament]" class="form-control" placeholder="Giải đấu" value="{!! !empty($match->tournament) ? $match->tournament : '' !!}">
                                                </div>
                                            </div>
                                            <div class="d-block d-md-flex justify-content-between">
                                                <div>
                                                    <div class="form-group">
                                                        <label>Logo Đội nhà</label>
                                                        <input type="text" name="match[team_home_logo]" class="form-control" placeholder="Logo đội nhà" value="{{!empty($match->team_home_logo) ? $match->team_home_logo : ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tên đội nhà</label>
                                                        <input type="text" name="match[team_home_name]" class="form-control" placeholder="Tên đội nhà" value="{!! !empty($match->team_home_name) ? $match->team_home_name : '' !!}">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label>Tỷ lệ Kèo</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Châu Á</div>
                                                        </div>
                                                        <input type="text" name="match[hdc_asia]" class="form-control" id="inlineFormInputGroup" placeholder="Châu Á" value="{{!empty($match->hdc_asia) ? $match->hdc_asia : ''}}">
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Châu Âu</div>
                                                        </div>
                                                        <input type="text" name="match[hdc_eu]" class="form-control" id="inlineFormInputGroup" placeholder="Châu Âu" value="{{!empty($match->hdc_eu) ? $match->hdc_eu : ''}}">
                                                    </div>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Tài Xỉu</div>
                                                        </div>
                                                        <input type="text" name="match[hdc_tx]" class="form-control" id="inlineFormInputGroup" placeholder="Tài Xỉu" value="{{!empty($match->hdc_tx) ? $match->hdc_tx : ''}}">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="form-group">
                                                        <label>Logo đội khách</label>
                                                        <input type="text" name="match[team_away_logo]" class="form-control" placeholder="Logo đội khách" value="{{!empty($match->team_away_logo) ? $match->team_away_logo : ''}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tên đội nhà</label>
                                                        <input type="text" name="match[team_away_name]" class="form-control" placeholder="Tên đội khách" value="{!! !empty($match->team_away_name) ? $match->team_away_name : '' !!}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
