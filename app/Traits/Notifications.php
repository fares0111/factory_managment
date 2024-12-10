<?php

namespace App\Traits;

use Illuminate\Support\Facades\Notification;
use App\Notifications\Creation_Notifications;
use App\Models\Admin;
use App\Models\Super_Admin;
trait Notifications{



public function Notifications_Sender($Record,$Type){


    if(auth()->guard("web")->check()||auth()->guard("admin")->check()){

        $Roll = null;
        $Message = null;
        $Admins = Admin::all();



        if(auth()->guard("admin")->check()){
        $Admins = Admin::where("id","!=",auth()->guard("admin")->user()->id)->get();
        $Roll ="المسؤول"." ". auth()->guard("admin")->user()->name;
        

    }else{$Roll = "العضو"." ". auth()->user()->name;}
        

$Message = "قام" ." " .$Roll." "."بانشاء"." " .$Type;


        $Super_Admin = Super_Admin::all();
        $The_Modell_Name = get_class($Record);
        $users = $Admins->merge($Super_Admin);
        Notification::send($users, new Creation_Notifications(
            
            $The_Modell_Name,
            $Record->id,
            $Message,
        ));
    
    
    }
    



}



}