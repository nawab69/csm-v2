<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sellcard extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function giftcard()
    {
        return $this->belongsTo(Giftcard::class);
    }

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('sellcard')
            ->singleFile()
            ->useFallbackUrl(config('app.placeholder').'160.png')
            ->useFallbackPath(config('app.placeholder').'160.png');
    }
}
