<?php

namespace App\Models\Human_Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Human_Resources\late_time;
use App\Models\Human_Resources\over_time;

class new_em extends Model
{
    use HasFactory;

    public $table = "new_em";
    public $timestamps = false;

    public function late_time(){

return $this->hasMany(late_time::class,"clint_id");

    }

    public function over_time(){

return $this->hasMany(over_time::class,"clint_id");

    }
}
