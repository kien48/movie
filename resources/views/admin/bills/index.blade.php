@extends('admin.layouts.master')
@section('content')
    <h1 class="text-center h3">Danh sách hóa đơn mua phim</h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Người dùng</th>
            <th>Phim</th>
            <th>Xu</th>
            <th>Thời gian</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $bill)
            <tr>
                <td>{{$bill->id}}</td>
                <td>{{$bill->user_id}}</td>
                <td>{{$bill->movie_id}}</td>
                <td>{{number_format($bill->xu)}} xu</td>
                <td>{{$bill->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links('pagination::bootstrap-5')}}
@endsection

