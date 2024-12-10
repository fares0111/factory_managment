<?php

namespace App\Http\Controllers\Laundries;
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;
use App\Models\Laundries\Laundries_Invoices_Model;
use App\Models\Laundries\Laundries_Installments_Model;
use App\Models\Laundries\The_Laundries_Model;
use App\Notifications\Creation_Notifications;

use App\Traits\Notifications;
use App\Traits\Data_Entry;

class Laundries_Invoice extends Controller
{


use Notifications;
use Data_Entry;
    public $Type;
public function Add_New_Laundries_Invoice(){

$Launderers = The_Laundries_Model::all();

return view('Laundries/New_Launderer_Invoice',compact("Launderers"));



}

public function Insert_Laundries_Invoive(request $request){

    $Insert_Launderer_Invoice = new Laundries_Invoices_Model();
$Launder = The_Laundries_Model::find($request->Launderer_Id);
    $Insert_Launderer_Invoice->much = $request->much;
    $Insert_Launderer_Invoice->type = $request->type;
    $Insert_Launderer_Invoice->washer = $Launder->name;
    $Insert_Launderer_Invoice->price = $request->price;
    $Insert_Launderer_Invoice->total = $request->much * $request->price;
    $Insert_Launderer_Invoice->prosses = $request->prosses;
    $Insert_Launderer_Invoice->commants = $request->comments;
    $Insert_Launderer_Invoice->laundrie_id = $request->Launderer_Id;

    
    $this->Role_Assigner($Insert_Launderer_Invoice);

   
    $Insert_Launderer_Invoice->save();
    $this->Type = "ايداع في الخزينه";
    $this->Notifications_Sender($Insert_Launderer_Invoice,$this->Type);


    return redirect()->back();

    }

public function Edit_Laundries_Invoice($id){

    $Edit_Launderer_Invoice = Laundries_Invoices_Model::find($id);

    return view("Laundries/Edit_Launderer_Invoice",compact("Edit_Launderer_Invoice"));

    }

    public function Update_Laundries_Invoice(request $request,$id){

        $Update_Launderer_Invoice = Laundries_Invoices_Model::find($id);

    $Update_Launderer_Invoice->much = $request->much;
    $Update_Launderer_Invoice->type = $request->type;
    $Update_Launderer_Invoice->washer = $request->washer;
    $Update_Launderer_Invoice->price = $request->price;
    $Update_Launderer_Invoice->total = $request->much * $request->price;
   
        $Update_Launderer_Invoice->save();
        
        return redirect()->back();
        }
    
        public function Delete_Laundries_Invoice($id){


            $Delete_Laundries_Invoices = Laundries_Invoices_Model::where("id",$id)->delete();
            
            return redirect()->back();
            }
}