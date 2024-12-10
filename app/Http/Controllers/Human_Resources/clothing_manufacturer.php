<?php

namespace App\Http\Controllers\Human_Resources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Human_Resources\add_bro_worker;
use App\Models\Human_Resources\bro1;
use App\Models\Human_Resources\addbro;
use App\Traits\Notifications;
use App\Traits\Data_Entry;
class clothing_manufacturer extends Controller
{

    use Notifications;
    use Data_Entry;
    
public $Type;



public function add(){

    return view("clothing_manufacturer/add_clothing_manufacturer");
    
    
    
    }

Public Function insert_bro(request $request){

    $Add_Worker = new add_bro_worker();
    
    $Add_Worker->name = $request->name;
    $Add_Worker->Credi = $request->credit;
    $Add_Worker->save();
    return redirect()->route("add");
    
    }

//مسحوبات

public function worker_withdraw_form(){

    $Workers = add_bro_worker::get();
    return view('clothing_manufacturer\Installment',compact("Workers"));
    
    
    }




    
    public function insert_withdraw(request $request){


        $bro = new bro1();

        $bro->name = $request->name;
        $bro->much = $request->amont;
        $bro->date = $request->date;
        $bro->comments = $request->comments;

        $this->Role_Assigner($bro);
        $bro->save();


        $this->Type = "دفعة من التصنيع";
$this->Notifications_Sender($bro,$this->Type);

        
        return redirect()->route("worker_bro_withdraw_form");



    }
    

//انتاج مصنع



public function worker_bro_add_form(){

    $Workers = add_bro_worker::get();
    return view("clothing_manufacturer\add_addetion_form",compact("Workers"));

}


public function insert_bro_add(Request $request)
{
    $expenses = $request->input('expenses');

        // فك شفرة JSON القادمة من الطلب
        $expenses = $request->input('expenses');

        if (is_array($expenses)) {
            foreach ($expenses as $expenseData) {
                $w = new addbro();
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
            
$this->Type = "انتاج انتاج تصنيع";
$this->Notifications_Sender($w,$this->Type);

           }             

            return response()->json(['message' => 'Expenses saved successfully!'], 200);

        
       
    }  else {
            return response()->json(['error' => 'Invalid data format.'], 400);
        }
    
    
 
}





    //كشف حساب مصنع

   public function search_report_bro(){

        $Workers = add_bro_worker::get();
    
    return view("clothing_manufacturer/search",compact("Workers"));
    

    
   }

   public function insert_report_bro(request $request){


    $credits = addbro::where("name",$request->name)->get();
    $total = addbro::where("name",$request->name)->sum("total");
    $Withdrawals = bro1::where("name",$request->name)->get();
    $total_withdraws = bro1::where("name",$request->name)->sum("much");
    $Workers = add_bro_worker::where("name",$request->name)->get()->first();
    $sum= addbro::sum("much");
    
    return view("clothing_manufacturer/results",compact("credits","Withdrawals","Workers","total","total_withdraws","sum"));

}



public function edit_add_bro_worker($id){
    $edit = addbro::find($id);
    return view("clothing_manufacturer/edit_addetion",compact("edit"));
    }


    public function doedit_add_bro_worker(request $request,$id){


$w = addbro::find($id);

$w->name = $request->name;
$w->much = $request->much;
$w->price = $request->price;
$w->type = $request->type;
$w->ditails = $request->details;
$w->comments = $request->comments;
$w->opre = $request->oper;
$w->total = $request->much * $request->price;
$w->save();

        return redirect()->route("search_report_bro");
        
        }
        public function delete_add_bro_worker($id){

            $delete=addbro::where("id",$id)->delete();
            
            return redirect()->route("search_report_bro");
            
            }      


            
public function edit_with_bro_worker($id){
    $edit = bro1::find($id);
    return view("clothing_manufacturer/edit_installment",compact("edit"));
    }


    public function doedit_with_bro_worker(request $request,$id){


$Add_Withdraw = bro1::find($id);

        $Add_Withdraw->name = $request->name;
        $Add_Withdraw->much = $request->amont;
        $Add_Withdraw->comments = $request->comments;
        $Add_Withdraw->opre = $request->oper;
        $Add_Withdraw->save();

        return redirect()->route("search_report_bro");
        
        }
        public function delete_with_bro_worker($id){

            $delete=bro1::where("id",$id)->delete();
            
            return redirect()->route("search_report_bro");
            
            }      


}
