@extends('admin.layouts.master')
@section('content')
    <h1 class="text-center h3">Danh sách phim</h1>
    <div style="height: 580px;overflow: scroll">
        <form action="{{route('admin.movies.store')}}" method="post">
            @csrf
            <div class="card">
                <h4>Thông tin phim</h4>
                <div class="row">
                    <div class="mb-3  col-6">
                        <label for="email" class="form-label">Tên phim:</label>
                        <input type="text" class="form-control" id="email" name="ten">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Danh sách:</label>
                        <select type="text" class="form-control" name="list_id">
                            <option value="">Chọn</option>
                            @foreach($dataLists as $item)
                                <option value="{{$item->id}}">{{$item->ten}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Link ảnh:</label>
                        <input type="text" class="form-control" name="anh">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Ngôn ngữ:</label>
                        <input type="text" class="form-control" name="ngon_ngu">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Số tập:</label>
                        <input type="number" class="form-control" name="so_tap">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Chất lượng:</label>
                        <input type="text" class="form-control" name="chat_luong">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Đạo diễn:</label>
                        <input type="text" class="form-control" name="dao_dien">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Diễn viên:</label>
                        <input type="text" class="form-control" name="dien_vien">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Năm phát hành:</label>
                        <input type="text" class="form-control" name="nam_phat_hanh">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Quốc gia:</label>
                        <input type="text" class="form-control" name="quoc_gia">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Trạng thái:</label>
                        <input type="text" class="form-control" name="trang_thai">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="pwd" class="form-label">Mô tả:</label>
                        <textarea class="form-control" name="mo_ta"></textarea>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <h4>Thể loại</h4>
                <div class="mb-3">
                    <select type="text" class="form-control" name="catelogue_id[]" multiple>
                        @foreach($dataCatelogues as $item)
                            <option value="{{$item->id}}">{{$item->ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card mt-3 mb-3">
                <div class="d-flex justify-content-between">
                    <h4>Tập</h4>
                    <button type="button" class="btn btn-danger" ng-click="addEpisode()">Thêm tập</button>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tập</th>
                        <th>Link</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="episode in episodes">
                        <td><input type="number" class="form-control" name="tap_phim[@{{ episode.number }}-@{{ episode.link }}][so]" ng-model="episode.number"></td>
                        <td><input type="text" class="form-control" name="tap_phim[@{{ episode.number }}-@{{ episode.link }}][link]" ng-model="episode.link"></td>
                        <td><button type="button" class="btn btn-danger" ng-click="removeEpisode($index)">Xóa</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-success mb-4 mt-4">Gửi</button>
        </form>

    </div>
    @section('js')
        <script>
            viewFunction = ($scope,$http)=>{
                $scope.episodes = [{ number: 1, link: '' }];
                console.log($scope.episodes)
                $scope.addEpisode = function() {
                    $scope.episodes.push({ number: $scope.episodes.length + 1, link: '' });
                };

                $scope.removeEpisode = function(index) {
                    $scope.episodes.splice(index, 1);
                };
            }
        </script>
    @endsection

@endsection