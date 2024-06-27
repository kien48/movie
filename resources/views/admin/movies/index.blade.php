@extends('admin.layouts.master')
@section('content')
    <h1 class="text-center h3">Danh sách phim</h1>
    <a href="{{route('admin.movies.create')}}" class="btn btn-primary">Thêm mới</a>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Ngôn ngữ</th>
            <th>Số tập</th>
            <th>Quốc gia</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $movie)
            <tr>
                <td>{{$movie->id}}</td>
                <td>{{$movie->ten}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <img src="{{$movie->anh}}" alt="" class="img-thumbnail" width="60px">
                </td>
                <td>{{$movie->ngon_ngu}}</td>
                <td>{{$movie->so_tap}}</td>
                <td>{{$movie->quoc_gia}}</td>
                <td>{{$movie->trang_thai}}</td>
                <td class="text-nowrap" style="width: 1px;">
                    <a href="{{route('admin.movies.show',$movie->slug)}}" class="btn btn-outline-info">Xem</a>
                    <a href="{{route('admin.movies.edit',$movie->slug)}}" class="btn btn-outline-warning">Sửa</a>
                    <a href="http://" class="btn btn-outline-danger">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links('pagination::bootstrap-5')}}
@endsection
