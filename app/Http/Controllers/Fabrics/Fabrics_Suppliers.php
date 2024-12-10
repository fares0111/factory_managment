<?php

namespace App\Http\Controllers\Fabrics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fabrics\Fabrics_Model;
use App\Models\Fabrics\Add_New_Fabric_Clint;


class Fabrics_Suppliers extends Controller
{
    public function Add_Fabric_Clint(){

        return view("fabrics/Add_Fabric_Clints");
        
        }

        
   public function Insert_Fabric_Clint(request $request){

    $New_Clint = new Add_New_Fabric_Clint();
    
    $New_Clint->name = $request->name;
    $New_Clint->address = $request->address;
    $New_Clint->save();
    
    
    return redirect()->route("add_fabric_clint");
    }

    public function Get_All_Fabrics_Clint($id){

        //cash recite
        $The_Clint = Add_New_Fabric_Clint::where("id",$id)->get()->first();
        
        $The_Cash_Recite = $The_Clint->Cash_Invoices()->get()->all();
        $The_Total_Amount = $The_Clint->Cash_Invoices()->sum("total");
        $much_of_fabricmeter = $The_Clint->Cash_Invoices()->sum("much_of_fabricmeter");
        $much_of_fabricrobe = $The_Clint->Cash_Invoices()->sum("much_of_fabricrobe");
        
            $The_Deferred_Recite = $The_Clint->deferred_Invoices()->get()->all();
            $The_Total_Deferred_Amount = $The_Clint->deferred_Invoices()->sum("total");
            $Deferred_Much_Of_Fabricmeter = $The_Clint->deferred_Invoices()->sum("much_of_fabricmeter");
            $Deferred_Much_Of_Fabricrobe = $The_Clint->deferred_Invoices()->sum("much_of_fabricrobe"); 
            $Total_Deferred = $The_Clint->deferred_Invoices()->sum("total_deferred");
        
        
        $All_Installment = $The_Clint->Installments()->get()->all();
        $Total_Installment = $The_Clint->Installments()->sum("amount");
        
        $Total_Of_Meters = $much_of_fabricmeter + $Deferred_Much_Of_Fabricmeter;
        $Total_Of_Robes =    $Deferred_Much_Of_Fabricrobe + $much_of_fabricrobe;
        $Net_Amount = $The_Total_Amount +  $The_Total_Deferred_Amount +  $Total_Deferred - $Total_Installment;
        $Total_Recite_Amount = $The_Total_Amount + $The_Total_Deferred_Amount + $Total_Deferred;
        return view("fabrics.The_Final_Statment_Account",
        
        compact(
            
            'Total_Of_Meters',
            'Total_Of_Robes',
            'Net_Amount',
            'Total_Deferred',
            'The_Cash_Recite',
            'The_Deferred_Recite',
            'All_Installment',
            'Total_Installment',
            'Total_Recite_Amount',
            'The_Clint'
        ));
        
        }

 

            public function Fabrics_Clint_Statment(){

                $Clints = Add_New_Fabric_Clint::all();
                
                return view("fabrics/Clint_Account_Fabrins_Staitment",compact("Clints"));
                
                
                }

}
