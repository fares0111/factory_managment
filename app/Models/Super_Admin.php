<?php


namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Super_Admin extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable,CanResetPassword; 
    
    protected $guard= "Super_Admin";

    public $table = "super_admins";
    // تحديد الجدول المرتبط بهذا الموديل

    // الحقول التي يمكن ملؤها في الجدول
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // الحقول المخفية عند التحويل إلى JSON
    protected $hidden = [
        'password', 'remember_token',
    ];

    // الحقول التي يجب تحويلها إلى أنواع بيانات أخرى
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
