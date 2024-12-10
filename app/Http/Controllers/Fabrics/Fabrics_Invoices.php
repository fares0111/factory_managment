<?php

namespace App\Http\Controllers\Fabrics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Super_Admin;
use App\Models\Fabrics\Fabrics_Model;
use App\Models\Fabrics\Add_New_Fabric_Clint;
use App\Models\Fabrics\Cash_Fabric_Ricete;
use App\Models\Fabrics\Deferred_Fabrics_Invoices;
use App\Models\Fabrics\Installment_Fabric_Clint;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Admin;

use App\Traits\Notifications;
use App\Traits\Data_Entry;


class Fabrics_Invoices extends Controller
{
    use Notifications;
    use Data_Entry;
    public $Type;
    public function get_date_for_cash_fabrics_recite(request $request){

        $All_Fabrics = Fabrics_Model::where("code",$request->code)->get()->first();
        
        return response()->json($All_Fabrics);
        
            }


            public function new_fabrics_cash_recite(){

                $All_Clints = Add_New_Fabric_Clint::get();
                $All_Fabrics = Fabrics_Model::get();
                return view("fabrics/Cash_Fabrics_Ricete",compact("All_Clints","All_Fabrics"));
                
                
                }
                
                public function Insert_Fabrics_Cash_Ricete(Request $request)
                {
                    $detailsArray = $request->details;
                    $robeArray = $request->much_of_fabricrobe;
                    $meterArray = $request->much_of_fabricmeter;
                    $priceArray = $request->price;
                    $totalArray = $request->total;
                    $customerArray = $request->customerSelect;
                    $idArray = $request->id;
                   
                
                    for ($i = 0; $i < count($detailsArray); $i++) {
                        $New_Fabrics_Cash_Ricete = new Cash_Fabric_Ricete();
                        $Geting_Id = Add_New_Fabric_Clint::where("name",$customerArray[$i])->select("id")->first();
                        $New_Fabrics_Cash_Ricete->details = $detailsArray[$i];
                        $New_Fabrics_Cash_Ricete->much_of_fabricrobe = $robeArray[$i];
                        $New_Fabrics_Cash_Ricete->much_of_fabricmeter = $meterArray[$i];
                        $New_Fabrics_Cash_Ricete->price = $priceArray[$i];
                        $New_Fabrics_Cash_Ricete->total = $totalArray[$i];
                        $New_Fabrics_Cash_Ricete->clint = $customerArray[$i];
                        $New_Fabrics_Cash_Ricete->clint_id = $Geting_Id->id;


                        $this->Role_Assigner($New_Fabrics_Cash_Ricete);

                        $New_Fabrics_Cash_Ricete->save();
                
                        $this->Type = "باضافة فاتورة قماش";
                        $this->Notifications_Sender($New_Fabrics_Cash_Ricete,$this->Type);
                        
                        
                        
                    }
                
                    return redirect()->back();
                }
                
                
                public function Insert_Deferres_Fabrics_Recite(Request $request)
                {
                    $detailsArray = $request->details;
                    $robeArray = $request->much_of_fabricrobe;
                    $meterArray = $request->much_of_fabricmeter;
                    $priceArray = $request->price;
                    $totalArray = $request->total;
                    $customerArray = $request->customerSelect;
                    $deferredArray = $request->deferred;
                    $periodArray = $request->period;
                    $idArray = $request->id;
                
                    for ($i = 0; $i < count($detailsArray); $i++) {
                        $New_Fabrics_Deferred_Ricete = new Deferred_Fabrics_Invoices();
                        $Geting_Id = Add_New_Fabric_Clint::where("name",$customerArray[$i])->select("id")->first();

                        $New_Fabrics_Deferred_Ricete->details = $detailsArray[$i];
                        $New_Fabrics_Deferred_Ricete->much_of_fabricrobe = $robeArray[$i];
                        $New_Fabrics_Deferred_Ricete->much_of_fabricmeter = $meterArray[$i];
                        $New_Fabrics_Deferred_Ricete->price = $priceArray[$i];
                        $New_Fabrics_Deferred_Ricete->total = $totalArray[$i];
                        $New_Fabrics_Deferred_Ricete->clint = $customerArray[$i];
                        $New_Fabrics_Deferred_Ricete->time_deferred = $periodArray[$i];
                        $New_Fabrics_Deferred_Ricete->cost_deferred = $deferredArray[$i];
                        $New_Fabrics_Deferred_Ricete->total_deferred = $deferredArray[$i] * $periodArray[$i] * $meterArray[$i];
                        $New_Fabrics_Deferred_Ricete->fabric_clint_id = $Geting_Id->id;
                
                        $this->Role_Assigner($New_Fabrics_Deferred_Ricete);


                        $New_Fabrics_Deferred_Ricete->save();

                
                        $this->Type = "باضافة فاتورة قماش";
                        $this->Notifications_Sender($New_Fabrics_Deferred_Ricete,$this->Type);
                        
                        
                        
                       
                
                
                    }

                    
                
                    return redirect()->back();
                }
                
                public function Search_Fabrics_Cash_Recite(Request $request)
                {
                    $query = $request->input('query');
                    $customers = Add_New_Fabric_Clint::where('name', 'like', "%{$query}%")->get(['name']);
                    return response()->json($customers);
                }
                


                public function choosing_invoice_method(){

return view("fabrics/Index_Recite");

}
        
public function Edit_Cash_Invoice($id){


    $Invoice = Cash_Fabric_Ricete::find($id);
    $Clint = $Invoice->clint;
    return view("fabrics.Edit_Cash_Invoice",compact(
        
        'Invoice',
        'Clint',
    
    ));
    }
    
    public function Edit_Deferred_Invoice($id){
    
    
        $Invoice = Deferred_Fabrics_Invoices::find($id);
        $Clint = $Invoice->clint;
        return view("fabrics.Edit_Deferred_Invoice",compact(
            
            'Invoice',
            'Clint',
        
        ));
        }
    
    public function Update_Cash_Invoice(Request $request, $id)
    {
        $Update = Cash_Fabric_Ricete::find($id);
    


        $oldMeters = $Update->much_of_fabricmeter;
        $newMeters = $request->much_of_fabrics;
        $dif = $oldMeters - $newMeters;
    
        $Update->details = $request->name;
        $Update->much_of_fabricmeter = $newMeters;
        $Update->much_of_fabricrobe = $request->much_of_robs;
        $Update->price = $request->price;
        $Update->total = $request->price * $newMeters;

        $Update->save();
    
        return redirect()->route("accout_fabrics_clint_statment");
    }
    
    public function Update_Deferred_Invoices(Request $request, $id)
    {
        $Update = Deferred_Fabrics_Invoices::find($id);
    
        $newMeters = $request->much_of_fabrics;
    
       // $New_Total_Deferred = $request->deferred_time * $request->amount_of_deferred * $newMeters;
        $Update->details = $request->name;
        $Update->much_of_fabricmeter = $newMeters;
        $Update->much_of_fabricrobe = $request->much_of_robs;
        $Update->price = $request->price;
        $Update->time_deferred = $request->deferred_time;
        $Update->cost_deferred = $request->amount_of_deferred;
        $Update->total_deferred =  $request->deferred_time * $request->amount_of_deferred * $newMeters;
        $Update->total = $request->price * $newMeters + $Update->total_deferred;
    

        $Update->save();
    
        return redirect()->route("accout_fabrics_clint_statment");
    }                
    public function Edit_Payment($id){
    
    
        $Payment = Installment_Fabric_Clint::find($id);
        $Clint = $Payment->clint;
    
        return view("fabrics.Edit_Payment",compact(
            
            'Payment',
            'Clint',
        
        ));
    }
    
    public function Update_Payment(request $request ,$id){
    
    $Payment = Installment_Fabric_Clint::find( $id );
    
    
    $Payment->amount = $request->amount;
    
    $Payment->save();
    
    return redirect()->route("accout_fabrics_clint_statment");
    
    }
    
    
    public function Delete_Cash_Invoice($id){
    
        $Cash_Invoice = Cash_Fabric_Ricete::find($id)->delete();
        return redirect()->back();
    
    }
    
    
    public function Delete_Deferred_Invoice($id){
    
        $Cash_Invoice = Deferred_Fabrics_Invoices::find($id)->delete();
        return redirect()->back();
    
    }
    
    public function Delete_Payment($id){
    
        $Cash_Invoice = Installment_Fabric_Clint::find($id)->delete();
        return redirect()->back();
    }
    

}

