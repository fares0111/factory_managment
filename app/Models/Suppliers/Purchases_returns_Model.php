<?php

namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases_returns_Model extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "purchases_returns";
}
