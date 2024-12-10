<?php

namespace App\Http\Controllers\Fabrics;
use App\Http\Controllers\Controller;
use App\Models\Super_Admin;
use Illuminate\Http\Request;
use App\Models\Fabrics\Fabrics_Model;
use App\Models\Fabrics\Add_New_Fabric_Clint;
use App\Models\Fabrics\Cash_Fabric_Ricete;
use App\Models\Fabrics\Deferred;
class Fabrics_Manage extends Controller
{

public  function Form_Add_New_Fabrics(){

return view("fabrics/Add_New_Fabrics");

}

public function Insert_Fabrics(request $request){

$New_Fabrics = new Fabrics_Model();

$New_Fabrics->details = $request->The_Details;
$New_Fabrics->much_of_fabricrobe = $request->Much_OF_Robe;
$New_Fabrics->much_of_fabricmeter = $request->Much_OF_Meters;
$New_Fabrics->price = $request->Price_Of_Meter;
$New_Fabrics->total = $request->Much_OF_Meters * $request->Price_Of_Meter;
$New_Fabrics->code = $request->The_Code;


if (auth()->guard('admin')->check()) {
    // المستخدم مشرف
    $New_Fabrics->opreator = auth()->guard('admin')->user()->name;
    $New_Fabrics->is_admin = 'مسؤول';
} elseif (auth()->guard('web')->check()) {
    // المستخدم هو مستخدم عادي
    $New_Fabrics->opreator = auth()->guard('web')->user()->name;
    $New_Fabrics->is_admin = "عضو";

} 

$New_Fabrics->save();

return redirect()->back();

}

public function Get_All_Fabrics(request $request){


    $All_Fabrics =  Fabrics_Model::Get();
    
    return view("fabrics/View_All_Fabrics",compact("All_Fabrics"));
    
    }

}
