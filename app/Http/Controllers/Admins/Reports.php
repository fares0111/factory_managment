<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Fabrics\Fabrics_Installments;
use Illuminate\Http\Request;
use App\Models\User;


use App\Traits\All_Reports;

class Reports extends Controller
{

use All_Reports;

public function View_User_Report_Page(){

$Users = User::all();


return view("admin.User_Report",compact("Users"));

}


public function  Comprehensive_Query(){


  return view("admin.Comprehensive_Report");
  
  }

  

public function Get_User_Report(request $request){


return $this->User_Report($request);



}



public function Comprehensive_Report(request $request){

  return $this->Get_Comprehensive_Report($request);


}

}
