<?php

namespace App\Traits;


use App\Models\User;
use Carbon\Carbon;
use  App\Models\Clints\Sales_Invoices_Model;
use App\Models\Clints\Sales_Installment_Model;
use App\Models\Clints\Sales_Return_Model;

use  App\Models\Suppliers\Purchases_Invoices;
use App\Models\Suppliers\Suppliers_Installments;
use App\Models\Suppliers\Purchases_returns_Model;

use  App\Models\Laundries\Laundries_Installments_Model;
use  App\Models\Laundries\Laundries_Invoices_Model;

use App\Models\Fabrics\Cash_Fabric_Ricete;
use App\Models\Fabrics\Deferred_Fabrics_Invoices;
use  App\Models\Fabrics\Installment_Fabric_Clint;
use App\Models\Finance\Vodafon_Cash_Deposits;

use App\Models\Admin;
trait All_Reports
{

public function User_Report($request){




    $date = $request->date;
    $User = User::find($request->user_id);
    
    // تحويل التاريخ إلى صيغة Y-m-d
    $dateOnly = Carbon::parse($date)->format('Y-m-d');
    

    // المبيعات
        $User_Sales_Report = Sales_Invoices_Model::
          where("opreator", $User->name)
        ->where("is_admin","=","عضو")
        ->whereDate("date", '=', $dateOnly)
        ->get();

        $User_Sales_Installments_Report = Sales_Installment_Model::
        where("opreator", $User->name)
        ->where("is_admin","=","عضو")
        ->whereDate("date", '=', $dateOnly)
        ->get();

        $User_Sales_Returns_Report = Sales_Return_Model::
        where("opreator", $User->name)
        ->where("is_admin","=","عضو")
        ->whereDate("date", '=', $dateOnly)
        ->get();

        // الشراء
        $User_Puraches_Report = Purchases_Invoices::
        where("opreator", $User->name)
        ->where("is_admin","=","عضو")
        ->whereDate("date", '=', $dateOnly)
        ->get();


        $User_Purchases_Installments_Report = Suppliers_Installments::
          where("opreator", $User->name)
        ->where("is_admin","=","عضو")
        ->whereDate("date", '=', $dateOnly)
        ->get();
        
        $User_Purchases_Returns_Report = Purchases_returns_Model::
        where("opreator", $User->name)
        ->where("is_admin","=","عضو")
        ->whereDate("date", '=', $dateOnly)
        ->get();
        //المغسلة

      $Laundries_Installments = Laundries_Installments_Model::
      where("opreator", $User->name)
      ->where("is_admin","=","عضو")
      ->whereDate("date", '=', $dateOnly)
      ->get();

      $Laundrise_Invoices = Laundries_Invoices_Model::
          where("opreator", $User->name)
        ->where("is_admin","=","عضو")
        ->whereDate("date", '=', $dateOnly)
        ->get();

      //القماش 

      $Cash_Fabric_Ricete = Cash_Fabric_Ricete::
      where("opreator", $User->name)
      ->where("is_admin","=","عضو")
      ->whereDate("date", '=', $dateOnly)
      ->get();
    
    $Deferred_Fabrics_Invoices = Deferred_Fabrics_Invoices::
    where("opreator", $User->name)
    ->where("is_admin","=","عضو")
    ->whereDate("date", '=', $dateOnly)
    ->get();


    $Installment_Fabric_Clint = Installment_Fabric_Clint::
    where("opreator", $User->name)
    ->where("is_admin","=","عضو")
    ->whereDate("date", '=', $dateOnly)
    ->get();

  $Users = User::all();


  return view("admin.User_Report",compact(

    'User_Sales_Report',
    'User_Sales_Installments_Report',
    'User_Sales_Returns_Report',
    'User_Puraches_Report',
    'User_Purchases_Installments_Report',
    'User_Purchases_Returns_Report',
    'Laundries_Installments',
    'Laundrise_Invoices',
    'Cash_Fabric_Ricete',
    'Deferred_Fabrics_Invoices',
    'Installment_Fabric_Clint',
    'Users',
    
    
    ));



}

public function Get_Comprehensive_Report($request){



  $date = $request->date;
    
  // تحويل التاريخ إلى صيغة Y-m-d
  $dateOnly = Carbon::parse($date)->format('Y-m-d');
  
  // المبيعات
      $User_Sales_Report = Sales_Invoices_Model::
     whereDate("date", '=', $dateOnly)->get();

      $User_Sales_Installments_Report = Sales_Installment_Model::
      whereDate("date", '=', $dateOnly)
      ->get();

      $User_Sales_Returns_Report = Sales_Return_Model::
       whereDate("date", '=', $dateOnly)
      ->get();


      // الشراء
      $User_Puraches_Report = Purchases_Invoices::
        whereDate("date", '=', $dateOnly)
      ->get();

      $User_Purchases_Installments_Report = Suppliers_Installments::
        whereDate("date", '=', $dateOnly)
      ->get();
      
      $User_Purchases_Returns_Report = Purchases_returns_Model::
        whereDate("date", '=', $dateOnly)
      ->get();

      //المغسلة

    $Laundries_Installments = Laundries_Installments_Model::
      whereDate("date", '=', $dateOnly)
    ->get();
    
    $Laundrise_Invoices = Laundries_Invoices_Model::
      whereDate("date", '=', $dateOnly)
    ->get();

    //القماش 

    $Cash_Fabric_Ricete = Cash_Fabric_Ricete::
    whereDate("date", '=', $dateOnly)
  ->get();
  
  $Deferred_Fabrics_Invoices = Deferred_Fabrics_Invoices::
    whereDate("date", '=', $dateOnly)
  ->get();


  $Installment_Fabric_Clint = Installment_Fabric_Clint::
  whereDate("date", '=', $dateOnly)
->get();

  return view("admin.Comprehensive_Report",compact(

      'User_Sales_Report',
      'User_Sales_Installments_Report',
      'User_Sales_Returns_Report',
      'User_Puraches_Report',
      'User_Purchases_Installments_Report',
      'User_Purchases_Returns_Report',
      'Laundries_Installments',
      'Laundrise_Invoices',
      'Cash_Fabric_Ricete',
      'Deferred_Fabrics_Invoices',
      'Installment_Fabric_Clint',


      
      ));
}

public function Admin_Report($request){

    $date = $request->date;
    $Admin = Admin::find($request->admin_id);
    
    // تحويل التاريخ إلى صيغة Y-m-d
    $dateOnly = Carbon::parse($date)->format('Y-m-d');
    

    // المبيعات
        $Admin_Sales_Report = Sales_Invoices_Model::
          where("opreator", $Admin->name)
        ->where("is_admin","=","مسؤول")
        ->whereDate("date", '=', $dateOnly)
        ->get();

        $Admin_Sales_Installments_Report = Sales_Installment_Model::
        where("opreator", $Admin->name)
        ->where("is_admin","=","مسؤول")
        ->whereDate("date", '=', $dateOnly)
        ->get();

        $Admin_Sales_Returns_Report = Sales_Return_Model::
        where("opreator", $Admin->name)
        ->where("is_admin","=","مسؤول")
        ->whereDate("date", '=', $dateOnly)
        ->get();

        // الشراء
        $Admin_Puraches_Report = Purchases_Invoices::
        where("opreator", $Admin->name)
        ->where("is_admin","=","مسؤول")
        ->whereDate("date", '=', $dateOnly)
        ->get();


        $Admin_Purchases_Installments_Report = Suppliers_Installments::
          where("opreator", $Admin->name)
        ->where("is_admin","=","مسؤول")
        ->whereDate("date", '=', $dateOnly)
        ->get();
        
        $Admin_Purchases_Returns_Report = Purchases_returns_Model::
        where("opreator", $Admin->name)
        ->where("is_admin","=","مسؤول")
        ->whereDate("date", '=', $dateOnly)
        ->get();
        //المغسلة

      $Laundries_Installments = Laundries_Installments_Model::
      where("opreator", $Admin->name)
      ->where("is_admin","=","مسؤول")
      ->whereDate("date", '=', $dateOnly)
      ->get();

      $Laundrise_Invoices = Laundries_Invoices_Model::
          where("opreator", $Admin->name)
        ->where("is_admin","=","مسؤول")
        ->whereDate("date", '=', $dateOnly)
        ->get();

      //القماش 

      $Cash_Fabric_Ricete = Cash_Fabric_Ricete::
      where("opreator", $Admin->name)
      ->where("is_admin","=","مسؤول")
      ->whereDate("date", '=', $dateOnly)
      ->get();
    
    $Deferred_Fabrics_Invoices = Deferred_Fabrics_Invoices::
    where("opreator", $Admin->name)
    ->where("is_admin","=","مسؤول")
    ->whereDate("date", '=', $dateOnly)
    ->get();


    $Installment_Fabric_Clint = Installment_Fabric_Clint::
    where("opreator", $Admin->name)
    ->where("is_admin","=","مسؤول")
    ->whereDate("date", '=', $dateOnly)
    ->get();

  $Admins = Admin::all();


  return view("super_admin.Admin_Report",compact(

    'Admin_Sales_Report',
    'Admin_Sales_Installments_Report',
    'Admin_Sales_Returns_Report',
    'Admin_Puraches_Report',
    'Admin_Purchases_Installments_Report',
    'Admin_Purchases_Returns_Report',
    'Laundries_Installments',
    'Laundrise_Invoices',
    'Cash_Fabric_Ricete',
    'Deferred_Fabrics_Invoices',
    'Installment_Fabric_Clint',
    'Admins',
    
    
    ));


}

}


