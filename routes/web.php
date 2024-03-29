<?php

use App\Http\Controllers\GithubAuthController;
use App\Http\Controllers\SeriesImagesManageController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\SeriesManageController;
use App\Http\Controllers\VideosManagerController;
use App\Http\Controllers\VideosManagerVueController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Kanuu\Laravel\Facades\Kanuu;
use Laravel\Socialite\Facades\Socialite;

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

    Route::get('/subscribe', function () {
        return redirect(route('kanuu.redirect', Auth::user()));
    })->name('subscribe');

    Route::get('/dashboard',function (){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage/series', [ SeriesManageController::class,'index'])->middleware(['can:series_manage_index'])
        ->name('manage.series');

    Route::post('/manage/series',[ SeriesManageController::class,'store' ])->middleware(['can:series_manage_store']);
    Route::delete('/manage/series/{id}',[ SeriesManageController::class,'destroy' ])->middleware(['can:series_manage_destroy']);
    Route::get('/manage/series/{id}',[ SeriesManageController::class,'edit' ])->middleware(['can:series_manage_edit']);
    Route::put('/manage/series/{id}',[ SeriesManageController::class,'update' ])->middleware(['can:series_manage_update']);

    Route::put('/manage/series/{id}/image',[ SeriesImagesManageController::class,'update' ])->middleware(['can:series_manage_update']);


    Route::get('/manage/videos', [ VideosManagerController::class,'index'])->middleware(['can:videos_manage_index'])
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

Route::get('/auth/redirect', [GithubAuthController::class,'redirect']);
Route::get('/auth/callback', [GithubAuthController::class,'callback']);

Kanuu::redirectRoute()
    ->middleware('auth')
    ->name('kanuu.redirect');
