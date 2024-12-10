<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Statics\RepoController;
use App\Http\Controllers\Statics\Net_Profit;



Route::get("repo",[RepoController::class,"view"])->name("repo")->middleware("auth:admin,web,super_admin");

Route::Get("netprofit",[Net_Profit::class,"Show"])
->name("netprofit")->middleware(["auth:admin,super_admin",'task_bar']);

