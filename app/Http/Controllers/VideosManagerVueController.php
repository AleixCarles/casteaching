<?php

namespace App\Http\Controllers;

class VideosManagerVueController extends Controller
{
    public function index()
    {
        return view('videos.manage.vue.index');
    }

}
