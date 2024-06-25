@extends('layouts.master')
@section('title')
    Nạp xu
@endsection
@section('content')
    <div class="container" style="margin-top: 100px;">
        <div class="card mt-4">
            <div class="card-header">
                Nạp Xu
            </div>
            <div class="card-body">
                <form action="{{route('vnPay')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Số Lượng Xu:</label>
                        <input type="number" name="coin" class="form-control" id="amount" placeholder="Nhập số lượng xu cần nạp">
                    </div>
                        <button type="submit" name="redirect" class="btn btn-danger btn-block">Thanh toán</button>
                </form>
            </div>
        </div>
    </div>
@endsection
