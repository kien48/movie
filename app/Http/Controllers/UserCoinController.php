<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCoinController extends Controller
{
    //
    public function muaPhim(Request $request)
    {
        $movie_id = $request->movie_id;
        $coin = (int) $request->coin; // Đảm bảo rằng $coin là số nguyên
        $user = Auth::user();
        try {
            DB::beginTransaction();

            // Kiểm tra số dư coin của người dùng
            if ($user->coin[0]['coin'] >= $coin) {
                // Trừ số coin từ số dư của người dùng
                $newCoin  = $user->coin[0]['coin'] - $coin;
                DB::table('user_coins')->where('user_id', $user->id)->update(['coin' => $newCoin]);

                // Thêm phim vào danh sách phim của người dùng mà không xoá các phim đã có
                $user->movies()->syncWithoutDetaching([$movie_id]);

                DB::commit();
                return redirect()->back()->with('success', 'Đã mua phim thành công');
            } else {
                // Nếu số dư coin không đủ, rollback giao dịch
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => 'Số dư coin không đủ']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('home');
        }
    }

    public function napXu()
    {
        return view('auth.coins');
    }


}
