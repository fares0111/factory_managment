<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vodafon_Cash_Deposits extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "increase_vodafone_cash";

}
