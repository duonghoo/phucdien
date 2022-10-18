@extends('admin.layout')
@section('content')
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header">
                        Danh sách Thành viên
                        <div class="card-header-actions pr-1">
                            <a href="/admin/user/update"><button class="btn btn-block btn-primary btn-sm mr-3" type="button">Thêm mới</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                            <tr>
                                <th>Tài khoản</th>
                                <th class="text-center w-15">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($listItem)) @foreach($listItem as $item)
                            <tr>
                                <td>{{$item->username}}</td>
                                <td class="text-center">
                                    <a class="btn btn-info" href="/admin/user/update/{{$item->id}}">
                                        <svg class="c-icon">
                                            <use xlink:href="/admin/images/icon-svg/free.svg#cil-pencil"></use>
                                        </svg>
                                    </a>
                                    <a class="btn btn-danger" onclick="return confirm('Khi xóa thành viên sẽ xóa tất cả sản phẩm và bài viết của họ, Bạn có chắc muốn xóa?')"
                                       href="/admin/user/delete/{{$item->id}}">
                                        <svg class="c-icon">
                                            <use xlink:href="/admin/images/icon-svg/free.svg#cil-trash"></use>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach @endif
                            </tbody>
                        </table>
                    </div>
                    <p>Có thể sửa thông tin thành viên</p>
                    <p class="text-danger">CẢNH BÁO: KHÔNG NÊN XÓA THÀNH VIÊN NẾU KHÔNG MUỐN BỊ MẤT CÁC BÀI VIẾT CỦA THÀNH VIÊN ĐÓ !!!</p>
                </div>
            </div>
        </div>
    </main>
@endsection
