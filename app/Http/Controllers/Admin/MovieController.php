<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catelogue;
use App\Models\Episode;
use App\Models\Lists;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    //
    public function index()
    {
        $data = Movie::query()->first('id')->paginate(5);
        return view('admin.movies.index',compact('data'));
    }

    public function create()
    {
        $dataCatelogues = Catelogue::query()->get();
        $dataLists = Lists::query()->get();
        return view('admin.movies.create',compact('dataCatelogues','dataLists'));
    }
    public function store(Request $request)
    {
        // Lấy dữ liệu phim, ngoại trừ các trường 'catelogue_id' và 'tap_phim'
        $dataMovie = $request->except('catelogue_id', 'tap_phim');
        $dataMovie['slug'] = Str::slug($dataMovie['ten']); // Thêm \Illuminate\Support\ để sử dụng Str

        // Lấy dữ liệu tập phim
        $dataTapPhimTmp = $request->tap_phim;
        $dataTapPhim = [];
        foreach ($dataTapPhimTmp as $key => $value) {
            $dataTapPhim[] = [
                'so' => $value['so'], // Chuyển đổi 'tap' thành 'so' để khớp với các trường trong yêu cầu
                'link' => $value['link']
            ];
        }

        try {
            // Bắt đầu transaction
            DB::beginTransaction();

            // Tạo phim mới
            /** @var Movie $movie */
            $movie = Movie::query()->create($dataMovie);

            // Tạo các tập phim mới liên kết với phim vừa tạo
            foreach ($dataTapPhim as $tap) {
                Episode::query()->create([
                    'tap' => $tap['so'],
                    'link' => $tap['link'],
                    'movie_id' => $movie->id // Đảm bảo trường khóa ngoại đúng (movie_id)
                ]);
            }

            // Đồng bộ hóa danh mục phim
            $movie->catelogue()->sync($request->catelogue_id);

            // Commit transaction
            DB::commit();
            return redirect()->route('admin.movies.index');

        } catch (\Exception $exception) {
            // Rollback transaction nếu có lỗi
            DB::rollBack();
            return back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

}
