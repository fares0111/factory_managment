<?php

namespace App\Http\Controllers\Laundries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Super_Admin;
use App\Models\Laundries\Laundries_Installments_Model;
use App\Models\Laundries\The_Laundries_Model;
use App\Models\Admin;
use App\Notifications\Creation_Notifications;

use App\Traits\Notifications;
use App\Traits\Data_Entry;

class Laundries_Installments extends Controller
{
    use Notifications;
    use Data_Entry;
    public $Type;

    public function Add_New_Installment(){

        $Launderer_Payments = The_Laundries_Model::select()->get();
        
        return view("Laundries/New_Payment",compact("Launderer_Payments"));
        
        }
        
        
public function withrecite(request $request){

    $Insert_Launderer_Payments = new Laundries_Installments_Model();
    
    $Insert_Launderer_Payments->name = $request->name;
    
    $Insert_Launderer_Payments->price = $request->price;
    
    $Insert_Launderer_Payments->date = $request->date;
    
    $Insert_Launderer_Payments->laundrie_id = $request->Launderer_Id;

    $this->Role_Assigner($Insert_Launderer_Payments);

    $Insert_Launderer_Payments->save();
    
    $this->Type = "ايداع في الخزينه";
    $this->Notifications_Sender($Insert_Launderer_Payments,$this->Type);

    
    return redirect()->back();
    
    
    
    }
    public function View_All_Installments(){

        $All_Payments = Laundries_Installments_Model::all();
        
        $Total_Paymentys_Cash = Laundries_Installments_Model::all()->sum("price");
        
        return view("Laundries/View_All_Payments",compact("All_Payments","Total_Paymentys_Cash"));
        
        }
        
        public function Edit_Laundries_Installment($id){

            $Edit_Laundries_Installments = Laundries_Installments_Model::find($id);
        
            return view("Laundries/Edit_Payments",compact("Edit_Laundries_Installments"));
        
            }
        

            public function Update_Laundries_Installment(request $request,$id){

                $Update_Laundries_Installments = Laundries_Installments_Model::find($id);
                
                $Update_Laundries_Installments->date = $request->date;

                $Update_Laundries_Installments->price = $request->price;

                
                $Update_Laundries_Installments->save();
                
                return redirect()->route("search");
                }
        
                public function Delete_Launderies_Installment($id){


                    $Delete_Laundries_Installments = Laundries_Installments_Model::where("id",$id)->delete();
                    
                    return redirect()->back();
                    
                    }
                    

}
