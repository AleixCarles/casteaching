<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['published_at'];
//    protected $casts = ['published_at'=>'datetime:Y-m-d'];

//formatted_published_at accesor
    public function getFormattedPublishedAtAttribute()
    {
//        dd($this->published_at->format('j \d\e F \d\e\ Y'));
        $locale_date=$this->published_at->locale('ca_es');
        return $locale_date->day . ' de ' . $locale_date->monthName . ' de ' . $locale_date->year;
    }
}
