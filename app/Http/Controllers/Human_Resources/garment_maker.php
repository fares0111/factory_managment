<?php

namespace App\Http\Controllers\Human_Resources;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Human_Resources\Workers;
use App\Models\Human_Resources\Credit;
use App\Models\Human_Resources\Withdrawals;
use App\Models\Admin;
use App\Models\Super_Admin;
use App\Models\bro;
use App\Notifications\Creation_Notifications;

use App\Traits\Notifications;
use App\Traits\Data_Entry;

class garment_maker extends Controller
{
 
use Notifications;
use Data_Entry;   
    public $Type;




//الصنايعية

public function All_Worker(){

$All_Workers = workers::get();

return view("garment_maker/work",compact("All_Workers"));

}

Public Function Add_Worker_Form(){

return view("garment_maker/Add_Worker_Form");

}

Public Function Insert_Worker(request $request){

$Add_Worker = new Workers();

$Add_Worker->name = $request->name;
$Add_Worker->Credit = $request->credit;
$Add_Worker->save();
return redirect()->route("Add_Worker_Form");

}

//المسحوبات

public function worker_withdraw_form(){

$Workers = Workers::get();
return view("garment_maker/add_withdraw",compact("Workers"));


}

public function insert_withdraw(request $request){

$Add_Withdraw = new Withdrawals();

$Add_Withdraw->name = $request->name;
$Add_Withdraw->much = $request->amont;
$Add_Withdraw->date = $request->date;
$Add_Withdraw->comments = $request->comments;

$this->Role_Assigner($Add_Withdraw);
$Add_Withdraw->save();


$this->Type = "سحب لصنايعي";
$this->Notifications_Sender($Add_Withdraw,$this->Type);


return redirect()->route("worker_withdraw_form");

}


// الانتاج 


public function worker_addetion_form(){

    $Workers = Workers::get();

    return view("garment_maker/worker_addetion_form",compact("Workers"));
}



        public function insert_addetion(Request $request)
        {
                // فك شفرة JSON القادمة من الطلب
                $expenses = $request->input('expenses');
    
                if (is_array($expenses)) {
                    foreach ($expenses as $expenseData) {
                        $w = new Credit();
                        $w->name = $expenseData['name'];
                        $w->much = $expenseData['much'];
                        $w->price = $expenseData['price'];
                        $w->date = $expenseData['date'] ?? null;
                        $w->type = $expenseData['type'];
                        $w->ditails = $expenseData['details'];
                        $w->comments = $expenseData['comments'] ?? null;
                        $w->total = $expenseData["much"] * $expenseData["price"];

                        $this->Role_Assigner($w);
                        $w->save();

                        $this->Type = "انتاج  لصنايعي";
                        $this->Notifications_Sender($w,$this->Type);


                    }
                  
                    return response()->json(['message' => 'Expenses saved successfully!'], 200);
                } else {
                    return response()->json(['error' => 'Invalid data format.'], 400);
                }
            
        }
    
    
 
//التقرير

public function report(){


    $Workers = Workers::get();


return view("garment_maker/index",compact("Workers"));

}


public function search_report(request $request){


    $credits = Credit::where("name",$request->name)->get();
    $total = Credit::where("name",$request->name)->sum("total");
    $Withdrawals = Withdrawals::where("name",$request->name)->get();
    $total_withdraws = Withdrawals::where("name",$request->name)->sum("much");
    $Workers = Workers::where("name",$request->name)->get()->first();
    $sum= Credit::sum(column: "much");
    return view("garment_maker/results",compact("credits","Withdrawals","Workers","total","total_withdraws","sum"));

}


public function edit_with_worker($id){
    $edit = Withdrawals::find($id);
    return view("garment_maker/edit_with_worker",compact("edit"));
    }


    public function doedit_with_worker(request $request,$id){


$Add_Withdraw = Withdrawals::find($id);

        $Add_Withdraw->name = $request->name;
        $Add_Withdraw->much = $request->amont;
        $Add_Withdraw->comments = $request->comments;

        $Add_Withdraw->save();

        return redirect()->route("report");
        
        }
        public function delete_with_worker($id){

            $delete=Withdrawals::where("id",$id)->delete();
            
            return redirect()->route("report");
            
            }      


            public function edit_add_worker($id){
                $edit = Credit::find($id);
                return view("garment_maker/edit_worker_addetion",compact("edit"));
                }
            
            
                public function doedit_add_worker(request $request,$id){
            
            
            $w = Credit::find($id);
            
            $w->name = $request->name;
            $w->much = $request->much;
            $w->price = $request->price;
           
            $w->type = $request->type;
            $w->ditails = $request->ditails;
            $w->comments = $request->comments;
            $w->total = $request->much * $request->price;
            $w->save();
 
                    return redirect()->route("report");
                    
                    }
                    public function delete_add_worker($id){
            
                        $delete=Credit::where("id",$id)->delete();
                        
                        return redirect()->route("report");
                        
                        }      

}


