<?php

namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\Finance\Vodafon_Cash_Deposits;
use App\Models\Finance\Vodafone_Cash_Withdrals;

use App\Models\Suppliers\Suppliers_Installments;
use App\Models\Clints\Sales_Installment_Model;


class Vodafone_Cash extends Controller
{
    
    public $Type;

    public function Index(){

        $All_Cash = Vodafon_Cash_Deposits::sum("amont");
        $All_Withdrawls = Vodafone_Cash_Withdrals::sum("amont");

        $Salse_Deposits = Sales_Installment_Model::where("payment_way","فودافون_كاش")->sum("amont"); 
        $Salse_Installments = Sales_Installment_Model::where("payment_way","فودافون_كاش")->sum("amont");
        
        $Purchases_Installments = Suppliers_Installments::where("payment_way","فودافون_كاش")->get()->all();
        $Purchases_Withdrawls = Suppliers_Installments::where("payment_way","فودافون_كاش")->sum("amont");

        $Total_Cash = $All_Cash + $Salse_Deposits;
        $Total_Withdrawls = $All_Withdrawls + $Purchases_Withdrawls;
        $Net_Cash =  $Total_Cash -  $Total_Withdrawls;

        return view("Vodafone_Cash/Vodafone_Cash_Index",compact(
            
            "Total_Cash",
            "Total_Withdrawls",      
            "Net_Cash",
            "Salse_Installments",
            "Purchases_Installments",
   
        ));

    }
    public function Increase_Cash(){

        return view("Vodafone_Cash/Increase_Vodafone_Cash");
        
        
        }


        public function Insert_Cash(request $request){

            $Increase_Cash = new Vodafon_Cash_Deposits();
            
            $Increase_Cash->name = $request->name;
            $Increase_Cash->amont = $request->price;
            $Increase_Cash->date = $request->date;
            $Increase_Cash->number = $request->number;

            $this->Role_Assigner($Increase_Cash);
            $Increase_Cash->save();

            $this->Type = "ايداع في الخزينه";
            $this->Notifications_Sender($Increase_Cash,$this->Type);

            return redirect()->back();
            
            }


        public function View_All_Deposits() {
    
            $Vodafon_Cash_Deposits = Vodafon_Cash_Deposits::all();
            
            return view("Vodafone_Cash/View_Deposits",compact("Vodafon_Cash_Deposits"));
            
            
            }

            public function Add_New_Withdraw(){

                return view("Vodafone_Cash/New_Withdraw");
                
                
                }


                public function Insert_New_Withdraw(request $request){

                    $New_Withdraw = new Vodafone_Cash_Withdrals();
                    
                    $New_Withdraw->amont = $request->amont;
                    $New_Withdraw->number = $request->number;
                    $New_Withdraw->name = $request->name;
                
                    $New_Withdraw->date = $request->date;
                    
                    $this->Role_Assigner($New_Withdraw);

                    $New_Withdraw->save();
                    

                    $this->Type = "ايداع في الخزينه";
                    $this->Notifications_Sender($New_Withdraw,$this->Type);

                    return redirect()->back();
                        
                    }

                       

                public function View_All_Withdrawls(){


                    $Withdrawls = Vodafone_Cash_Withdrals::all();
                
                    return view("Vodafone_Cash/View_Withdrawls",compact("Withdrawls"));
                    
                
                }
        


                public function Edit_Deposit_Vodafone($id){

                    $Edit_Deposit = Vodafon_Cash_Deposits::find($id);
                  
                    return view("Vodafone_Cash/Edit_Vodafone_Cash_Deposit",compact("Edit_Deposit"));
                
                    }
                

                    public function Update_Vodafone_Deposit(request $request,$id){

                        $Update_Deposit = Vodafon_Cash_Deposits::find($id);
                        
                        $Update_Deposit->name = $request->name;
                        $Update_Deposit->amont = $request->price;
                        $Update_Deposit->date = $request->date;
                        $Update_Deposit->number = $request->number;
                        $Update_Deposit->save();
                        return redirect()->back();
                        
                        
                        }

         public function Delete_Vodafone_Deposit($id){


$Delete_Deposit = Vodafon_Cash_Deposits::where("id",$id)->delete();

return redirect()->back();


}




public function Edit_Vodafone_Withdraw($id){

    $Edit_Vodafone_Cash_Withdraw = Vodafone_Cash_Withdrals::find($id);
  
    return view("Vodafone_Cash/Edit_Vodafone_Cash_Withdraw",compact("Edit_Vodafone_Cash_Withdraw"));

    }


    public function Update_Vodafone_Withdraw (request $request,$id){

        $Update_Vodafone_Cash_Withdraw = Vodafone_Cash_Withdrals::find($id);
        
        $Update_Vodafone_Cash_Withdraw->name = $request->name;
        $Update_Vodafone_Cash_Withdraw->amont = $request->price;
        $Update_Vodafone_Cash_Withdraw->date = $request->date;
        $Update_Vodafone_Cash_Withdraw->number = $request->number;
        $Update_Vodafone_Cash_Withdraw->save();
        return redirect()->back();
        
        
        }

public function  Delete_Vodafone_Withdraw($id){


$Delete_Vodafone_Cash_Withdraw = Vodafone_Cash_Withdrals::where("id",$id)->delete();

return redirect()->back();


}





}
