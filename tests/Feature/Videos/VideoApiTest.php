<?php

namespace Tests\Feature\Videos;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\VideosApiController::class
 */
class VideoApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function guest_users_cannot_store_videos()
    {
        $response = $this->postJson('api/videos', $video = [
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://www.youtube.com/embed/2NnTOzZBieM']);
        $response
            ->assertStatus(401);
            $this->assertCount(0,Video::all());
    }

    /**
     * @test
     */
    public function user_with_permission_can_store_videos()
    {
        $this->loginAsVideoManager();
        $response = $this->postJson('api/videos', $video = [
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://www.youtube.com/embed/2NnTOzZBieM']);
        $response
            ->assertStatus(201)
            ->assertJson(fn(AssertableJson $json) =>
            $json->has('id')
                ->where('title', $video['title'])
                ->where('url', $video['url'])
                ->etc()
            );
        $newVideo = Video::find($response['id']);
        $this->assertEquals($response['id'],$newVideo->id);
        $this->assertEquals($response['title'],$newVideo->title);
        $this->assertEquals($response['description'],$newVideo->description);
        $this->assertEquals($response['url'],$newVideo->url);
    }

    /**
     * @test
     */
    public function guest_users_can_index_published_videos()
    {
        $videos = create_sample_videos();
        $response = $this->get('/api/videos');

        $response->assertStatus(200);
        $response->assertJsonCount(count($videos));
    }

    /**
     * @test
     */
    public function guest_users_can_show_published_videos()
    {
        $video = Video::create([
            'title' => 'TDD 101',
            'description' => 'Bla bla bla',
            'url' => 'https://www.youtube.com/embed/2NnTOzZBieM'
        ]);
        $response = $this->getJson('/api/videos/' . $video->id);

        $response->assertStatus(200);
        $response->assertSee($video->id);
        $response->assertSee($video->title);
        $response->assertSee($video->description);

        $response
            ->assertJson(fn(AssertableJson $json) => $json->where('id', $video->id)->where('title', $video->title)
                ->where('url', $video->url)
//                ->missing('password')
                ->etc()
            );

    }

    /**
     * @test
     */
    public function guest_users_cannot_show_unexisting_videos()
    {
        $response = $this->get('/api/videos/999');

        $response->assertStatus(404);
    }

    private function loginAsVideoManager()
    {
        Auth::login(create_video_manager_user());
    }
}
