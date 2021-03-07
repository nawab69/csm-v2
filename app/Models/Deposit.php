<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Deposit extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'trx_id';
    }


    protected static function boot()
    {
        parent::boot();

        // Order by name DESC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('deposit')
            ->singleFile()
            ->useFallbackUrl(config('app.placeholder').'160.png')
            ->useFallbackPath(config('app.placeholder').'160.png');
    }
}
