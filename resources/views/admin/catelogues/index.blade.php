@extends('admin.layouts.master');
@section('content')
    <h1 class="text-center h3">Danh sách thể loại</h1>
    <a href="{{route('admin.catelogues.create')}}" class="btn btn-primary">Thêm mới</a>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Slug</th>
            <th>Thao tác</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $catelogue)
            <tr>
                <td>{{$catelogue->id}}</td>
                <td>{{$catelogue->ten}}</td>
                <td>{{$catelogue->slug}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <a href="http://" class="btn btn-outline-info">Xem</a>
                    <a href="http://" class="btn btn-outline-warning">Sửa</a>
                    <a href="http://" class="btn btn-outline-danger">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links('pagination::bootstrap-5')}}
@endsection
