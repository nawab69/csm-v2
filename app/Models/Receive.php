<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function send()
    {
        return $this->belongsTo(Send::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
