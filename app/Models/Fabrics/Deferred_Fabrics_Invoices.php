<?php

namespace App\Models\Fabrics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deferred_Fabrics_Invoices extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "deferred_fabrics_invoices";
}
