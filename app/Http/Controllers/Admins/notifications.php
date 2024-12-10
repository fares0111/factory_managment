<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Clints\Sales_Installment_Model;
use App\Models\Clints\Sales_Invoices_Model;
use App\Models\Clints\Sales_Return_Model;


use App\Models\Suppliers\Purchases_Invoices;
use App\Models\Suppliers\Suppliers_Installments;
use App\Models\Suppliers\Purchases_returns_Model;

use App\Models\Fabrics\Cash_Fabric_Ricete;
use App\Models\Fabrics\Deferred_Fabrics_Invoices;
use App\Models\Fabrics\Installment_Fabric_Clint;

use App\Models\Laundries\Laundries_Installments_Model;
use App\Models\Laundries\Laundries_Invoices_Model;


use Illuminate\Support\Facades\DB;

class notifications extends Controller
{

public function Get_Data($Model,$id,$noti_id){
    

DB::table("notifications")->where("id",$noti_id)->update([

'read_at' =>now()

]);

$Data = $Model::find($id);

return view("admin/Result_Of_Notification",compact("Data"));
    
}


public function Mark_All_As_Read(){

    $Roll = null; 

if(auth()->guard("admin")->check()){

    $Roll = auth()->guard("admin")->user();


}else{

    $Roll = auth()->guard("super_admin")->user();

}
    
    // تحديد جميع الإشعارات كمقروءة
    $Roll->unreadNotifications->markAsRead();
    return redirect()->back();
}

}
