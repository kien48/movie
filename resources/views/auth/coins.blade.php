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
                <form>
                    <div class="form-group">
                        <label for="amount">Số Lượng Xu:</label>
                        <input type="number" class="form-control" id="amount" placeholder="Nhập số lượng xu cần nạp">
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Nạp Xu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
