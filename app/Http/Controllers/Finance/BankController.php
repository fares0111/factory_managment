<?php

namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finance\Bank_Increase;
use App\Models\Finance\Bank_Withdrals;
use App\Models\Clints\Sales_Invoices_Model;
use App\Models\Clints\Sales_Installment_Model;
use App\Models\Suppliers\Suppliers_Installments;

use App\Traits\Notifications;
use App\Traits\Data_Entry;

class BankController extends Controller
{
    use Notifications;
    use Data_Entry;
public $Type;


    public function Index(){


        $All_Cash = Bank_Increase::sum("price");
        $All_Withdrawls = Bank_Withdrals::sum("amont");

        $Sales_Installment = Sales_Installment_Model::where("payment_way","بنك")->get();
        $Total_Sales_Installment_Cash = Sales_Installment_Model::where("payment_way","بنك")->sum("amont");

        $Purchases_Installments = Suppliers_Installments::where("payment_way","بنك")->get()->all();
        $Total_Purchases_Installments_Cash = Suppliers_Installments::where("payment_way","بنك")->sum("amont");

        $Total_Deposits =  $All_Cash + $Total_Sales_Installment_Cash;
        $Total_Witdrawlas =  $All_Withdrawls + $Total_Purchases_Installments_Cash;
        $Net_Cash = $Total_Deposits - $Total_Witdrawlas;


        return view("Bank/Bank_Index",compact(
            

            "Sales_Installment",
            "Purchases_Installments",
            "Total_Deposits",
            "Total_Witdrawlas",
            "Net_Cash",


        ));

    }
public function Add_New_Check(){

return view("Bank/New_BankCheck");


}

public function Insert_New_Cheak(request $request){

$Increase_Cheak = new Bank_Increase();

$Increase_Cheak->name = $request->name;
$Increase_Cheak->price = $request->price;
$Increase_Cheak->date = $request->date;
$Increase_Cheak->number = $request->number;


$this->Role_Assigner($Increase_Cheak);
$Increase_Cheak->save();


$this->Type = " ايداع في البنك";
$this->Notifications_Sender($Increase_Cheak,$this->Type);

}

public function Add_New_Withdraw(){

return view("Bank/New_Withdrawls");


}

public function insert_New_Withdraw(request $request){

$New_Withdraw = new Bank_Withdrals();

$New_Withdraw->amont = $request->amont;

$New_Withdraw->reason = $request->reason;

$New_Withdraw->date = $request->date;


$this->Role_Assigner($New_Withdraw);

$New_Withdraw->save();

$this->Type = "سحب من البنك";
$this->Notifications_Sender($New_Withdraw,$this->Type);

return redirect()->route("bank/index");

    
}

public function View_All_Chechs() {
    
$Checks = Bank_Increase::all();

return view("Bank/View_Checks",compact("Checks"));


}

public function View_All_Withdrawls(){


    $Withdrawls = Bank_Withdrals::all();

    return view("Bank/View_Withdrawls",compact("Withdrawls"));
    

}


 
public function Edit_bank_Deposit($id){

    $Edit_Check = Bank_Increase::find($id);

    return view("Bank/Edit_BankCheck",compact("Edit_Check"));

    }

    public function Update_Deposit(request $request,$id){

$Edit_Cheak = Bank_Increase::find($id);
        
      
$Edit_Cheak->name = $request->name;
$Edit_Cheak->price = $request->price;
$Edit_Cheak->date = $request->date;
$Edit_Cheak->number = $request->number;

        $Edit_Cheak->save();
        
        return redirect()->route("index");
        
        }



        public function Delete_Bank_Deposit($id){


            $Delete = Bank_Increase::where("id",$id)->delete();
            
            return redirect()->route("index");
            
            }

            public function Edit_Bank_Withdraw($id){

                $Edit_Bank_Withdraw = Bank_Withdrals::find($id);
            
                return view("Bank/Edit_Bank_Withdraw",compact("Edit_Bank_Withdraw"));
            
                }
            
                public function Update_Bank_Withdraw(request $request,$id){
            
            $Edit_With = Bank_Withdrals::find($id);
                    
                  
            $Edit_With->amont = $request->amont;

            $Edit_With->reason = $request->reason;
            
            $Edit_With->date = $request->date;
                    $Edit_With->save();
                    
                    return redirect()->route("index");
                    
                    }
            
            
            
                    public function deletebankwith($id){
            
            
                        $Delete = Bank_Withdrals::where("id",$id)->delete();
                        
                        return redirect()->route("index");
                        
                        }
            



}
