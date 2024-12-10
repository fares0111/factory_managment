<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;

trait Data_Entry{


public function Role_Assigner($Model){


    if (auth()->guard('admin')->check()) {
        // المستخدم مشرف
        $Model->opreator = auth()->guard('admin')->user()->name;
        $Model->is_admin = 'مسؤول';
    } elseif (auth()->guard('web')->check()) {
        // المستخدم هو مستخدم عادي
        $Model->opreator = auth()->guard('web')->user()->name;
        $Model->is_admin ='عضو';

    } 

}




}