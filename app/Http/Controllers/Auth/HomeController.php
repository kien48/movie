<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
        $data =  User::query()->with(['movies','coin'])->find(Auth::user()->id)->toArray();
//        dd($data['movies'][0]['id']);
        return view('auth.home',compact('data'));
    }

    public function purchasedMovies()
    {
        $data =  User::query()->with(['movies','coin'])->find(Auth::user()->id)->toArray();
        return view('auth.movies',compact('data'));
    }


}
