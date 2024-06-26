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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    //
    public function index()
    {
        $data = Movie::query()->latest()->paginate(6);
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
        // Định nghĩa các rules cho validation
        $validator = Validator::make($request->all(), [
            'ten' => 'required|string|max:255',
            'list_id' => 'required|exists:lists,id',
            'anh' => 'required|url|nullable',
            'ngon_ngu' => 'required|string|nullable',
            'so_tap' => 'required|integer|nullable',
            'gia' => 'required|integer|nullable',
            'chat_luong' => 'required|string|nullable',
            'dao_dien' => 'required|string|nullable',
            'dien_vien' => 'required|string|nullable',
            'nam_phat_hanh' => 'required|string|nullable',
            'quoc_gia' => 'required|string|nullable',
            'mo_ta' => 'required|string|nullable',
            'catelogue_id' => 'required|array'
        ]);

        // Nếu validation không thành công, quay lại form và hiển thị lỗi
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        // Lấy dữ liệu phim, ngoại trừ các trường 'catelogue_id' và 'tap_phim'
        $dataMovie = $request->except('catelogue_id', 'tap_phim');
        $dataMovie['slug'] = Str::slug($dataMovie['ten']); // Thêm \Illuminate\Support\ để sử dụng Str
        $dataMovie['is_vip'] = isset($request->is_vip) ? 1 : 0;
        // Lấy dữ liệu tập phim
        $dataTapPhimTmp = $request->tap_phim;
        $dataTapPhim = [];
        foreach ($dataTapPhimTmp as $key => $value) {
            $dataTapPhim[] = [
                'so' => $value['so'], // Chuyển đổi 'tap' thành 'so' để khớp với các trường trong yêu cầu
                'link' => $value['link']
            ];
        }
        if(count($dataTapPhim) == $dataMovie['so_tap']){
            $dataMovie['trang_thai'] = "Full";
        }else{
            $dataMovie['trang_thai'] = "Đang cập nhật";
        }
        try {
            // Bắt đầu transaction
            DB::beginTransaction();

            // Tạo phim mới
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

//    public function ()
//    {
//
//    }

}
