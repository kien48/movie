@extends('admin.layouts.master')
@section('content')
    <div>
        <h1 class="text-center h3">Cập nhật dạnh mục bài viết</h1>
        <form action="{{route('admin.catelogue-posts.update',$model[0]['id'])}}" method="post">
            @csrf
            @method('PUT')
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
            <div class="mt-3">
                <label class="form-label">Tên</label>
                <input type="text" name="ten" id="" class="form-control" value="{{$model[0]['ten']}}">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Gửi</button>
            </div>

        </form>
    </div>
@endsection
