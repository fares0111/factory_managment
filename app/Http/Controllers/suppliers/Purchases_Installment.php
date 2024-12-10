<?php

namespace App\Http\Controllers\suppliers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers\Suppliers_Installments;
use App\Models\Suppliers\The_Suppliers_Model;
use App\Models\Finance\Payments_Ways;
use App\Notifications\Creation_Notifications;


use App\Traits\Notifications;
use App\Traits\Data_Entry;
class Purchases_Installment extends Controller
{

    use Notifications;
    use Data_Entry;
    
    public $Type;
    public function Add_New_Installment(){

        $Suppliers = The_Suppliers_Model::all();
        $Payment_Ways = Payments_Ways::all("name");
    return view("Suppliers/New_Supplier_Installment",compact("Suppliers","Payment_Ways"));
    
    
    }
                
    public function Insert_New_Installment(request $request)
    {
    
    $Insert_Installment = new Suppliers_Installments();
    $Insert_Installment->payment_way = $request->way;
    $Insert_Installment->seller = $request->seller_name;
    $Insert_Installment->amont = $request->amont;
    $Insert_Installment->date = $request->date;
    $Insert_Installment->supplier_id = $request->supplier_id;

    $this->Role_Assigner($Insert_Installment);

    $Insert_Installment->save();


    $this->Type = " دفعة شراء";
    $this->Notifications_Sender($Insert_Installment,$this->Type);
    
    return redirect()->back();
    

    
    }
    





    public function Edit_Installment($id){

        $Edit_Purchases_Invoice = Suppliers_Installments::find($id);
    

        $Suppliers = The_Suppliers_Model::all("name");
        $Payment_Ways = Payments_Ways::all("name");

        return view("Suppliers/Edit_Purchases_Installment",compact(
            
            "Edit_Purchases_Invoice",
            "Suppliers",
            "Payment_Ways",
        ));
    
        }

        public function Update_Installment(request $request,$id){

            $Update_Supplier_Invoice = Suppliers_Installments::find($id);
            
            $Update_Supplier_Invoice->payment_way = $request->way;
            $Update_Supplier_Invoice->seller = $request->seller;
            $Update_Supplier_Invoice->amont = $request->amont;
            $Update_Supplier_Invoice->date = $request->date;
            $Update_Supplier_Invoice->save();
            return redirect()->route("sellers");
            
            }

            public function Delete_Purchases_Installment($id){


                $Delete_Payment = Suppliers_Installments::where("id",$id)->delete();
                
                return redirect()->route("sellers");
            }

    public function View_All_Deposits(){

        $Deposites = Suppliers_Installments::all();
        return view("Suppliers/View_All_Suppliers_Installment.",compact("Deposites"));
        }
    


}
