<?php

namespace App\Http\Controllers\Fabrics;
use App\Http\Controllers\Controller;
use App\Models\Statics\The_Factory_Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Admin;

use App\Traits\Notifications;
use App\Traits\Data_Entry;
class modelcontroller extends Controller
{

    use Notifications;
    use Data_Entry;
    
    public $Type;
    public function index(){


return view("model/index");

    }
    public function add()  {


        return view("model/addmodel");

        
    }

public function insertmodel(request $request){


$exis = The_Factory_Models::where("code",$request->code)->first();

if($exis){

$exis->much += $request->much;

$exis ->save();


$this->Type = " زيادة كمية منتج";
$this->Notifications_Sender($exis,$this->Type);



return redirect()->route("index");

}

else{
    $model = new The_Factory_Models();
$model->name = $request->type;
$model->much = $request->much;

$model->price = $request->price;
$model->prudec_cost = $request->Prudec_cost;
$model->code = $request->code;


$this->Type = "  منتج جديد";
$this->Notifications_Sender($model,$this->Type);



$model->save();


return redirect()->back();

}

}

public function models(){

$models = The_Factory_Models::all();

return view("model/show",compact("models"));


}


 
public function editmodel($id){

    $edit = The_Factory_Models::find($id);

    return view("model/edit",compact("edit"));

    }

    public function doeditmodel(request $request,$id){

        $model = The_Factory_Models::find($id);

        $model->name = $request->type;
        $model->much = $request->much;
        
        $model->price = $request->price;
        $model->prudec_cost = $request->Prudec_cost;
        $model->code = $request->code;
        $model->save();
        
        
        return redirect()->back();
        
        }
        


        public function getByCode($code)
        {
            // البحث عن السجل بناءً على الكود المدخل
            $model = The_Factory_Models::where('code', $code)->first();
            
            // إذا تم العثور على السجل، يتم إرجاعه
            if ($model) {
                return response()->json([
                    'name' => $model->name,
                    'price' => $model->price,
                    'much' => $model->much,
                ]);
            }
            
            // إذا لم يتم العثور على السجل، يتم إرجاع استجابة فارغة أو رسالة خطأ
            return response()->json(['error' => 'Model not found'], 404);
        }


}
