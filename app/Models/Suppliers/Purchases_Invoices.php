<?php

namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases_Invoices extends Model
{
    use HasFactory;
    public $table = "Purchases_Invoices";
    public $timestamps = false;
}
