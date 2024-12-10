<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clints\The_Clints;
use App\Http\Controllers\Clints\Sales_Return;
use App\Http\Controllers\Clints\Sales_Invoice;
use App\Http\Controllers\Clints\Salse_Installment;



Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Sales_Invoice::class)->group(function(){


    Route::get("sales/index","Index")->name("sellindex");
    Route::get("salse/new_invoice","New_salse_Invoice")->name("addsell")->middleware("task_bar");
    Route::get("sales/view_all_invoices","View_All_Sales_Invoices")->name("sell/showrecite");
    Route::get("sales/edit_invoice/{id}","Edit_Sales_Invoice")->name('editsell')->middleware("if_admin");
    Route::get("sales/delete_invoice/{id}","Delete_sales_Invoice")->name('deleteseller')->middleware("if_admin");
    Route::get("sales/review","Sales_Review")->name("sales.invoice.review");
    Route::get("sales/summer_invoice","Summer_Invoice");

         Route::post("get_invoice_to_review","Get_Review_Invoice")->name("get.invoice.to.review");
         Route::post("sales/insert_invoice","Insert_Sales_Invoice")->name("insertsellrecite");
         Route::post("sales/up_invoice/{id}","Update_Sales_Invoice")->name("doeditsell");
         Route::post("clints/insert_summer_invoice","Insert_Summer_Invoice");
    
    });

    

Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(The_Clints::class)->group(function(){

    Route::get("clints/index","Index")->name("buyerindex");
    Route::get("clints/new_clint","Add_New_Clint")->name("addbuyer")->middleware("if_admin");
    Route::get("clints/view_clints","View_All_Clints")->name("buyers");

  Route::get("clints/view/{id}","Check_On_Clint")->name("cheak");


       Route::post("clints/find_clint_by_searc","Find_Clint_By_Searc")->name("searchcheak");
         Route::post("clints/insert_clint","Insert_New_Clint")->name("insertbuyer");

         Route::get("clints/simply_account_statment","Cheack_On_For_Simply_Account_Statment")
         ->name("Cheack_On_For_Simply_Account_Statment");

         Route::get("clints/simply_account/{id}","Simply_Account_Statment")
         ->name("Simply_Account_Statment");

         Route::get("clints/depts","All_Depts")->name("clint.depts");

    });


Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Salse_Installment::class)->group(function(){

        Route::get("sales/installment/new_installment","Add_New_Installment")->name("showde");
        Route::get("sales/installment/edit_installment/{id}","Edit_Sales_Installment")->name('editbuyer')->middleware("if_admin");
        Route::get("sales/installment/view_installment","view_All_installment")->name("showdeposit");


            Route::post("sales/installment/insert_istallment","Insert_New_Istallment")->name("insertde");
            Route::post("sales/installment/update_installment_info/{id}","Update_Installment_info")->name("doeditbuyswith");
            Route::get("sales/installment/delete_installment/{id}","Delete_Sales_Installment")->name('deletebuyerde')->middleware("if_admin");


    });
    

    Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Sales_Return::class)->group(function(){

Route::Get("salse/return/add_return_stuck",'Add_New_Return_Stuck')
    ->name("addsalsereturn");

Route::post("salse/return/insert_return_stuck",'Insert_sales_return')
    ->name("insert_sales_return");

    Route::get("sales/return/edit/{id}","Edit_Sales_Return")->name("Edit_Salse_Return")->middleware("if_admin");
    Route::get("salse/return/delete/{id}","Delete_Sales_Return")->name("Delete_Sales_Return");
    Route::post("sales/return/update/{id}","Update_Sales_Return")->name("Update_Sales_Return")->middleware("if_admin");
    
    });