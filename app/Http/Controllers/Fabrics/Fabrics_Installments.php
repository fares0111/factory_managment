<?php

namespace App\Http\Controllers\Fabrics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Super_Admin;
use App\Models\Fabrics\Installment_Fabric_Clint;
use App\Models\Fabrics\Add_New_Fabric_Clint;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Admin;


use App\Traits\Notifications;
use App\Traits\Data_Entry;

class Fabrics_Installments extends Controller
{
    use Notifications;
    use Data_Entry;
    public $Type;

    public function Add_New_Fabrics_Installment()
    {
    
        $Clints = Add_New_Fabric_Clint::get();
        return view("fabrics/Add_Fabrics_Installment",compact("Clints"));
    
    }


    public function Insert_Fabrics_Installment(Request $request){

        $Insert_Installment = New Installment_Fabric_Clint();
        
        $Insert_Installment->clint = $request->Fabric_Clint;
        $Insert_Installment->amount = $request->Amount;
        $Insert_Installment->date = $request->Date;
        $Insert_Installment->fabric_clint_id = $request->Fabric_Clint_Id;

        $Insert_Installment->comments = $request->Comments;
        
        $this->Role_Assigner( $Insert_Installment);
        $Insert_Installment->save();

        $this->Type = " دفعة قماش";
        $this->Notifications_Sender($Insert_Installment,$this->Type);
        
        
        return redirect()->back();
        
        
        }
    

}

