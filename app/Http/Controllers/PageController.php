<?php

namespace App\Http\Controllers;

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
            ->get();
        $dataPhimLe = Movie::query()
        ->where('list_id', 1)
        ->latest('id')
            ->get();
        $dataPhimBo = Movie::query()
        ->where('list_id', 2)
        ->latest('id')
            ->get();
        $dataTvShows = Movie::query()
        ->where('list_id', 3)
        ->latest('id')
            ->get();

        return view('home', compact('dataPhimMoiThem', 'dataPhimLe', 'dataPhimBo', 'dataTvShows'));
    }

    public function detail(string $id)
    {
        $model = Movie::query()->with(['catelogue','episode'])->findOrFail($id)->toArray();
        return view('detail', compact('model'));
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

}
