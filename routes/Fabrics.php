
<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Fabrics\Fabrics_Invoices;
use App\Http\Controllers\Fabrics\Fabrics_Installments;
use App\Http\Controllers\Fabrics\Fabrics_Manage;
use App\Http\Controllers\Fabrics\Fabrics_Suppliers;
use App\Http\Controllers\Fabrics\modelcontroller;




Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(modelcontroller::class)->group(function(){

    Route::get("modelindex","index")->name("modelindex");
    Route::get("addmodel","add")->name("addmodel")->middleware("if_admin");
    Route::get("models","models")->name("models");
    Route::get("showsellrecite","showsellrecite")->name("showsellrecite");
    Route::get("editmodel/{name}","editmodel")->name('editmodel')->middleware("if_admin");
    Route::get("deletemodel/{id}","deletemodel")->name('deletemodel')->middleware("if_admin"); 


        Route::post("insertmodel","insertmodel")->name("insertmodel");
        Route::post("doeditmodel/{id}","doeditmodel")->name("doeditmodel");
    
    });

Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Fabrics_Suppliers::class)->group(function(){

        Route::Get("fabrics/add_fabric_clint","Add_Fabric_Clint")
        ->name("add_fabric_clint")->middleware("if_admin");
 
        Route::Post("fabrics/insert_fabric_clint","Insert_Fabric_Clint")
        ->name("insert_fabric_clint");

        Route::Get("fabrics/accout_fabrics_clint_statment","Fabrics_Clint_Statment")
        ->name("accout_fabrics_clint_statment");

        Route::get("fabrics/results_of_fabrics_clint/{name}","Get_All_Fabrics_Clint")
        ->name("results_of_fabrics_clint");
        

    });

Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Fabrics_Installments::class)->group(function(){

    Route::get("fabrics/installment/add_fabrics_installment","Add_New_Fabrics_Installment")
    ->name("add_fabrics_installment");

    Route::Post("fabrics/installment/insert_Fabrics_Installment","Insert_Fabrics_Installment")
    ->name("insert_Fabrics_Installment");


});



Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Fabrics_Invoices::class)->group(function(){


    Route::Get("fabrics/installment/choosing_invoice_method","Choosing_Invoice_Method")
    ->name("choosing_method");
        
            Route::Get("fabrics/installment/new_fabrics_cash_recite","new_fabrics_cash_recite")
            ->name("new_fabrics_cash_recite");
            
            Route::Get("fabrics/installment/deferred_fabrics_recite",function(){
        
                return view("fabrics/Deferrd_Fabrics_Ricete");
            })->name("deferred_fabrics_recite");

            Route::get("fabrics/installment/search_fabrics_cash_recite","Search_Fabrics_Cash_Recite");


                Route::post("fabrics/installment/insert_fabrics_cash_ricete","Insert_Fabrics_Cash_Ricete")
                ->name("insert_fabrics_cash_ricete");

                Route::Post("fabrics/installment/insert_deferred_fabrics_recite","Insert_Deferres_Fabrics_Recite")
                ->name("insert_deferred_fabrics_recite");




        
route::get("fabrics/edit_cash_invoice/{id}","Edit_Cash_Invoice")
->name("Edit_Cash_Invoice")->middleware("if_admin");

route::post("fabrics/update_cash_invoices/{id}","Update_Cash_Invoice")
->name("Update_Cash_Invoice");

route::get("fabrics/edit_deferred_invoice/{id}","Edit_Deferred_Invoice")
->name("Edit_Deferred_Invoice")->middleware("if_admin");

route::post("fabrics/update_deferred_invoices/{id}","Update_Deferred_Invoices")
->name("Update_Deferred_Invoices");

route::get("fabrics/edit_payment/{id}","Edit_Payment")
->name("Edit_Payment")->middleware("if_admin");

route::post("fabrics/update_payment/{id}","Update_Payment")
->name("Update_Payment");

route::get("fabrics/delete_cash_invoice/{id}","Delete_Cash_Invoice")
->name("Delete_Cash_Invoice")->middleware("if_admin");

route::get("fabrics/delete_deferred_invoice/{id}","Delete_Deferred_Invoice")
->name("Delete_Deferred_Invoice")->middleware("if_admin");

route::get("fabrics/delete_payment/{id}","Delete_Payment")
->name("Delete_Payment")->middleware("if_admin");

});

Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Fabrics_Manage::class)->group(function(){

    Route::Get("fabrics/Add_New_Fabrics",'Form_Add_New_Fabrics')
    ->name("Add_New_Fabrics");

    Route::Post("fabrics/inser_fabrics",'Insert_Fabrics')
    ->name("Insert_Fabrics");

    Route::get("fabrics/Show_All_Fabrics",'Get_All_Fabrics')
    ->name("Show_All_Fabrics");


});