<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Unit\VideoTest;

class Video extends Model
{
    use HasFactory;

    public static function testedBy()
    {
        return VideoTest::class;
    }
    protected $guarded = [];
    protected $dates = ['published_at'];

    public function getFormattedPublishedAtAttribute()
    {
        if(!$this->published_at) return '';
        $locale_date=$this->published_at->locale('ca_es');
        return $locale_date->day . ' de ' . $locale_date->monthName . ' de ' . $locale_date->year;
    }

    public function getFormattedGorHumansPublishedAtAttribute()
    {
        return optional($this->published_at)->diffForHumans(Carbon::now());
    }

    public function getPublishedAtTimestampAttribute()
    {
        return optional($this->published_at)->timestamp;
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setSerie(Serie $serie)
    {
        $this->serie_id = $serie->id;
        $this->save();
        return $this;
    }
}
