<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments_Ways extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "payments_ways";
}
