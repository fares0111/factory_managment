<?php

namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliers\Suppliers_Installments;
use App\Models\Suppliers\Purchases_Invoices;
use App\Models\Finance\Cash_Register_Withdrals;
use App\Models\Finance\Increase_Cash_Register;
use App\Models\Clints\Sales_Invoices_Model;
use App\Models\Clints\Sales_Installment_Model;

use App\Traits\Notifications;
use App\Traits\Data_Entry;
class CashRegister extends Controller
{
    use Notifications;
    use Data_Entry;
    public $Type;
    public function Index(){

        $Total_Cash = Increase_Cash_Register::sum("price");
        $Total_Withdrawals = Cash_Register_Withdrals::sum("amont");

        $Total_Salse_Deposits = Sales_Installment_Model::where("payment_way","كاش")->sum("amont"); 
        $Salse_Invoices = Sales_Invoices_Model::where("payment_way","كاش")->get()->all();

        $Total_Purchases_Withdrawals = Suppliers_Installments::where("payment_way","كاش")->sum("amont");
        $Purchases_Invoices = Purchases_Invoices::where("payment_way","كاش")->get()->all();

        $Net_Cash = $Total_Cash + $Total_Salse_Deposits;

        $Net_Withdrawls = $Total_Withdrawals + $Total_Purchases_Withdrawals;

        $Final_Calucat = $Net_Cash - $Net_Withdrawls;

        return view("CashRegister/Index_CashRegister",compact(
            
            "Total_Cash",
            "Total_Withdrawals",
            "Salse_Invoices",
            "Total_Salse_Deposits",
            "Total_Purchases_Withdrawals",
            "Purchases_Invoices",
            "Net_Cash",
            "Net_Withdrawls",
            "Final_Calucat",

    ));



    }


    public function Increse_CashRegister(){

        return view("CashRegister/Increase_CashRegister");
        
        
        }

        public function Insert_CashRegister(request $request){

            $balance = new Increase_Cash_Register();
            
            $balance->name = $request->name;
            $balance->price = $request->price;
            $balance->date = $request->date;

            $this->Role_Assigner($balance);
            $balance->save();


            $this->Type = "ايداع في الخزينه";
            $this->Notifications_Sender($balance, $this->Type);


            return redirect()->route("index");
            
            }

            public function Add_Wew_withdraw(){

                return view("CashRegister/CashRegister_Withdrawals");
                
                
                }
                            

                public function Insert_Withdraw(request $request){

                    $with = new Cash_Register_Withdrals();
                    
                    $with->amont = $request->amont;
                    
                    $with->reason = $request->reason;
                    
                    $with->date = $request->date;

                    $this->Role_Assigner($with);


                    $with->save();
                    
            $this->Type = "سحب من الخزينه";
            $this->Notifications_Sender($with,$this->Type);

                    return redirect()->route("balance");
                    
                        
                    }


                    public function View_All_Deposits() {
    
                        $Increases_CashRegister = Increase_Cash_Register::all();
                        
                        return view("CashRegister/View_Deposits",compact("Increases_CashRegister"));
                        
                        
                        }

                        public function View_All_Withdrawls(){


                            $CashRegister_withdrawls = Cash_Register_Withdrals::all();
                        
                            return view("CashRegister/View_Withdrawls",compact("CashRegister_withdrawls"));
                            
                        
                        }
                

                        public function Edit_CashRegister_Deposit($id){

                        $Edit_CashRegister_Deposits = Increase_Cash_Register::find($id);

                        return view("CashRegister/Edit_Deposits",compact("Edit_CashRegister_Deposits"));

                        }

public function Update_Deposit(request $request,$id){

$Update_CashRegister_Increases = Increase_Cash_Register::find($id,"id");

$Update_CashRegister_Increases->name = $request->name;
$Update_CashRegister_Increases->price = $request->price;
$Update_CashRegister_Increases->date = $request->date;

$Update_CashRegister_Increases->save();

return redirect()->route("index");

 }


public function Delete_Deposit($id){


$Delete_Increase = Increase_Cash_Register::where("id",$id)->delete();

return redirect()->route("index");

}

 
public function Edit_CashRegister_Withdraw($id){

    $Edit_CashRegister_Withdrals = Cash_Register_Withdrals::find($id);

    return view("CashRegister/Edit_CashRegister_Withdrawals",compact("Edit_CashRegister_Withdrals"));

    }

public function Update_CashRegister_Withdraw(request $request,$id){

$Update_CashRegister_Withdraw = Cash_Register_Withdrals::find($id);

$Update_CashRegister_Withdraw->amont = $request->amont;
$Update_CashRegister_Withdraw->reason = $request->reason;
$Update_CashRegister_Withdraw->date = $request->date;

$Update_CashRegister_Withdraw->save();

return redirect()->route("index");

}


public function Delete_CashRegister_Withdraw($id){


$Delete_Withdraw = Cash_Register_Withdrals::where("id",$id)->delete();

return redirect()->route("index");

}

}
