<?php

use App\Http\Controllers\VideosController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/videos/{id}', [VideosController::class,'show']);

//Route::get('/videos/1', function () {
//        //return 'Ubuntu 101 | Here description | Desembre 13,2020 8:00pm';
//    $video=Video::find(1);
////    $video = new stdClass();
////    $video-> title ='Ubuntu 101';
////    $video-> description='Here description';
////    $video-> published_at= 'Desembre 13,2020 8:00pm';
//    return view('videos.show',[
//        'video' => $video,
//    ]);
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
