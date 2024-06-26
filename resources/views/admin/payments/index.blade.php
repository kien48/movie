@extends('admin.layouts.master');
@section('content')
    <h1 class="text-center h3">Danh sách hóa đơn nạp xu</h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Số giao dịch</th>
            <th>Người dùng</th>
            <th>Xu</th>
            <th>Phương thức thanh toán</th>
            <th>Tình trạng thanh toán</th>
            <th>Thời gian</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $payment)
            @php
                    $table= "";
                  if($payment->tinh_trang_thanh_toan == 'Thất bại'){
                     $table = "table-danger";
                  }else{
                     $table = "table-success";
                  }
            @endphp
            <tr class="{{$table}}">
                <td>{{$payment->id}}</td>
                <td>{{$payment->so_giao_dich}}</td>
                <td>{{$payment->user_id}}</td>
                <td>{{$payment->xu}}</td>
                <td>{{$payment->phuong_thuc_thanh_toan}}</td>
                <td>{{$payment->tinh_trang_thanh_toan}}</td>
                <td>{{$payment->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$data->links('pagination::bootstrap-5')}}
@endsection

