<?php

namespace App\Http\Controllers\Clints;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Clints\The_Clints_Model;
use Illuminate\Support\Facades\DB;

class The_Clints extends Controller
{

public function Index(){


return view("Clints/Clints_Index");

}

public function Add_New_Clint(){


return view("Clints/Add_Clint");

}

public function Insert_New_Clint(request $request){

$New_Clint = new The_Clints_Model();

$New_Clint->name = $request->name;
$New_Clint->address = $request->address;
$New_Clint->mony = $request->mony;
$New_Clint->save();

return redirect()->back();


}


public function View_All_Clints(){

$Clints = The_Clints_Model::all();

return view("Clints/Search_Clints",compact("Clints"));

}

public function Check_On_Clint ($id){


 $Clints = The_Clints_Model::where("id",$id)->get()->first();
 
$Invoices =  $Clints->Invoices()
->orderBy("date","desc")
->get()
->all();


$Total_Cash = $Clints->Invoices()->sum("total");
$Total_Quante = $Clints->Invoices()->sum("much");


$Totl_Installment = $Clints->Installments()->sum("amont");
$The_Installments = $Clints->Installments()
->orderBy("date","desc")
->get();

$Sales_Returns = $Clints->Returns()
->orderBy("date","desc")
->get();

$Total_Sales_Returns = $Clints->Returns()->sum('total');
$Total_Sales_Returns_Quntem = $Clints->Returns()->sum('much');

$Net_Quntem = $Total_Quante - $Total_Sales_Returns_Quntem;
$Net_Cash = $Clints->mony + $Total_Cash - $Totl_Installment - $Total_Sales_Returns; 

$phone_number = $Clints->phone_number;
return view("Clints/Account_Statment",compact(
    
    "Total_Sales_Returns_Quntem",
    "Clints",
    "Invoices",
    "Total_Cash",
    "Totl_Installment",
    'Sales_Returns',
    'Total_Sales_Returns',
    'The_Installments',
    "Total_Quante",
    "Net_Cash",
    'phone_number',
    'Net_Quntem',
));


}



   public function Cheack_On_For_Simply_Account_Statment(){

    $Clints = The_Clints_Model::all();
    
    return view("Clints/Find_Clint_For_Account_Statment",compact("Clints"));
    
    }

    public function Simply_Account_Statment ($id){


        $Clints = The_Clints_Model::where("id",$id)->get()->first();


        $Invoices = $Clints->Invoices()
        ->selectRaw('DATE(date) as date, SUM(total) as total, SUM(much) as much')
        ->groupBy(DB::raw('DATE(date)'))
        ->orderBy('date', 'desc')
        ->get();

       $Total_Cash = $Clints->Invoices()->sum("total");
       $Total_Quante = $Clints->Invoices()->sum("much");


       $Totl_Installment = $Clints->Installments()->sum("amont");
       $The_Installments = $Clints->Installments()
       ->selectRaw('DATE(date) as date, SUM(amont) as amont')
       ->groupBy(DB::raw('DATE(date)'))
       ->orderBy('date', 'desc')
       ->get();       

       $Sales_Returns = $Clints->Returns()
       ->orderBy("date","desc")
       ->get();

       $Total_Sales_Returns = $Clints->Returns()->sum('total');
       $Total_Sales_Returns_Quntem = $Clints->Returns()->sum('much');
       
       $Net_Quntem = $Total_Quante - $Total_Sales_Returns_Quntem;
       $Net_Cash = $Clints->mony + $Total_Cash - $Totl_Installment - $Total_Sales_Returns; 
       return view("Clints/Simply_Account_Statment",compact(
           
           "Total_Sales_Returns_Quntem",
           "Clints",
           "Invoices",
           "Total_Cash",
           "Totl_Installment",
           'Sales_Returns',
           'Total_Sales_Returns',
           'The_Installments',
           "Total_Quante",
           "Net_Cash",
           'Net_Quntem',
       ));
       
       
       }


       public function All_Depts() {
        $Clints = The_Clints_Model::all();
    
        $ClintData = [];
    
        foreach ($Clints as $Clint) {
            $totalInvoices = $Clint->Invoices()->sum('total');
            $totalInstallments = $Clint->Installments()->sum('amont');
            $totalReturns = $Clint->Returns()->sum('total');
    
            $Net = $totalInvoices  +$Clint->mony - $totalInstallments - $totalReturns;


            $ClintData[] = [
                'Clint' => $Clint,
                'Net'=>  $Net,

            ];
        }
    
        return view("Clints.All_Depts", compact('ClintData'));
    }
    

}
