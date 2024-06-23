@extends('layouts.master')
@section('title')
    Xem phim
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}/themes/web phim/public/comment.css">
@endsection
@section('content')
    <div class="container movie-section" style="margin-top: 100px;">
        <div class="row mt-4">

            <div class="col-8">
                <iframe src="{{$episode['link']}}" frameborder="0" allowfullscreen loading="lazy" width="100%"
                        height="500"></iframe>

            </div>

            <div class="col-4">
                <h3 class="mb-3" style="font-weight: 700;font-size: 50px;">{{$model['ten']}} </h3>
                <h5 class="font-monospace text-light-emphasis mt-3">{{$model['chat_luong']}}
                    ● {{$model['ngon_ngu']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Số tập: {{$model['so_tap']}} | Hiện
                    tại: {{$model['trang_thai']}} </h5>
                <h5 class="font-monospace text-light-emphasis mt-3">Thể loại: Gia đình, Bí ẩn</h5>
                <h5 class="h4 mt-3" data-bs-toggle="tooltip" title="{{$model['mo_ta']}}!">{{substr($model['mo_ta'],0,200)}}... </h4>

                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Diễn viên:</h5>
                        <h5> {{$model['dien_vien']}} </h5>
                    </div>
                    <div class="d-flex mt-3">
                        <h5 class="font-monospace text-light-emphasis">Đạo diễn:</h5>
                        <h5> {{$model['dao_dien']}} </h5>
                    </div>
            </div>
        </div>
        <div class="row mt-4">
            <h3>Danh sách tập phim: </h3>
            <div class="col-8">
                @foreach($model['episode'] as $data)
                    <a href="{{ route('watch', ['slug' => $model['slug'], 'tap' => $data['tap']]) }}" class="btn @if($data['tap'] == $episode['tap'])
    btn-danger
@else
    btn-outline-danger
@endif
" style="width: 45px;height: 40px">{{$data['tap']}}</a>
                @endforeach
            </div>
        </div>
        <div class="row mt-5">
            <h3>Bình luận: </h3>
            <div class="col-4 form-container">
                <form action="" method="post">
                    <div class="d-flex">
                        <textarea name="comment" id="comment" class="form-control1"
                                  placeholder="Nhập bình luận..."></textarea>
                        <button type="submit" class="btn btn-outline-danger">Gửi</button>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <div class="comment-container">
                    <div class="comment-author">Nguyễn Văn A</div>
                    <div class="comment-text">Đây là nội dung bình luận mẫu.</div>
                </div>
                <div class="comment-container">
                    <div class="comment-author">Trần Thị B</div>
                    <div class="comment-text">Một bình luận khác để minh họa.</div>
                </div>
                <!-- Thêm các bình luận khác tại đây -->
            </div>
        </div>
    </div>
@endsection
