<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin_Manage;
use App\Http\Middleware\Admin;
use App\Http\Controllers\Admins\Auth\Authenticate;
use App\Http\Controllers\Admins\Manage_Users;
use App\Http\Controllers\Admins\notifications;
use App\Http\Controllers\Admins\Reports;
use GuzzleHttp\Middleware;

Route::controller(Authenticate::class)->prefix('admin')->name('admin/')->group(function () {

    Route::view("index","admin/main");
    Route::get('register', 'showRegisterForm')->name('register')->middleware("auth:super_admin");
    Route::post('register',  'register')->name("new");
    
    Route::get('login',  'showLoginForm')->name('login');
    Route::post('login' ,'login')->name("check");
    Route::post('logout', 'logout')->name('logout');

 
    Route::get('dashboard',"Dashboard")->name('dashboard')->middleware('if_admin');

});
Route::controller(Manage_Users::class)->prefix("admin/")->name("admin/")->middleware(["auth:admin,super_admin"])->group(function () {

Route::get("index_users",'index')->name('user.index');
Route::view("add_new_user","auth.register");

Route::get("edit_user/{id}","View_Edit_User_Form")->name("edit.user");
Route::post("update_user/{id}","Update_User_Info")->name("update.user");
Route::get("delete_user/{id}","Destroy_User")->name("delete.user");




});


Route::controller(Reports::class)->prefix("admin")->name("admin/")->middleware(['auth:admin,super_admin'])->group(function () {

Route::get("show_report_page","View_User_Report_Page")->name('show.report.user');
Route::post("query_user","Get_User_Report")->name("query.user");
Route::get("comprehensive_query" , 'Comprehensive_Query')->name("Comprehensive.Query");
Route::post("comprehensive_report","Comprehensive_Report")->name("Comprehensive.Report");


});


Route::view("admin/users_notifications","admin.Notifications")

->name("view_user_notifications")->middleware("auth:admin,super_admin");


Route::get("admin/get_user_activetis_data/{Model}/{data_id}/{notification_id}",[notifications::class,"Get_Data"])
->name("get.data")->middleware("auth:admin,super_admin");
Route::get("markAllAsRead",[notifications::class,"Mark_All_As_Read"])->name("Mark_All_As_Read");