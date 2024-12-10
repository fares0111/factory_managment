<?php

namespace App\Models\Clints;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_Invoices_Model extends Model
{
    use HasFactory;


    public $timestamps = false;
    public $table = "sales_invoices";

}
