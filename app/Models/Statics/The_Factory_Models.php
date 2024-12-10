<?php

namespace App\Models\Statics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class The_Factory_Models extends Model
{
    use HasFactory;

public $table = "models_warehouse";
public $timestamps=false;
//public $primaryKey  = "name";
//public $keyType = "string";
public $autoincrement = false;

}
