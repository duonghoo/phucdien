@extends('admin.layout')
@section('content')
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <form method="post" action="">
                    <input type="hidden" name="user_id" value="{{!empty($oneItem)? $oneItem->user_id: $user_id}}">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                {{-- <div class="card-header"><strong>{{!empty($oneItem) ? 'Chỉnh sửa' : 'Thêm mới'}} sản phầm</strong>{!!!empty($oneItem) ? ' - <a rel="nofollow" target="_blank" href="'.getUrlStaticPage($oneItem).'">'.$oneItem->title.'</a>' : ''!!}</div> --}}
                                <div class="card-header"><strong>{{!empty($oneItem) ? 'Chỉnh sửa' : 'Thêm mới'}} sản phầm</strong>{!!!empty($oneItem) ? ' - <span>'.$oneItem->title.'</span>' : ''!!}</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Tiêu đề</label>
                                                <input class="form-control" required name="title" value="{{!empty($oneItem->title) ? $oneItem->title : ''}}" type="text" placeholder="Tiêu đề">
                                            </div>
                                            <div class="form-group">
                                                <label>SKU</label>
                                                <input class="form-control" name="sku" value="{{!empty($oneItem->sku) ? $oneItem->sku : ''}}" type="text" placeholder="SKU">
                                            </div>
                                            <div class="form-group">
                                                <label >Mô tả</label>
                                                <textarea id="full-featured" class="form-control" rows="4" name="description">{{!empty($oneItem->description) ? $oneItem->description : ''}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Giá</label>
                                                <input class="form-control" name="price" value="{{!empty($oneItem->price) ? $oneItem->price : ''}}" type="text" placeholder="Giá">
                                            </div>
                                            <div class="form-group">
                                                <label>Màu sắc</label>
                                                <div class="d-flex input_color my-3"></div>
                                                <input type="text" id="custom">
                                                <input type="text" name="color" id="color_var" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header"><strong>Thông tin khác</strong></div>
                                <div class="card-body d-flex flex-wrap">
                                    <div class="form-group col-12">
                                        <label>Thumbnail</label>
                                        @if(!empty($oneItem->thumbnail))
                                            <img src="{{$oneItem->thumbnail}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                        @else
                                            <img src="{{url('admin/images/no-image.jpg')}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                        @endif
                                        <input type="hidden" name="thumbnail" id="hd_img" value="{{!empty($oneItem->thumbnail)? $oneItem->thumbnail: ''}}" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Ảnh mô tả 1</label>
                                        @if(!empty($oneItem->img1))
                                            <img style="width: 150px; height:auto" src="{{$oneItem->img1}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                        @else
                                            <img style="width: 150px; height:auto" src="{{url('admin/images/no-image.jpg')}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img1')">
                                        @endif
                                        <input type="hidden" name="img1" id="hd_img" value="{{!empty($oneItem->img1)? $oneItem->img1: ''}}" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Ảnh mô tả 2</label>
                                        @if(!empty($oneItem->img2))
                                            <img style="width: 150px; height:auto" src="{{$oneItem->img2}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                        @else
                                            <img style="width: 150px; height:auto" src="{{url('admin/images/no-image.jpg')}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img2')">
                                        @endif
                                        <input type="hidden" name="img2" id="hd_img" value="{{!empty($oneItem->img2)? $oneItem->img2: ''}}" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Ảnh mô tả 3</label>
                                        @if(!empty($oneItem->img3))
                                            <img style="width: 150px; height:auto" src="{{$oneItem->img3}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img')">
                                        @else
                                            <img style="width: 150px; height:auto" src="{{url('admin/images/no-image.jpg')}}" id="lbl_img" class="img-fluid d-block" onclick="upload_file('chosefile','img3')">
                                        @endif
                                        <input type="hidden" name="img3" id="hd_img" value="{{!empty($oneItem->img3)? $oneItem->img3: ''}}" required>
                                    </div>
                                    <div class="form-group float-right col-12">
                                        <button type="submit" class="btn btn-primary">Lưu trữ</button>
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
