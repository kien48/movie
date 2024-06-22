@extends('layouts.master')
@section('title')
    {{$list->ten}}
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">

        <div class="row mb-5">
            <div class="col mb-1">
                <div id="" class="d-flex justify-content-between">
                    <h2>{{$list->ten}}</h2>
                </div>
                <div class="row">
                    @foreach($data as $item)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{route('detail',$item->slug)}}" class="nav-link">
                                <img src="{{$item->anh}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{$data->links('pagination::bootstrap-5')}}
    </div>
@endsection
