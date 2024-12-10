<?php

namespace App\Http\Controllers\Laundries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Laundries\The_Laundries_Model;


class Launderers extends Controller
{


    public function Index(){

        return view("Laundries/Laundries_Index");
        }

    public function Add_New_Laundere(){


        return view("Laundries/New_Launderer");
        
        
        }



public function Insert_New_Launderer(request $request){

$Insert_Launderer = new The_Laundries_Model();

$Insert_Launderer->name = $request->name;
$Insert_Launderer->contact = $request->contact;
$Insert_Launderer->location = $request->location;
$Insert_Launderer->save();

return redirect()->back();

}


public function Check_On(){

    $Launderers = The_Laundries_Model::all();
    
    
    return view("Laundries/Check_Launderer",compact("Launderers"));
    
    
    }
    
    public function Launderer_Account_Statment($id){

    $The_Launderer = The_Laundries_Model::where("id",$id)->first();

    $Laundries_Invoices = $The_Launderer->Invoices()->get();
    
    $Total_Cash = $The_Launderer->Invoices()->sum("total");
    
    $Launderer_Withdrawls = $The_Launderer->Installments()->sum("price");
    $Launderer_Installments = $The_Launderer->Installments()->get();
    
    $Net_Cash = $Total_Cash - $Launderer_Withdrawls;
 

    return view("Laundries/Launderer_Account_Statment",compact(
        
        "Laundries_Invoices",
        "Total_Cash",
        "Launderer_Withdrawls",
        "Launderer_Installments",
        "Net_Cash",
        "The_Launderer",

    ));
    
    
    }
}
