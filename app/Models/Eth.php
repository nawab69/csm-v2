<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eth extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = ['public_key','private_key'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
