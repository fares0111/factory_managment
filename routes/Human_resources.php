<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Human_Resources\daily;
use App\Http\Controllers\Human_Resources\garment_maker;
use App\Http\Controllers\Human_Resources\employees;
use App\Http\Controllers\Human_Resources\clothing_manufacturer;





//اليومية
Route::get("search",[daily::class,"tran"])->name("search")->middleware("task_bar");
Route::get("daily",[daily::class,'choose'])->name("daily")->middleware("task_bar");
route::post("insert_time",[daily::class,'time'])->name("insert_time")->middleware("task_bar");


//الايرادات


Route::get( "addbalance",[daily::class,"add"])->name("addbalance")->middleware("task_bar");
Route::post( "insert_daily",[daily::class,"insert"])->name("insert_daily")->middleware("task_bar");

Route::get("editdaily/{id}",[daily::class,"editdaily"])->name('editdaily')->middleware("task_bar");
Route::post("doeditdaily/{id}",[daily::class,"doeditdaily"])->name("doeditdaily")->middleware("task_bar");
Route::get("deletedaily/{id}",[daily::class,"deletedaily"])->name('deletedaily')->middleware("task_bar");

// المصروفات


Route::get("add_with_daily",[daily::class,"add_with_daily"])->name("add_with_daily")->middleware("task_bar");
Route::post("insert_with_daily",[daily::class,"insert_with_daily"])->name("insert_with_daily")->middleware("task_bar");
Route::get("edit_with_daily/{id}",[daily::class,"edit_with_daily"])->name('edit_with_daily')->middleware("task_bar");
Route::post("doedit_with_daily/{id}",[daily::class,"doedit_with_daily"])->name("doedit_with_daily")->middleware("task_bar");
Route::get("delete_with_daily/{id}",[daily::class,"delete_with_daily"])->name('delete_with_daily')->middleware("task_bar");
//الصنايعية


Route::get("workers",[garment_maker::class,'index'])->name("workers")->middleware("task_bar");
Route::get("All_Worker",[garment_maker::class,'All_Worker'])->name("All_Worker")->middleware("task_bar");
Route::get("Add_Worker_Form",[garment_maker::class,'Add_Worker_Form'])->name("Add_Worker_Form")->middleware("task_bar");
Route::post("insert_worker",[garment_maker::class,'Insert_Worker'])->name("Insert_Worker")->middleware("task_bar");

//السحوبات

Route::get("worker_withdraw_form",[garment_maker::class,'worker_withdraw_form'])->name("worker_withdraw_form")->middleware("task_bar");
Route::post("insert_withdraw",[garment_maker::class,'insert_withdraw'])->name("insert_withdraw")->middleware("task_bar");

Route::get("edit_with_worker/{id}",[garment_maker::class,"edit_with_worker"])->name('edit_with_worker')->middleware("task_bar");
Route::post("doedit_with_worker/{id}",[garment_maker::class,"doedit_with_worker"])->name("doedit_with_worker")->middleware("task_bar");
Route::get("delete_with_worker/{id}",[garment_maker::class,"delete_with_worker"])->name('delete_with_worker')->middleware("task_bar");

//الانتاج

Route::get("worker_addetion_form",[garment_maker::class,"worker_addetion_form"])->name("worker_addetion_form")->middleware("task_bar");
Route::post("insert_addetion",[garment_maker::class,'insert_addetion'])->name("insert_addetion")->middleware("task_bar");

Route::get("edit_add_worker/{id}",[garment_maker::class,"edit_add_worker"])->name('edit_add_worker')->middleware("task_bar");
Route::post("doedit_add_worker/{id}",[garment_maker::class,"doedit_add_worker"])->name("doedit_add_worker")->middleware("task_bar");
Route::get("delete_add_worker/{id}",[garment_maker::class,"delete_add_worker"])->name('delete_add_worker')->middleware("task_bar");

// التقرير

Route::get("report",[garment_maker::class,'report'])->name("report")->middleware("task_bar");

Route::post("search_report",[garment_maker::class,'search_report'])->name("search_report")->middleware("task_bar");


Route::controller(employees::class)->middleware(["auth:admin,web,super_admin","task_bar"])->group(function(){

//اضافة عامل جديد
Route::get("new_em","new_em")->name("new_em")->middleware("task_bar");

Route::post("insert_em","insert_em")->name("insert_em")->middleware("task_bar");

Route::get("add_new_with",action: "add_new_with")->name("add_new_with")->middleware("task_bar");
Route::post("insert_with_em","insert_with_em")->name("insert_with_em")->middleware("task_bar");

Route::get("add_abs","add_abs")->name("add_abs")->middleware("task_bar");
Route::post("insert_add","insert_add")->name("insert_add")->middleware("task_bar");

Route::get("statment","statment")->name("statment")->middleware("task_bar");

Route::post("search_about_statment","search_about_statment")->name("search_about_statment")->middleware("task_bar")->middleware("task_bar");

Route::get("employees/process","Index")->name("employees.index");


Route::get("employees/attendec_form","View_Attendec_Form")->name("view_attendec_form");
Route::post("employees/increase_attendec","Increase_Attendec")->name("increase_attendec");

Route::get("employees/abs_hours_form","Abs_Hours_Form")->name("abs_hours_form");
Route::post("employees/increase_abs_hours","Increase_Abs_Hours")->name("increase_abs_hours");


Route::get("employees/compensatory_hours_form","Compensatory_Hours_Form")->name("compensatory_hours");
Route::post("employees/increase_compensatory_hours","Increase_Compensatory_Hours")->name("increase_compensatory_hours");
});


route::get("add",[clothing_manufacturer::class,"add"])->name("add")->middleware("task_bar");
Route::post("insert_bro",[clothing_manufacturer::class,'insert_bro'])->name("insert_bro")->middleware("task_bar");
//المسحوبات 
Route::get("worker_bro_withdraw_form",[clothing_manufacturer::class,'worker_withdraw_form'])->name("worker_bro_withdraw_form")->middleware("task_bar");
Route::post("insert_bro_withdraw",[clothing_manufacturer::class,'insert_withdraw'])->name("insert_bro_withdraw")->middleware("task_bar");

Route::get("edit_with_bro_worker/{id}",[clothing_manufacturer::class,"edit_with_bro_worker"])->name('edit_with_bro_worker')->middleware("task_bar");
Route::post("doedit_with_bro_worker/{id}",[clothing_manufacturer::class,"doedit_with_bro_worker"])->name("doedit_with_bro_worker")->middleware("task_bar");
Route::get("delete_with_bro_worker/{id}",[clothing_manufacturer::class,"delete_with_bro_worker"])->name('delete_with_bro_worker')->middleware("task_bar");

//الانتاج
Route::get("worker_bro_add_form",[clothing_manufacturer::class,'worker_bro_add_form'])->name("worker_bro_add_form")->middleware("task_bar");
Route::post("insert_bro_add",[clothing_manufacturer::class,'insert_bro_add'])->name("insert_bro_add")->middleware("task_bar");

Route::get("edit_add_bro_worker/{id}",[clothing_manufacturer::class,"edit_add_bro_worker"])->name('edit_add_bro_worker')->middleware("task_bar");
Route::post("doedit_add_bro_worker/{id}",[clothing_manufacturer::class,"doedit_add_bro_worker"])->name("doedit_add_bro_worker")->middleware("task_bar");
Route::get("delete_add_bro_worker/{id}",[clothing_manufacturer::class,"delete_add_bro_worker"])->name('delete_add_bro_worker')->middleware("task_bar");


// التقارير


Route::get("search_report_bro",[clothing_manufacturer::class,"search_report_bro"])->name("search_report_bro")->middleware("task_bar");
Route::post("insert_report_bro",[clothing_manufacturer::class,"insert_report_bro"])->name("insert_report_bro")->middleware("task_bar");