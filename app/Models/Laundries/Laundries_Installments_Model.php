<?php

namespace App\Models\Laundries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundries_Installments_Model extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $table = "laundries_installments";
}
