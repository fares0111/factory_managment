<?php

use App\Http\Controllers\Super_Admin\Manage_Admins;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Super_Admin\Authenticate;
use App\Http\Controllers\Super_Admin\Reports;

Route::controller(Authenticate::class)->prefix('super_admin')->name('super_admin/')->group(function () {

    Route::view("index","admin/main");
   // Route::get('register','showRegisterForm')->name('register');
    Route::post('register', 'register')->name("new");
    
    Route::get('login','showLoginForm')->name('login');
    Route::post('login', 'login')->name("check");
    Route::post('logout', 'logout')->name('logout');


    Route::get('dashboard',"Dashboard")->name('dashboard')->middleware('super_admin');

    });


    Route::controller(Manage_Admins::class)->middleware("super_admin")->prefix("super_admin/")->name("super_admin/")->group(function(){

        Route::get("edit_admin/{id}","View_Edit_Admin_Form")->name("edit.admin");
        Route::post("update_admin/{id}","Update_Admin_Info")->name("update.admin");
        Route::get("delete_admin/{id}","Destroy_Admin")->name("delete.admin");
        
        

        Route::get("manage_admins","Control_Admins")->name("control.admin");



    });

    Route::controller(Reports::class)->middleware("super_admin")->prefix("super_admin/")->name("super_admin/")->group(function(){


Route::get("query_admin_repoet","Query_Admin_Report")->name("query.admin.report");
Route::Post("result_admin_report","Result_Admin_Report")->name("result.admin.report");


    });


