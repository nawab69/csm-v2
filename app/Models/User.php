<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements HasMedia, JWTSubject
{
    use Notifiable, InteractsWithMedia;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_expires_at' => 'datetime',
    ];

    public function registerMediaCollections() : void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl(config('app.placeholder').'160.png')
            ->useFallbackPath(config('app.placeholder').'160.png')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(160)
                    ->height(160);
            });
    }

    /**
     * Get all users
     *
     * @return mixed
     */
    public static function getAllUsers()
    {
        return Cache::rememberForever('users.all', function() {
            return self::with('role')->latest('id')->get();
        });
    }

    /**
     * Flush the cache
     */
    public static function flushCache()
    {
        Cache::forget('users.all');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::updated(function () {
            self::flushCache();
        });

        static::created(function() {
            self::flushCache();
        });

        static::deleted(function() {
            self::flushCache();
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function hasPermission($permission): bool
    {
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function escrow()
    {
        return $this->hasOne(Escrow::class);
    }

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function send()
    {
        return $this->hasMany(Send::class);
    }

    public function receive()
    {
        return $this->hasMany(Receive::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function kyc()
    {
        return $this->hasOne(Kyc::class);
    }

    public function sellcards()
    {
        return $this->hasMany(Sellcard::class);
    }

    public function buycards()
    {
        return $this->hasMany(Buycard::class);
    }

    public function buys()
    {
        return $this->hasMany(Buy::class);
    }

    public function sells()
    {
        return $this->hasMany(Sell::class);
    }


    // New Features

    // Balance

    public function balances()
    {
        return $this->hasMany(Balance::class);
    }


    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function tradeBuys()
    {
        return $this->hasMany(Trade::class,'buyer_id');
    }

    public function tradeSells()
    {
        return $this->hasMany(Trade::class,'seller_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function eth()
    {
     return $this->hasOne(Eth::class);
    }

    public function twallet()
    {
        return $this->hasOne(Twallet::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
