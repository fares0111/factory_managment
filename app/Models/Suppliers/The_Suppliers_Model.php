<?php

namespace App\Models\Suppliers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class The_Suppliers_Model extends Model
{
    use HasFactory;
public $timestamps = false;

public $table = "suppliers";


public  function Invoices(){


return $this->hasMany(Purchases_Invoices::class,"supplier_id");

}


public function Installments(){


return $this->hasMany(Suppliers_Installments::class,"supplier_id");

}

public function Returns(){


    return $this->hasMany(Purchases_returns_Model::class,"supplier_id");

}
}
