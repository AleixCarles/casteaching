<?php

namespace Tests\Unit\Listeners;

use App\Events\SeriesImageUpdated;
use App\Jobs\ProcessSeriesImage;
use App\Models\Serie;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Support\Facades\Queue;

/**
 * @covers ScheduleSeriesImageProcessing::class
 */
class ScheduleSeriesImageProcessingTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function it_not_queues_a_job_to_process_series_image_if_image_not_exists()
    {
        Queue::fake();
        $serie = Serie::create([
            'title' => 'INTRO',
            'description' => 'blablalblal'
        ]);
        SeriesImageUpdated::dispatch($serie);

        Queue::assertNotPushed(ProcessSeriesImage::class);
    }

/** @test */
public
function it_queues_a_job_to_process_Series_image()
{
    Queue::fake();
    $serie = Serie::create([
        'title' => 'INTRO',
        'description' => 'blablalblal',
        'image' => 'series/random.png'
    ]);
    SeriesImageUpdated::dispatch($serie);
    Queue::assertPushed(ProcessSeriesImage::class, function ($job) use ($serie) {
        return $serie->is($job->serie);
    });
}

}
