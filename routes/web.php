<?php

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
