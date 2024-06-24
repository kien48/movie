@extends('layouts.master')
@section('title')
    Phim đã mua
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">

        <div class="row mb-5">
            <div class="col mb-1">
                <div id="" class="d-flex justify-content-between">
                    <h2>Phim đã mua</h2>
                </div>
                <div class="row">
                    @foreach($data['movies'] as $item)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 movie-card mb-3 mt-3">
                            <a href="{{ route('detail', $item['slug']) }}" class="nav-link position-relative"
                               data-bs-toggle="tooltip" title="{{ $item['ten'] }}">
                                <img src="{{$item['anh']}}" alt="" class="img-fluid">
                                @if($item['gia'] >= 1)
                                    <span class="badge bg-danger rounded-pill position-absolute top-0 end-0">
                                     <i class="fa-solid fa-crown"></i> Có phí
                                    </span>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

