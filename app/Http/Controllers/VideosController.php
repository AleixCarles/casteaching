<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function show($id)
    {
//    $video = new stdClass();
//    $video-> title ='Ubuntu 101';
//    $video-> description='Here description';
//    $video-> published_at= 'Desembre 13,2020 8:00pm';
    return view('videos.show',[
        'video'=>Video::find($id)
    ]);

    }
}
