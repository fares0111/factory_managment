<?php

namespace App\Http\Controllers\Admins\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Clints\Sales_Invoices_Model;
class Authenticate extends Controller
{



public function Dashboard(){

$Users = User::all();
$This_Time = now();

$DateOnly = Carbon::parse($This_Time)->format('Y-m-d');

$Sales_Invoices = Sales_Invoices_Model::whereDate("date",$DateOnly)
->sum("total")
;


return view("admin.dashboard",compact("Users","Sales_Invoices"));

}

    // عرض صفحة تسجيل الدخول
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // تسجيل دخول المشرف
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

            if(Auth::guard('web')->check()){
                Auth::guard('web')->logout();
    
            }
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // تسجيل خروج المشرف
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('my_index');
    }

    // عرض صفحة إنشاء الحساب
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    // إنشاء حساب جديد للمشرف
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        return redirect()->back();
    }
}
