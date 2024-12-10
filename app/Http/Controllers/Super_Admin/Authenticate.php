<?php

namespace App\Http\Controllers\Super_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Clints\Sales_Invoices_Model;
use App\Models\Suppliers\Purchases_Invoices;

use Carbon\Carbon;
use App\Models\Super_Admin;
use App\Models\User;
use App\Models\Admin;

class Authenticate extends Controller
{


    
    public function Dashboard(){

        $Users = User::all();
        $Admins = Admin::all();


        $This_Time = now();
        
        $DateOnly = Carbon::parse($This_Time)->format('Y-m-d');
        
        $Sales_Invoices = Sales_Invoices_Model::whereDate("date",$DateOnly)
        ->sum("total")
        ;

        $Purchases_Invoices = Purchases_Invoices::whereDate("date",$DateOnly)
        ->sum("total")
        ;  
        
        return view("super_admin.dashboard",compact(
            "Users",
            "Sales_Invoices",
            "Admins",
            "Purchases_Invoices"));
        
        }
    
        // عرض صفحة تسجيل الدخول
        public function showLoginForm()
        {
            return view('Super_Admin.Login');
        }
    
        // تسجيل دخول المشرف
        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            
    
            if (Auth::guard('super_admin')->attempt($credentials)) {
    
                if(Auth::guard('web')->check()){
                    Auth::guard('web')->logout();
        
                }

                if(Auth::guard('admin')->check()){
                    Auth::guard('admin')->logout();
        
                }
                return redirect()->route('super_admin/dashboard');
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'password' => "the password is worng",
            ]);
        }
    
        // تسجيل خروج المشرف
        public function logout(Request $request)
        {
            Auth::guard('super_admin')->logout();
            return redirect()->route('my_index');
        }
    
        // عرض صفحة إنشاء الحساب
        public function showRegisterForm()
        {
            return view('Super_Admin.Register');
        }
    
        // إنشاء حساب جديد للمشرف
        public function register(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|strin|gmax:255|unique:admins',
                'password' => 'required|string|min:8|confirmed',
            ]);
    
            $super_admin = super_admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
    
            Auth::guard('super_admin')->login($super_admin);
    
    
     return redirect()->route('super_admin/dashboard');
        }
    }
    

