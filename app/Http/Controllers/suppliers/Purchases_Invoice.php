<?php

namespace App\Http\Controllers\suppliers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers\Purchases_Invoices;
use App\model\Statics\Models_Warehouse;
use App\Models\Suppliers\The_Suppliers_Model;
use App\Models\Finance\Payments_Ways;
use App\Notifications\Creation_Notifications;

use App\Traits\Notifications;
use App\Traits\Data_Entry;

class Purchases_Invoice extends Controller
{
    use Notifications;
use Data_Entry;
public $Type;
public function Index(){


return view("Main_Page");

}

public function Add_New_Purchases_Invoice(){

    $Purchases_Invoices = Purchases_Invoices::get()->all();
    $Suppliers = The_Suppliers_Model::all();
    $Payments_Ways = Payments_Ways::all();

return view("Purchases_Invoices/New_Purchases_Invoice",compact(
    
    "Purchases_Invoices",
    "Suppliers",
    "Payments_Ways",

));

}

public function Insert_Purchases_Invoice(request $request){




$Insert_Purchases_Invoice = new Purchases_Invoices();


$Insert_Purchases_Invoice->buyer = $request->buyer;
$Insert_Purchases_Invoice->name  = $request->name;
$Insert_Purchases_Invoice->num   = $request->num;
$Insert_Purchases_Invoice->Payment_Way = $request->Payment_Ways;
$Insert_Purchases_Invoice->code  = $request->code;
$Insert_Purchases_Invoice->price = $request->price;
$Insert_Purchases_Invoice->date = $request->date;
$Insert_Purchases_Invoice->total = $request->total;
$Insert_Purchases_Invoice->static_number = $request->num;

$Insert_Purchases_Invoice->supplier_id = $request->Supplier_id;
$this->Role_Assigner($Insert_Purchases_Invoice);

$Insert_Purchases_Invoice->save();


$this->Type = " فاتورة شراء";
$this->Notifications_Sender($Insert_Purchases_Invoice,$this->Type);

return redirect()->back();



}

public function Get_And_View_Purchases_Invoices(){

$Recites = Purchases_Invoices::get()->all();

return view("Purchases_Invoices/New_Purchases_Invoice",compact("Recites"));



}


public function Edit_Purchaes_Ivoice($id){

    $Edit_Purchases_Invoice = Purchases_Invoices::find($id);
    $Suppiers = The_Suppliers_Model::all();
    return view("Purchases_Invoices/Edit_Purchases_Invoice",compact("Edit_Purchases_Invoice","Suppiers"));

    }


    public function Update_Purchases_Invoice(request $request,$id){

        $Update_Purchases_Invoice = Purchases_Invoices::find($id,"id");
        
        $Update_Purchases_Invoice->buyer = $request->buyer;
        $Update_Purchases_Invoice->name  = $request->name;
        $Update_Purchases_Invoice->static_number   = $request->num;
        
        $Update_Purchases_Invoice->code  = $request->code;
        $Update_Purchases_Invoice->price = $request->price;
        $Update_Purchases_Invoice->date = $request->date;
        $Update_Purchases_Invoice->total = $request->total;
        
        $Update_Purchases_Invoice->save();
        
        
        
        return redirect()->route("sellers");
        
        }


        public function Delete_Purchases_Invoices($id){


            $Delete_Purchases_Invoice = Purchases_Invoices::where("id",$id)->delete();
            
            return redirect()->route("sellers");
            
            }
            

}
