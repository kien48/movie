@extends('admin.layouts.master');
@section('content')
    <h1 class="text-center h3">Danh sách tài khoản người dùng</h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
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
