<?php

namespace App\Http\Controllers\statics;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Clints\Sales_Invoices_Model;


class Net_Profit extends Controller
{

public function Show(){

$Sell_Prise = Sales_Invoices_Model::sum("total");
$Cost_price = Sales_Invoices_Model::sum("prudec_cost");

$Net_Profit = $Sell_Prise - $Cost_price;

return view("netprofit/Show",compact("Sell_Prise","Cost_price","Net_Profit"));

}

}
