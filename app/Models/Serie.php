<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tests\Unit\SerieTest;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Serie extends Model
{
    use HasFactory;

    public static function testeBy()
    {
        return SerieTest::class;
    }

    protected $guarded = [];
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function getFormattedCreatedAtAttribute()
    {
        if(!$this->created_at) return '';
        $locale_date=$this->created_at->locale('ca_es');
        return $locale_date->day . ' de ' . $locale_date->monthName . ' de ' . $locale_date->year;
    }

    public function getFormattedForHumansCreatedAtAttribute()
    {
        return optional($this->created_at)->diffForHumans(Carbon::now());
    }

    public function getCreatedAtTimestampAttribute()
    {
        return optional($this->created_at)->timestamp;
    }
    protected function imageUrl(): Attribute
    {
        return new Attribute(
            get: fn ($value) => is_null($this->image) ? 'series/random.png' : $this->image ,
        );
    }
    protected function url(): Attribute
    {
        return new Attribute(
            get: fn ($value) => count($this->videos) > 0 ? '/videos/' . $this->videos->first()->id : '#'
        );
    }
}
