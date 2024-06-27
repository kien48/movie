@extends('admin.layouts.master')
@section('content')
    <h1 class="text-center h3">Danh sách danh mục bài viết</h1>
    <a href="{{route('admin.catelogue-posts.create')}}" class="btn btn-primary">Thêm mới</a>
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
                    <a href="{{route('admin.catelogue-posts.edit',$catelogue->id)}}" class="btn btn-outline-warning">Sửa</a>
                    <form action="{{route('admin.catelogue-posts.destroy',$catelogue->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('xóa nhé')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links('pagination::bootstrap-5')}}
@endsection
