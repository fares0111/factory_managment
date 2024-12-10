<?php

namespace App\Http\Controllers\Clints;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clints\The_Clints_Model;
use App\Models\Clints\Sales_Return_Model;
use App\Models\Statics\The_Factory_Models;
use App\Models\Super_Admin;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Admin;
use App\Traits\Notifications;
use App\Traits\Data_Entry;

class Sales_Return extends Controller
{

    use Notifications;
    use Data_Entry;

public $Type;
public function Add_New_Return_Stuck(){

$All_Clints = The_Clints_Model::get();
$All_Codes = The_Factory_Models::select("code")->get();
return view("Sales_Return\Form_Add_SalesReturn",compact("All_Clints","All_Codes"));

}

public function Insert_sales_return(request $request){


$Model = The_Factory_Models::where("code",$request->The_Code)->get()->first();
$Model_Price = $Model["price"];
$Data_Sales_Return =  New Sales_Return_Model();

$Data_Sales_Return->name  =  $request->TheSaller;
$Data_Sales_Return->model =  $Model->name;
$Data_Sales_Return->total =  $request->Much_Of_Return * $Model_Price;
$Data_Sales_Return->much  =  $request->Much_Of_Return;
$Data_Sales_Return->date  =  $request->Date_Of_Return;
$Data_Sales_Return->clint_id = $request->client_id;
$Data_Sales_Return->code = $request->The_Code;

$this->Role_Assigner($Data_Sales_Return);
$Data_Sales_Return->save();

$Model->much +=$Data_Sales_Return->much;
$Model->save();



            
$this->Type = " مرتجع بيع";
$this->Notifications_Sender($Data_Sales_Return,$this->Type);


return redirect()->back();
}

public function Edit_Sales_Return($id){

  
    $Date_Sale_Return= Sales_Return_Model::find($id);
    $Clint = $Date_Sale_Return->name;
    return  view('Sales_Return\edit',compact("Clint","Date_Sale_Return"));
    
    }

    public function Update_Sales_Return(request $request,$id){


        $Model = The_Factory_Models::where("code",$request->The_Code)->get()->first();
        $Model_Price = $Model["price"];
        $Data_Sales_Return = Sales_Return_Model::find($id);

        $Old_Much = $Data_Sales_Return->much;
        $New_Much = $request->Much_Of_Return;
        $dif = $Old_Much - $New_Much;
    

        $Data_Sales_Return->much  =  $request->Much_Of_Return;
        $Data_Sales_Return->total =  $request->Much_Of_Return * $Model_Price;
        $Data_Sales_Return->date  =  $request->Date_Of_Return;

        $Data_Sales_Return->save();
        

        if ($dif > 0) {
            // إذا كانت الكمية القديمة أكبر من الجديدة، يعني تم إنقاص الكمية
            $Model->much += $dif;
        } elseif ($dif < 0) {
            // إذا كانت الكمية الجديدة أكبر من القديمة، يعني تم زيادة الكمية
            $Model->much += $dif; // هنا $dif ستكون سلبية
        }
        //$Model->much +=$Data_Sales_Return->much;
        $Model->save();
        
        
        return redirect()->route("buyers");
        }

        public function Delete_Sales_Return($id) {

            $Delete_Sales_Return = Sales_Return_Model::find($id)->delete();
            return redirect()->route("buyers");

        }

}
