<?php


namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,CanResetPassword;
    // تحديد الجدول المرتبط بهذا الموديل
    protected $table = 'admins';

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
