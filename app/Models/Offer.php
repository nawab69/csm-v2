<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }


}
