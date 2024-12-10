<?php

namespace App\Http\Controllers\suppliers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Suppliers\The_Suppliers_Model;
use App\Models\Suppliers\Purchases_Invoices;
use App\Models\Suppliers\Purchases_returns_Model;
use App\Notifications\Creation_Notifications;

use App\Traits\Notifications;
use App\Traits\Data_Entry;
class Purchases_Return extends Controller
{

    use Notifications;
    use Data_Entry;
    public $Type;

    public function Add_Form(){

        $All_Sellers = The_Suppliers_Model::all();
        $All_Types = Purchases_Invoices::select("name")->get();
        return view("purchasesreturns\FormAddPurchasesReturn",compact("All_Sellers","All_Types"));
        
        }
        
        public function Insert_Purchases_Return(Request $request){
        
        
        $Type = Purchases_Invoices::where("code",$request->The_Code)->get()->first();
        $Type_Price = $Type["price"];
        $Data_Purchases_Return =  New Purchases_returns_Model();
        
        $Data_Purchases_Return->name  =  $request->TheSeller;
        $Data_Purchases_Return->type =  $Type->name;
        $Data_Purchases_Return->total =  $request->Much_Of_Return * $Type_Price;
        $Data_Purchases_Return->much  =  $request->Much_Of_Return;
        $Data_Purchases_Return->date  =  $request->Date_Of_Return;
        $Data_Purchases_Return->supplier_id  =  $request->Suppliers_id;
        $Data_Purchases_Return->code  =  $request->The_Code;

        $this->Role_Assigner($Data_Purchases_Return);

        $Data_Purchases_Return->save();
        
        $Type->num -=$Data_Purchases_Return->much;
        $Type->save();

        $this->Type = " مرتجع شراء";
        $this->Notifications_Sender($Data_Purchases_Return,$this->Type);
        
        return redirect()->back();
        }
        


        public function Edit_Purchases_Return($id){

  
            $Date_Purchases_Return= Purchases_returns_Model::find($id);
            $Supplier = $Date_Purchases_Return->name;
            return view('purchasesreturns\edit',compact("Supplier","Date_Purchases_Return"));
            
            }

            public function Update_Purchases_Return(request $request,$id){


                $Model = Purchases_Invoices::where("code",$request->The_Code)->get()->first();
                $Model_Price = $Model["price"];
                $Data_Purchases_Return = Purchases_returns_Model::find($id);
            
        
                $Data_Purchases_Return->much  =  $request->Much_Of_Return;
                $Data_Purchases_Return->total =  $request->Much_Of_Return * $Model_Price;
                $Data_Purchases_Return->date  =  $request->Date_Of_Return;
        
                $Data_Purchases_Return->save();
                
        
                $Model->save();
                
                
                return redirect()->route(route: "sellers");
                }
        
            public function Delete_Purchases_Return($id) {
        
                    $Delete_Sales_Return = Purchases_returns_Model::find($id)->delete();
                    return redirect()->route("buyers");
        
                }


}
