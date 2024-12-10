<?php

namespace App\Models\Clints;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class The_Clints_Model extends Model
{
    use HasFactory;
public $timestamps= false;
public $table = "Clints";


    

public function Invoices(){


return $this->hasMany(Sales_Invoices_Model::class,"clint_id");


}

public function Installments(){

return $this->hasmany(Sales_Installment_Model::class,"clint_id");

}


public function Returns(){



    return $this->hasMany(Sales_return_Model::class,"clint_id");

} 

}
