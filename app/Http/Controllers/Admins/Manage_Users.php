<?php

namespace App\Http\Controllers\Admins;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Hash;

class Manage_Users extends Controller
{
   
    public function index()
    {

$Users = User::all();

return view("admin.Index_Users",compact("Users"));


    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function View_Edit_User_Form($id)
    {

$User = User::find($id);

return view("admin/Edit_User_Form",compact("User"));

    }

   
    public function edit($id)
    {
        



    }

   
    public function Update_User_Info(Request $request, $id)
    {



        $hashed_password = Hash::make($request->password);



        $User = User::find($id);

 

        if( $request->email != $User->email){

            $request->validate(rules: ['name' => "required|string|max:16|min:5",
            'email' => "required|unique:users"]);
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

        return redirect()->route("admin/user.index");


    }

    public function Destroy_User($id)
    {

$User = User::find($id)->delete();

return redirect()->route("admin/user.index");


    }
}
