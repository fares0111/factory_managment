<?php

namespace App\Http\Controllers\Clints;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statics\The_Factory_Models;
use App\Models\Clints\Sales_Invoices_Model;
use App\Models\Finance\Payments_Ways;
use App\Models\Clints\The_Clints_Model;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Admin;
use App\Models\Super_Admin;
use App\Traits\Notifications;
use App\Traits\Data_Entry;

class Sales_Invoice extends Controller
{
    
use Notifications;
use Data_Entry;
    public $Type;

public function Index(){


return view("Sell_Invoice/Sales_Invoice_index");


}


public function Sales_Review(){

return view("Sell_Invoice.Invoice_Review");

}

public function Get_Review_Invoice(request $request){


$Invoices = Sales_Invoices_Model::where("reference_id",$request->invoice_reference_number)->get();

return view("Sell_Invoice.Invoice_Review",compact("Invoices"));


}


public function New_salse_Invoice() {
    
$models = The_Factory_Models::all();
$Payments_Ways =  Payments_Ways::all();
$Clints = The_Clints_Model::all();
return view("Sell_Invoice/Add_Sales_Invoice",compact("models","Payments_Ways","Clints"));

}

public function Insert_Sales_Invoice(Request $request)
{

   /* do{

        $Reference_Id = rand(100000,100000000);
    
        
    }while (Sales_Invoices_Model::where('reference_id', $Reference_Id)->exists());
*/
    try {
        $invoices = $request->input('invoices');

        foreach ($invoices as $invoice) {
            // Check if the model exists
            $The_Model_Name = The_Factory_Models::where("name", $invoice['type'])->first();
            if (!$The_Model_Name) {
                return response()->json(['message' => 'نوع الفاتورة غير موجود'], 404);
            }

            // Calculate total and availableQuantity if needed
            $totalAmount = $invoice['price'] * $invoice['availableQuantity'];
            $availableQuantity = $invoice['availableQuantity']; // أو قم بحساب الكمية المتاحة بشكل صحيح

            // Create new sell record
            $New_Sell_Invoice = new Sales_Invoices_Model();

            $New_Sell_Invoice->type = $invoice['type'];
            $New_Sell_Invoice->much = $availableQuantity;
            $New_Sell_Invoice->code = $invoice['code'];
            $New_Sell_Invoice->dis = $invoice['amountDiscount'];
            $New_Sell_Invoice->presdis = $invoice['percentageDiscount'];
            $New_Sell_Invoice->payment_way = $invoice['pay'];
            $New_Sell_Invoice->afterdis = $invoice['afdi'];
            $New_Sell_Invoice->total = $totalAmount;
            $New_Sell_Invoice->buyer = $invoice['payer'];
            $New_Sell_Invoice->price = $invoice['price'];
            $New_Sell_Invoice->date = $invoice['date'];
            $New_Sell_Invoice->clint_id = $invoice['payerId'];
            $New_Sell_Invoice->reference_id = $invoice['reference_id'];

            $this->Role_Assigner($New_Sell_Invoice);

            $New_Sell_Invoice->prudec_cost = $The_Model_Name->prudec_cost * $availableQuantity;
            $New_Sell_Invoice->save();

            // Update available quantity in addmodell
            $The_Model_Name->much -= $availableQuantity;
            $The_Model_Name->save();

            
            $this->Type = "فاتورة بيع";
            $this->Notifications_Sender($New_Sell_Invoice,$this->Type);
            

            
        }

        // Clear temporary invoices
        $request->session()->forget('invoices');

        return response()->json(['message' => 'تم حفظ الفواتير بنجاح!']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'حدث خطأ أثناء حفظ الفواتير.'], 500);
    }
}




public function  View_All_Sales_Invoices(){


    $All_Sales_Invoices = Sales_Invoices_Model::all();
    
    return view("Sell_Invoice/View_Sales_Invoice",compact("All_Sales_Invoices"));
    


}


public function Edit_Sales_Invoice($id){

    $Edit_Sales_Invoice = Sales_Invoices_Model::find($id);
    
    $models = $Edit_Sales_Invoice->type;
    $Payment_ways =  Payments_Ways::all();
    $Available_Quantity_in_Stock=The_Factory_Models::where("name",$models)->get()->first();

    //$sellss = Sales_Invoices_Model::where("id",$id)->select("much")->first();

    return  view("Sell_Invoice/Edit_Sales_Invoice",compact(

        // "sellss",    
        "Edit_Sales_Invoice",
        "Payment_ways",
        "Available_Quantity_in_Stock",
   
    
    ));

    }


    public function Update_Sales_Invoice(request $request,$id){

     
            // الحصول على البيانات المطلوبة من قاعدة البيانات
            $sales_Invoice = Sales_Invoices_Model::find($id);
            $model = The_Factory_Models::where("name", $request->type)->first();
        
            // التحقق من تغيير الكمية المتاحة
            if ($request->availableQuantity > $sales_Invoice->much) {
                // إذا زادت الكمية المتاحة، قم بتحديث الموديل بالفارق
                $difference = $request->availableQuantity - $sales_Invoice->much;
                $model->much -= $difference;
            } elseif ($request->availableQuantity < $sales_Invoice->much) {
                // إذا قلت الكمية المتاحة، قم بإضافة الفارق إلى الموديل
                $difference = $sales_Invoice->much - $request->availableQuantity;
                $model->much += $difference;
            }
        
            // تحديث بقية البيانات في النموذج
            $sales_Invoice->type = $request->type;
            $sales_Invoice->much = $request->availableQuantity;
            $sales_Invoice->code = $request->code;
            $sales_Invoice->dis = $request->amountDiscount;
            $sales_Invoice->presdis = $request->percentageDiscount;
            $sales_Invoice->payment_way = $request->pay;
            $sales_Invoice->afterdis = $request->afdi;
            $sales_Invoice->total = $request->total;
            $sales_Invoice->buyer = $request->payer;
            $sales_Invoice->price = $request->price;

            // حفظ التغييرات
            $model->save();
            $sales_Invoice->save();
        
            // إعادة التوجيه بعد الحفظ
            // إعادة التوجيه بعد الحفظ
            return redirect()->route("buyers");
        }       
        

        
        



        public function Delete_sales_Invoice($id){


            $Delete_Sales_Invoice = Sales_Invoices_Model::where("id",$id)->delete();
            
            return redirect()->back();
            
            }
        }