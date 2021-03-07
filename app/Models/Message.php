<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date)
    {
        if(Carbon::parse($date)->format('dm') == Carbon::parse(today())->format('dm')){
            return Carbon::parse($date)->format('H:i');
        }else{

            return Carbon::parse($date)->format('d M H:i');
        }
    }
}
