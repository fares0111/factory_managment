<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Laundries\Laundries_Invoice;
use App\Http\Controllers\Laundries\Launderers;
use App\Http\Controllers\Laundries\Laundries_Installments;

Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Laundries_Invoice::class)->group(function(){

    Route::get("laundries/new_invoice","Add_New_Laundries_Invoice")->name("addrecite");
    Route::post("laundries/insert_invoice","Insert_Laundries_Invoive")->name("insertrecite");
    
Route::get("laundries/edit_invoice/{id}","Edit_Laundries_Invoice")->name('editwasher')->middleware("if_admin");
Route::post("laundries/update_Invoice/{id}","Update_Laundries_Invoice")->name("doeditwasher");
Route::get("laundries/delete_invoice/{id}","Delete_Laundries_Invoice")->name('deletewasher')->middleware("if_admin");




});


Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Launderers::class)->group(function(){

    Route::get("launderers/check_on","Check_On")->name("search_launderers");
    Route::get("launderers/account_statment/{id}","Launderer_Account_Statment")->name("results");

Route::get("launderers/washes","Index")->name("washes");
Route::get("launderers/washes/new_laundere","Add_New_Laundere")->name("addwasher")->middleware("if_admin");
Route::post("launderers/insert_launderer","Insert_New_Launderer")->name("insertwasher");

});


Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Laundries_Installments::class)->group(function(){

    Route::get("launderers/installments/add_new","Add_New_Installment")->name("dowithdraw");
    Route::post("launderers/installments/insert","withrecite")->name("withrecite");
    Route::get("launderers/installments/view_all","View_All_Installments")->name("buys/showeith");


Route::get("launderers/installments/edit/{id}","Edit_Laundries_Installment")->name('editwasherwith')->middleware("if_admin");
Route::post("launderers/installments/update/{id}","Update_Laundries_Installment")->name("doeditwasherwith");
Route::get("launderers/installments/delete/{id}","Delete_Launderies_Installment")->name('deletewasherwith')->middleware("if_admin");
});