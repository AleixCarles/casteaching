<?php

use App\Http\Controllers\SanctumTokenController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManagerController;
use App\Http\Controllers\VideosManagerVueController;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'show']);
Route::get('/videos/{id}', [VideosController::class,'show']);

Route::get('manage/videos', [ VideosManagerController::class,'index'])->middleware(['can:videos_manage_index'])
    ->name('manage.videos');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard',function (){
        return view('dashboard');
    })->name('dashboard');
    Route::get('manage/videos', [ VideosManagerController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.videos');

    Route::post('manage/videos',[ VideosManagerController::class,'store'])->middleware(['can:videos_manage_store']);
    Route::delete('manage/videos/{id}',[ VideosManagerController::class,'destroy'])->middleware(['can:videos_manage_destroy']);
    Route::get('manage/videos/{id}',[ VideosManagerController::class,'edit'])->middleware(['can:videos_manage_edit']);
    Route::put('manage/videos/{id}',[ VideosManagerController::class,'update'])->middleware(['can:videos_manage_update']);

    Route::get('manage/users', [ UsersManageController::class,'index'])->middleware(['can:users_manage_index'])
        ->name('manage.users');
    Route::post('/manage/users', [UsersManageController::class, 'store'])->middleware(['can:users_manage_create']);
    Route::get('/manage/users/{id}', [UsersManageController::class, 'edit'])->middleware(['can:users_manage_edit']);
    Route::put('/manage/users/{id}', [UsersManageController::class, 'update'])->middleware(['can:users_manage_update']);
    Route::delete('/manage/users/{id}', [UsersManageController::class, 'destroy'])->middleware(['can:users_manage_destroy']);


    Route::get('/vue/manage/videos', [ VideosManagerVueController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.vue.videos');

    Route::post('/vue/manage/videos',[ VideosManagerVueController::class,'store'])->middleware(['can:videos_manage_store']);
    Route::delete('/vue/manage/videos/{id}',[ VideosManagerVueController::class,'destroy'])->middleware(['can:videos_manage_destroy']);
    Route::get('/vue/manage/videos/{id}',[ VideosManagerVueController::class,'edit'])->middleware(['can:videos_manage_edit']);
    Route::put('/vue/manage/videos/{id}',[ VideosManagerVueController::class,'update'])->middleware(['can:videos_manage_update']);
});



