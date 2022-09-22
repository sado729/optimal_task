<?php

namespace App\Models;

use App\Enum\PaymentEnum;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['wo','work_date','parts_cost','payment'];
    public $timestamps = false;

    protected $casts = [
        'work_date' => 'date',
        'payment' => PaymentEnum::class
    ];
}
