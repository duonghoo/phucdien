@extends('admin.layout')
@section('content')
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header">
                        Danh sách Tag
                        <div class="card-header-actions pr-1">
                            <a href="/admin/tag/update"><button class="btn btn-block btn-primary btn-sm mr-3" type="button">Thêm mới</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered datatable">
                            <thead>
                            <tr>
                                <th class="text-center w-5">ID</th>
                                <th>Tiêu đề</th>
                                <th class="text-center w-15">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($listItem)) @foreach($listItem as $item)
                            <tr>
                                <td class="text-center">{{$item->id}}</td>
                                <td><a target="_blank" href="{{getUrlTag($item)}}">{{$item->title}}</a></td>
                                <td class="text-center">
                                    <a class="btn btn-info" href="/admin/tag/update/{{$item->id}}">
                                        <svg class="c-icon">
                                            <use xlink:href="/admin/images/icon-svg/free.svg#cil-pencil"></use>
                                        </svg>
                                    </a>
                                    <a class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"
                                       href="/admin/tag/delete/{{$item->id}}">
                                        <svg class="c-icon">
                                            <use xlink:href="/admin/images/icon-svg/free.svg#cil-trash"></use>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach @endif
                            </tbody>
                        </table>
                        <ul class="pagination">
                            @if($page > 1)
                                <li class="page-item">
                                    <a class="page-link" href="/admin/tag/{{$page-1}}">Prev</a>
                                </li>
                            @endif
                            @for($i = 1; $i <= $pagination; $i++)
                                <li class="page-item @if($i == $page) active @endif">
                                    <a class="page-link" href="/admin/tag/{{$i}}">{{$i}}</a>
                                </li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="/admin/tag/{{$page+1}}">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
