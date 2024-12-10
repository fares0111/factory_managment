<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Finance\CashRegister;
use App\Http\Controllers\Finance\BankController;
use App\Http\Controllers\Finance\Vodafone_Cash;



Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(BankController::class)->group(function(){

    Route::get("bank/index","Index")->name("bank/index");
    Route::get("bank/new_check","Add_New_Check")->name("addcheak");
    Route::post("bank/insert_check","Insert_New_Cheak")->name("insertcheak");
    Route::get("bank/view_all","View_All_Chechs")->name("cheaks");
    Route::get("bank/add_new_withdraw","Add_New_Withdraw")->name("with");
    Route::post("bank/insert_withdraw","insert_New_Withdraw")->name("reqwith");
    Route::get("bank/View_Withdraws","View_All_Withdrawls")->name("withdraws");
    
    
        Route::get("bank/edit_deposit/{id}","Edit_bank_Deposit")->name('editbank')->middleware("if_admin");
        Route::post("bank/update_deposit/{id}","Update_Deposit")->name("doeditbank");
        Route::get("bank/delete_bank_deposit/{id}","Delete_Bank_Deposit")->name('deletebank')->middleware("if_admin");
        
    
    
        Route::get("bank/edit_bank_withdraw/{id}","Edit_Bank_Withdraw")->name('editbankwith')->middleware("if_admin");
        Route::post("bank/update_bank_withdraw/{id}","Update_Bank_Withdraw")->name("doeditbankwith");
        Route::get("bank/delete_bank_withdraw/{id}","Delete_Bank_withdraw")->name('deletebankwith')->middleware("if_admin");
        
    
    
    
    });

    
Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(Vodafone_Cash::class)->group(function(){


    Route::get("vodafone/index","Index")->name("vodafone/index");
    Route::get("vodafone/increase_cash","Increase_Cash")->name("addcash");
    Route::post("vodafone/insert_cash","Insert_Cash")->name("insertcash");
    Route::get("vodafone/add_withdraw","Add_New_Withdraw")->name("vodafone/with");
    Route::post("vodafone/insert_withdraw","Insert_New_Withdraw")->name("vodafone/reqwith");
    Route::get("vodafone/view_deposits","View_All_Deposits")->name("vodafone");
    Route::get("vodafone/view_withdrawls","View_All_Withdrawls")->name("vodafone/withdraws");



    Route::get("vodafone/edit_deposit/{name}","Edit_Deposit_Vodafone")->name('editdevodafone')->middleware("if_admin");
    Route::post("vodafone/update_deposit/{id}","Update_Vodafone_Deposit")->name("doeditvodafone");
    Route::get("vodafone/delete_deposit/{id}","Delete_Vodafone_Deposit")->name('deletevodafone')->middleware("if_admin");
    

    Route::get("vodafone/Edit_withdraw/{name}","Edit_Vodafone_Withdraw")->name('editdevodafonewith')->middleware("if_admin");
    Route::post("vodafone/update_withdraw/{id}","Update_Vodafone_Withdraw")->name("doeditvodafonewith");
    Route::get("vodafone/delete_withdraw/{id}","Delete_Vodafone_Withdraw")->name('deletevodafonewith')->middleware("if_admin");
    




});
Route::middleware(["auth:admin,web,super_admin","task_bar"])->controller(CashRegister::class)->group(function(){

    Route::get("cash_register/index","Index")->name("balance");
    Route::get("cash_register/increate_cash","Increse_CashRegister")->name("addbalance");
    Route::post("cash_register/insert_cash","Insert_CashRegister")->name("insertbalance");
    Route::get("cash_register/new_withdraw","Add_Wew_withdraw")->name("balance/with");
    Route::post("cash_register/insert_withdraw","Insert_Withdraw")->name("balance/reqwith");
    Route::get("cash_register","view_deposits")->name("View_All_Deposits");
    Route::get("cash_register/view_withdrawls","View_All_Withdrawls")->name("balance/withdraws");

    Route::get("cash_register/edit_deposit/{name}","Edit_CashRegister_Deposit")->name('editsellrecite')->middleware("if_admin");
    Route::post("cash_register/update_deposit/{id}","Update_Deposit")->name("doeditsellrecite");
    Route::get("cash_register/delete_deposit/{id}","Delete_Deposit")->name('deletesellerdelete')->middleware("if_admin");
    
    Route::get("cash_register/edit_withdraw/{name}","Edit_CashRegister_Withdraw")->name('editbalancewith')->middleware("if_admin");
    Route::post("cash_register/update_withdraw/{id}","Update_CashRegister_Withdraw")->name("doeditbalancewithdraw");
    Route::get("cash_register/delete_withdraw/{id}","Delete_CashRegister_Withdraw")->name('deletesellerwith')->middleware("if_admin");
    

    });