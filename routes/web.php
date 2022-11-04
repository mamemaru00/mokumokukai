<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// モクモク会一覧画面
Route::get('/', [EventController::class, 'index'])->name('event.index');

// カテゴリー一覧画面
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');