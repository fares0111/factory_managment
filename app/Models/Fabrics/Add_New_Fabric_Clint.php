<?php

namespace App\Models\Fabrics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clints;

class Add_New_Fabric_Clint extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = "Add_New_Fabric_Clint";



    public function Cash_Invoices(){


        return $this->hasMany(Cash_Fabric_Ricete::class,"clint_id");
        
        
        }
        
        public function deferred_Invoices(){


            return $this->hasMany(Deferred_Fabrics_Invoices::class,"fabric_clint_id");
            
            
            }
        public function Installments(){
        
        return $this->hasmany(Installment_Fabric_Clint::class,"fabric_clint_id");
        
        }
        

}
