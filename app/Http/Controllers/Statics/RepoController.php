<?php

namespace App\Http\Controllers\Statics;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Statics\The_Factory_Models;
use App\Models\Suppliers\Purchases_Invoices;
class RepoController extends Controller
{

public function view(){

$Purchases_Invoices = Purchases_Invoices::all();

$models = The_Factory_Models::all();



return view("Models_Warehouse/View_All",compact("Purchases_Invoices","models"));



}



}
