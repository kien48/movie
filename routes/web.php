<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/detail/{slug}', [App\Http\Controllers\PageController::class, 'detail'])->name('detail');
Route::get('/watch/{slug}/{tap}', [App\Http\Controllers\PageController::class, 'watch'])->name('watch');
Route::get('/favourite', [App\Http\Controllers\PageController::class, 'favourite'])->name('favourite');
Route::post('/add-favourite', [App\Http\Controllers\PageController::class, 'addFavourite'])->name('add');
Route::post('/remove-favourite', [App\Http\Controllers\PageController::class, 'removeFavourite'])->name('remove');
Route::get('/danh-sach-phim/{id}', [App\Http\Controllers\PageController::class, 'danhSachPhim'])->name('lists');
Route::get('/tim-kiem', [App\Http\Controllers\PageController::class, 'search'])->name('search');

Route::prefix('api')->group(function (){

    Route::resource('/movie', MovieController::class);
    Route::get('/comment/movie/{id}', [CommentController::class, 'index']);
    Route::resource('/comment', CommentController::class);
});


Route::prefix('admin')
    ->as('admin.')
    ->group(function (){
        Route::prefix('movies')
            ->as('movies.')
            ->group(function (){
                Route::get('/',[\App\Http\Controllers\Admin\MovieController::class,'index'])->name('index');
                Route::get('create',[\App\Http\Controllers\Admin\MovieController::class,'create'])->name('create');
                Route::post('store',[\App\Http\Controllers\Admin\MovieController::class,'store'])->name('store');

            });

});
