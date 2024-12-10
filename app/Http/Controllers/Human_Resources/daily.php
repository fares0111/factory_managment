<?php

namespace App\Http\Controllers\Human_Resources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Human_Resources\dailyy;
use App\Models\Human_Resources\add_with_daily;
use App\Models\Human_Resources\withdrawals;
use App\Models\Human_Resources\bro1;
use App\Models\Human_Resources\add_new_with;
use App\Traits\Notifications;
use App\Traits\Data_Entry;
class daily extends Controller
{
    use Notifications;
use Data_Entry;
    public $Type;

public function index()  {
    
return view('daily/index');

}

public function choose(){

$Revenues = dailyy::sum("amont");
$Withdrawals = add_with_daily::sum("amont");
$W = withdrawals::sum("much");
$bro =bro1::sum("much");
$worker_with = add_new_with::sum("amount");
return view("daily/choose",compact("Revenues","Withdrawals",'W',"bro","worker_with"));

}


public function search(){

    return view("daily/search");
    
    }




    public function time(request $request){


        $start_date = date('Y-m-d 00:00:00', strtotime($request->start_date));
        $end_date = date('Y-m-d 23:59:59', strtotime($request->end_date));
        
        $data = dailyy::where('date', '>=', $start_date)
            ->where('date', '<=', $end_date)
            ->get();
        ;


        $dataw = add_with_daily::where('date', '>=', $start_date)
        ->where('date', '<=', $end_date)
        ->get();
        
        $workers_withs = withdrawals::where('date', '>=', $start_date)
        ->where('date', '<=', $end_date)
        ->get();
        
        $em_withs = add_new_with::where('date', '>=', $start_date)
        ->where('date', '<=', $end_date)
        ->get();
        
        $bro_withs = bro1::where('date', '>=', $start_date)
        ->where('date', '<=', $end_date)
        ->get();
        

return view("daily/show",compact("data","dataw","workers_withs","em_withs","bro_withs"));


    }


    public function tran(){

        $withdrawals = add_with_daily::get()->all();
$all = dailyy::get()->all();

return view("daily/search",compact("all","withdrawals"));

    }





//الايرادات
public function add(){

return view("daily/add");

}


public function insert(request $request){


    $add = new dailyy();
    
    $add->reason = $request->reason;
    $add->des = $request->des;
    $add->date = $request->date;
    $add->amont = $request->amont;
    $add->opre = $request->oper;

    $this->Role_Assigner($add);

    $add->save();
   $this->Type = "ايراد يومية ";
    $this->Notifications_Sender($add,$this->Type);
    return redirect()->route("addbalance");

        }
    



        //المصروفات


     
        public function add_with_daily()
         {

            return view("daily/add_with_daily");  

        }

        public function insert_with_daily(request $request){

            $add_with_daily = new add_with_daily();
    
            $add_with_daily->reason = $request->reason;
            $add_with_daily->des = $request->des;
            $add_with_daily->date = $request->date;
            $add_with_daily->amont = $request->amont;
            $add_with_daily->opre = $request->oper;
            
            $this->Role_Assigner($add_with_daily);

            $add_with_daily->save();
    
            $this->Type = "سحب يومية ";
            $this->Notifications_Sender($add_with_daily,$this->Type);

    return redirect()->route("add_with_daily");

        }

        public function editdaily($id){
            $edit = dailyy::find($id);
            return view("daily/edit",compact("edit"));
            }


            public function doeditdaily(request $request,$id){


                $add = dailyy::find($id);
    
                $add->reason = $request->reason;
                $add->des = $request->des;
                $add->amont = $request->amont;
                $add->opre = $request->oper;
                $add->save();

                return redirect()->route("search");
                
                }
                public function deletedaily($id){

                    $delete=dailyy::where("id",$id)->delete();
                    
                    return redirect()->route("search");
                    
                    }    
                    
                    
                    public function edit_with_daily($id){
                        $edit = add_with_daily::find($id);
                        return view("daily/edit_with",compact("edit"));
                        }
            
            
                        public function doedit_with_daily(request $request,$id){
            
            
                            $add = add_with_daily::find($id);
                
                            $add->reason = $request->reason;
                            $add->des = $request->des;
                            $add->amont = $request->amont;
                            $add->save();
            
                            return redirect()->route("search");
                            
                            }
                            public function delete_with_daily($id){
            
                                $delete=add_with_daily::where("id",$id)->delete();
                                
                                return redirect()->route("search");
                                
                                }         

}
