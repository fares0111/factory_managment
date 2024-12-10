<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vodafone_Cash_Withdrals extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "vodafone_cash_withdrawls";

}
