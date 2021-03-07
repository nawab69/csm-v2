<?php

namespace App\Models;

use Bezhanov\Ethereum\Converter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Twallet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMainEthAttribute($value)
    {
        $converter = new Converter();
        return round($converter->fromWei($value,'ether'),8,PHP_ROUND_HALF_DOWN);
    }

    public function getEscrowEthAttribute($value)
    {
        $converter = new Converter();
        return round($converter->fromWei($value,'ether'),8,PHP_ROUND_HALF_DOWN);
    }
}
