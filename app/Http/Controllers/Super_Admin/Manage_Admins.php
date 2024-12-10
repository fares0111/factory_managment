<?php

namespace App\Http\Controllers\Super_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;

class Manage_Admins extends Controller
{

public function Control_Admins(){



    $Admins = Admin::all();

    return view("super_admin.Manage_Admins",compact("Admins"));
    

}

public function View_Edit_Admin_Form($id)
{

$Admin = Admin::find($id);

return view("super_admin/Edit_Admin_Form",compact("Admin"));

}

public function Update_Admin_Info(Request $request, $id)
{

   $User = Admin::find($id);

    $hashed_password = Hash::make($request->password);

    if( $request->email != $User->email){

        $request->validate(['name' => "required|string|max:16|min:5",
        'email' => "required|unique:admins"]);
              $User->email = $request->email;

    }

    if($hashed_password != $User->password && $request->password != $User->password){

$request->validate([
'password' => ['required','min:6',


]],);
        
     $User->password = $hashed_password;


    }


    else{

        $request->validate([

            'name' => "required|string|max:16|min:5",
            
                    ]);
        $User->name = $request->name;

    }

    $User->save();

    return redirect()->route("super_admin/control.admin");

}

public function Destroy_Admin($id)
{

$Admin = Admin::find($id)->delete();

return redirect()->route("super_admin/control.admin");


}

}
