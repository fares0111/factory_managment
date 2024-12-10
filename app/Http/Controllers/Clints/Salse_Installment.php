<?php

namespace App\Http\Controllers\Clints;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clints\Sales_Installment_Model;
use App\Models\Clints\The_Clints_Model;
use App\Models\Finance\Payments_Ways;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Super_Admin;
use App\Models\Admin;


use App\Traits\Notifications;
use App\Traits\Data_Entry;

class Salse_Installment extends Controller
{
    use Notifications;
    use Data_Entry;
    
public $Type;

    public function Add_New_Installment(){

        $Clints = The_Clints_Model::all();
        $Payments_Ways = Payments_Ways::all("name");
    return view("Clints/New_Installment",compact("Clints","Payments_Ways"));
    
    
    }
    

    public function Insert_New_Istallment(request $request)
    {
    
    $Insert_Installment = new Sales_Installment_Model();
    $Insert_Installment->payment_way = $request->way;
    $Insert_Installment->buyer = $request->buyer;
    $Insert_Installment->amont = $request->amont;
    $Insert_Installment->date = $request->date;
    $Insert_Installment->commants = $request->commants;
    $Insert_Installment->clint_id = $request->buyer_id;


    $this->Role_Assigner($Insert_Installment);

    $Insert_Installment->save();

    $this->Type = " دفعة بيع";
    $this->Notifications_Sender($Insert_Installment,$this->Type);


return redirect()->back();

    
    }
    public function view_All_installment(){

        $deposites = Sales_Installment_Model::all();
        return view("Clints/View_Installment",compact("deposites"));
        }

        public function Edit_Sales_Installment($id){

            $Payment_Ways = Payments_Ways::all();
            $Edit_Installment = Sales_Installment_Model::find($id);
            
            return view("Clints/Edit_Installment",compact("Payment_Ways","Edit_Installment"));

        }

        public function Update_Installment_info(request $request,$id){

            $Update_Installment = Sales_Installment_Model::find($id);
            
            $Update_Installment->payment_way = $request->way;
            $Update_Installment->buyer = $request->buyer;
            $Update_Installment->amont = $request->amont;
            $Update_Installment->date = $request->date;
            $Update_Installment->save();
            return redirect()->route("buyers");
            
            }

            public function Delete_Sales_Installment($id){


                $Delete_Installment = Sales_Installment_Model::where("id",$id)->delete();
                
                return redirect()->route("buyers");
                }
    

}
