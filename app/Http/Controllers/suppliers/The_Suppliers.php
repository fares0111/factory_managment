<?php

namespace App\Http\Controllers\suppliers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Suppliers\The_Suppliers_Model;
use App\Models\Finance\Payments_Ways;
class The_Suppliers extends Controller
{
    public function Index(){


        return view("Suppliers/Suppliers_Index");
        
        }

        public function Add_New_Suppliers(){


            return view("Suppliers/New_Suppliers");
            
            }

            public function Insert_New_Suppliers(request $request) {
                
                $Suppliers = new The_Suppliers_Model();

                $Suppliers->name = $request->name;
                $Suppliers->number = $request->number;
                $Suppliers->address = $request->address;
                
                $Suppliers->save();
                
                return redirect()->back();
                


            }

            
/*public function showdeseller(){

    $Suplliers = The_Suppliers_Model::all("name");
    $payment_ways = Payments_Ways::all("name");
return view("Suppliers/New_Supplier_Installment",compact("Suplliers","payment_ways"));


}
*/  
 public function Check_On_Supplier(){
    
    $Suppliers = The_Suppliers_Model::all();
    
    return view("Suppliers/check_On_Suppliers",compact("Suppliers"));
    
    }
    
    public function Supplier_Account_Statment($id){

        $Supplier = The_Suppliers_Model::where("id",$id)->get()->first();

        $Purchases_Invoices = $Supplier->Invoices()
        ->orderBy("date","desc")
        ->get()
        ->all();

        $Total_Purchases_Invoices_Cash = $Supplier->Invoices()->sum("total");

$Total_Installments_Purchases_Cash = $Supplier->Installments()->sum("amont");

$Purchases_Installments = $Supplier->Installments()
->orderBy("date","desc")
->get()
->all();

        $All_Purchases_Returns = $Supplier->Returns()
        ->orderBy("date","desc")
        ->get()
        ->all();
        $Total_Returns_Amount = $Supplier->Returns()->sum("total");

$Total_Debt = $Total_Purchases_Invoices_Cash;

$Total_Payments  = $Total_Installments_Purchases_Cash;

$Net_Cash = $Total_Purchases_Invoices_Cash - $Total_Installments_Purchases_Cash - $Total_Returns_Amount;
       return view("Suppliers/Supplier_Account_Statment",compact(
        
        "Supplier",
        "Purchases_Invoices",
        "Total_Purchases_Invoices_Cash",
        "Total_Installments_Purchases_Cash",
        "Purchases_Installments",
        "All_Purchases_Returns",
        "Total_Returns_Amount",
        "Net_Cash",
        "Total_Debt",
        'Total_Payments',
    
    ));
       
       
       }
         

}
