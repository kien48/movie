<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\Movie;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPhimMoiThem = Movie::query()
        ->latest('id')
            ->take(12)
            ->get();
        $dataPhimLe = Movie::query()
        ->where('list_id', 1)
        ->latest('id')
            ->take(12)
            ->get();
        $dataPhimBo = Movie::query()
        ->where('list_id', 2)
        ->latest('id')
            ->take(12)
            ->get();
        $dataTvShows = Movie::query()
        ->where('list_id', 3)
        ->latest('id')
            ->take(12)
            ->get();

        return view('home', compact('dataPhimMoiThem', 'dataPhimLe', 'dataPhimBo', 'dataTvShows'));
    }

    public function detail(string $slug)
    {
        $model = Movie::query()
            ->with(['catelogue', 'episode'])
            ->where('slug', $slug)
            ->firstOrFail()
            ->toArray();

        $list_id = $model['list_id'];

        $phimLienQuan = Movie::query()
            ->where('list_id', $list_id)
            ->where('slug', '!=', $slug)
            ->get()
            ->toArray();
        $trangThai = false;
        foreach (session('favourite') as $item) {
            if ($item['id'] == $model['id']) {
                $trangThai = true;
            }
        }
        return view('detail', compact('model', 'phimLienQuan','trangThai'));
    }


    public function watch(string $slug, int $tap,Request $request)
    {
        // Tìm phim theo slug
        $model = Movie::query()->with(['catelogue', 'episode'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Tìm tập phim theo tap
        $episode = $model->episode()->where('tap', $tap)->firstOrFail()->toArray();

        // Chuyển dữ liệu phim và tập phim sang view
        return view('watch', compact('model', 'episode'));
    }

    public function favourite()
    {
        return view('favourite');
    }
    public function addFavourite(Request $request)
    {
        // Kiểm tra xem session 'favourite' đã tồn tại chưa, nếu chưa thì khởi tạo nó với một mảng rỗng
        if (!session()->has('favourite')) {
            session(['favourite' => []]);
        }

        // Lấy giá trị của session 'favourite'
        $favourites = session('favourite');

        // Tìm bộ phim theo ID
        $movie = Movie::find($request->id);

        // Kiểm tra nếu bộ phim tồn tại và không có trong danh sách yêu thích
        if ($movie && !in_array($movie->id, array_column($favourites, 'id'))) {
            // Thêm bộ phim vào danh sách yêu thích
            $favourites[] = $movie;
            session(['favourite' => $favourites]);
        }

        // C// Quay lại trang trước
                return back();
    }
    public function removeFavourite(Request $request)
    {
        // Lấy ID của bộ phim cần xóa
        $id = $request->id;

        // Lấy danh sách yêu thích từ session
        $favourites = session('favourite', []);

        // Tìm và loại bỏ bộ phim có ID tương ứng khỏi danh sách yêu thích
        $updatedFavourites = array_filter($favourites, function($movie) use ($id) {
            return $movie['id'] != $id;
        });

        // Cập nhật lại session với danh sách yêu thích đã được loại bỏ bộ phim
        session(['favourite' => $updatedFavourites]);

        // Quay lại trang trước
        return back();
    }

    public function danhSachPhim(string $id)
    {
        // Truy vấn để lấy dữ liệu từ bảng Movie với điều kiện list_id = $id
        $data = Movie::query()->where('list_id', $id)->paginate(18);

        // Debug dữ liệu (nếu cần thiết)
//         dd($data);
         $list = Lists::find($id);
        // Trả về view 'lists' với dữ liệu đã truy vấn
        return view('lists', compact('data','list'));
    }
    public function search()
    {
        return view('search');
    }




}
