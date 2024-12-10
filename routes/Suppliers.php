<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\suppliers\The_Suppliers;
use App\Http\Controllers\suppliers\Purchases_Return;
use App\Http\Controllers\suppliers\Purchases_Invoice;
use App\Http\Controllers\suppliers\Purchases_Installment;






Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Purchases_Invoice::class)->group(function(){
//Route::get("/","Index")->name("my_index")->withoutMiddleware(["auth:admin,web","task_bar"]);


Route::get("purchases/add_new_invoice","Add_New_Purchases_Invoice")->name("form");

Route::post("purchases/insert_invoice","Insert_Purchases_Invoice")->name("buyinsert");

//Route::get("purchases/get_and_view_invoices","Get_And_View_Purchases_Invoices");

Route::get("purchases/edit_ivoice/{id}","Edit_Purchaes_Ivoice")->name('editbuy')->middleware("if_admin");
Route::post("purchases/update_invoice/{id}","Update_Purchases_Invoice")->name("doeditbuy");
Route::get("purchases/delete_invoice/{id}","Delete_Purchases_Invoices")->name('deletebuys')->middleware("if_admin");



});

//المخزن
Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(The_Suppliers::class)->group(function(){

    Route::get("suppliers/index","Index")->name("sellerindex");
    Route::get("suppliers/add_new","Add_New_Suppliers")->name("addseller")->middleware("if_admin");
    Route::post("suppliers/insert","Insert_New_Suppliers")->name("insertseller");

    Route::get("suppliers/check_on","Check_On_Supplier")->name("sellers");
    Route::get("suppliers/account_statment/{name}","Supplier_Account_Statment")->name("cheakseller");
    



});


Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Purchases_Installment::class)->group(function(){

    Route::get("purchases_installment/add_new","Add_New_Installment")->name("showdeseller");
    Route::get("purchases_installment/edit/{id}","Edit_Installment")->name('editsellerde')->middleware("if_admin");
    Route::get("purchases_installment/update/{id}","Update_Installment")->name('deletesellerde')->middleware("if_admin");
    Route::get("purchases_installment/view_all","View_All_Deposits")->name("showdepositseller");
    Route::get("purchases_installment/delete/{id}","Delete_Purchases_Installment")->name("Delete_Purchases_Installment");

        Route::post("purchases_installment/insert","Insert_New_Installment")->name("insertdeseller");
    Route::post("purchases_installment/doeditsellwith/{id}","Update_Installment")->name("doeditsellwith");
 

});


Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Purchases_Return::class)->group(function(){


Route::Get("/addpurcasesreturn",[Purchases_Return::class,'Add_Form'])
->name("addpurchasesreturn");

Route::post("insert_purhases_return",[Purchases_Return::class,'Insert_Purchases_Return'])
->name("Insert_Purcases_return");


Route::get("purchases/return/edit/{id}","Edit_Purchases_Return")->name("Edit_Purchases_Return")->middleware("if_admin");
Route::get("purchases/return/delete/{id}","Delete_Purchases_Return")->name("Delete_Purchases_Return");
Route::post("purchases/return/update/{id}","Update_Purchases_Return")->name("Update_Purchases_Return")->middleware("if_admin");


});


