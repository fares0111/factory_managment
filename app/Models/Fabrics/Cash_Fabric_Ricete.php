<?php

namespace App\Models\Fabrics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash_Fabric_Ricete extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "cash_fabric_invoices";
}
