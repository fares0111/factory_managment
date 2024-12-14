<?php

namespace App\Http\Controllers\Human_Resources;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Human_Resources\new_em;
use App\Models\Human_Resources\add_new_with;
use App\Models\Human_Resources\abs;
use App\Models\Human_Resources\employees_process;

use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Admin;
use App\Models\Super_Admin;

use App\Traits\Notifications;
use App\Traits\Data_Entry;

use App\Models\Human_Resources\late_time;
use App\Models\Human_Resources\over_time;

class employees extends Controller
{
    use Notifications;
    use Data_Entry;
    
    public $Type;


public function Index(){

return view("employees.Index");

}


public function new_em(){


return view("employees/new_em");

}


//اضافة عامل
public function insert_em(request $request){

$col = new new_em();

$col->name = $request->name;
$col->salary = $request->salary;
$col->jop = $request->jop;
$col->date = $request->date;
$col->hours = $request->hours;


$col->save();


$Employee = new employees_process();

$Employee->employees_id = $col->id ;
$Employee->save();

return redirect()->route("new_em");
}

// المصروفات


public function add_new_with(){


$names = new_em::select("name")->get(); 

return view("employees/add_withdraws", compact("names"));

}

public function insert_with_em(request $request){

    $Withdraw = new add_new_with();
    
    $Withdraw->name = $request->name;
    $Withdraw->amount = $request->amount;
    $Withdraw->date = $request->date;

    $this->Role_Assigner($Withdraw);
    $Withdraw->save();

$this->Type = "سحب لعامل";
$this->Notifications_Sender($Withdraw,$this->Type);
    return redirect()->route("add_new_with");
    }


// اضافة غياب

public function add_abs(){

$all = new_em::select("name")->get();

return view("employees/Absence_registration",compact("all"));


}

public function insert_add(request $request){

$Absence = new abs();
$static = new_em::where("name",$request->name)->get()->first();
$daily_salary = $static->salary /26;
$Absence->name = $request->name;
$Absence->date = $request->date;
$Absence->no=1;

$this->Role_Assigner($Absence);

$Absence->save();


$this->Type = " غياب لعامل ";
$this->Notifications_Sender($Absence,$this->Type);



return redirect()->route("statment");

}

public function statment(){
    $all = new_em::all();
   
   $old = Carbon::parse("2024-06-2 19:30:13");
   $new = Carbon::now();

   $diff= $new->diffInDays($old);
    $diff;
   
    return view("employees/statment",compact('all'));
 
}

public function search_about_statment(request $request){

$employee = new_em::where("id",$request->id)->get()->first();
$Id = $employee->id;

$user_attendeces = $employee->attendec()->get(); 

$user_lates = $employee->late_time()->get();
$user_over_times =$employee->over_time()->get();
 
$salary = $employee->salary;
$Total_salary = count($user_attendeces) * $employee->salary ;



$Price_Hour = $employee->salary /6 /$employee->hours;
$Plus_Hours = ceil($user_over_times->sum("number") * $Price_Hour);
$Abs_Hours = ceil($user_lates->sum("number") * $Price_Hour);


// المسحوبات
    $with = add_new_with::where("name",$request->name)->get();
    $sumwith =add_new_with::where("name",$request->name)->sum("amount");
//الغياب ايام الغياب

    $abs = ceil(abs::where("name",$request->name)->select("no")->sum("no"));
    $allabs = abs::where("name",$request->name)->get();
    $priceabs= ceil($abs *($salary /6));
//اجمالي الباقي

$Net = ceil($Total_salary + $Plus_Hours - $Abs_Hours - $priceabs - $sumwith);


return view("employees/results",compact(
    
    'with',
    'abs',
    'priceabs',
    'salary',
    'sumwith',
    'allabs',
    "Total_salary",
    "Plus_Hours",
    "Abs_Hours",
    "Net",
    "user_attendeces",
    "user_lates",
    "user_over_times"


));
   
}



public function View_Attendec_Form(){

$Employees = new_em::all();

return view("employees_process.Attendec_Form",compact("Employees"));


}


public function Increase_Attendec(request $request){

$Id = $request->id;
$start_week = carbon::now()->addDays(2);
$end_week = carbon::now()->addDays(8);
//dd($start_week);


\DB::table("attendc")->insert([

 'clint_id' => $Id,
 'start_week' => $start_week,
 'end_week' => $end_week,
 
    
]);


return redirect()->back();

}


public function Abs_Hours_Form(){

    $Employees = new_em::all();

    return view("employees_process.Abs_Hours_Form",compact("Employees"));
    

}


public function Increase_Abs_Hours(request $request){

    $Id = $request->id;

    $record = new late_time();
    
    $record->number =  $request->hours;
    $record->clint_id = $request->id;
    $record->save(); 
    
    return redirect()->back();

}

public function Compensatory_Hours_Form(){


    $Employees = new_em::all();

    return view("employees_process.Compensatory_Hours_Form",compact("Employees"));
    


}

public function Increase_Compensatory_Hours(request $request){


    $Id = $request->id;

    $record = new over_time();
    
    $record->number =  $request->hours;
    $record->clint_id = $request->id;
    $record->save();
    
    return redirect()->back();



}


}





