<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash_Register_Withdrals extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "Cash_Register_Withdrals";
}
