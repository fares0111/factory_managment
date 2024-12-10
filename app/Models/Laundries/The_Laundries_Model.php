<?php

namespace App\Models\Laundries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class The_Laundries_Model extends Model
{
    use HasFactory;

    public $table = "laundries";
    public $timestamps = false;


    public function Invoices(){


return $this->hasMany(Laundries_Invoices_Model::class,"laundrie_id");

    }

    
    public function Installments(){


        return $this->hasMany(Laundries_Installments_Model::class,"laundrie_id");
        
            }
}
