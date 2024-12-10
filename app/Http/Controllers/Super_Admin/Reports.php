<?php

namespace App\Http\Controllers\Super_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\All_Reports;
use App\Models\Admin;
class Reports extends Controller
{

    use All_Reports;

    public function Query_Admin_Report(){


$Admins = Admin::all();

return view("super_admin.Admin_Report",compact("Admins"));

    }

public function Result_Admin_Report(request $request){

return $this->Admin_Report($request);


}

}
