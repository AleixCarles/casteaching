<?php

namespace App\Http\Controllers;

use App\Events\VideoCreated;
use App\Models\Video;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Tests\Feature\Videos\VideosManageControllerTest;

class VideosManagerController extends Controller
{
    public static function testedBy()
    {
        return VideosManageControllerTest::class;
    }

    public function index()
    {
        return view('videos.manage.index',
            ['videos' => Video::all()
            ]);
    }



    /**
     * C -> Create -> Guardara a base de dades el nou video
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
        ]);

        $video = Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'serie_id' => $request->serie_id,
            'user_id' => $request->user_id
        ]);
        session()->flash('status','Successfully created');

        VideoCreated::dispatch($video);

        return redirect()->route('manage.videos');
    }
    /**
     * R -> NO LLISTA -> Individual ->
     */


    /**
     * U -> update -> Form
     */
    public function edit($id)
    {
        return view('videos.manage.edit',['video' => Video::findOrFail($id) ]);
    }

    /**
     * U -> update -> Processarà el form i guardara les modificacions
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;
        $video->save();
        session()->flash('status','Successfully edited');
        return redirect()->route('manage.videos');
    }


    public function destroy($id)
    {
        Video::find($id)->delete();
        session()->flash('status','Successfully removed');
        return redirect()->route('manage.videos');
    }
}
