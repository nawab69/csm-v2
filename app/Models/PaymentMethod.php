<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function deposits()
    {
        return $this->hasMany(Deposit::class,'payment_method_id');
    }
}
