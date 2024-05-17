<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TEngineer extends BaseModel
{
    protected $table = "t_engineers";
    protected $fillable = ['s_name', 'i_id_number', 's_mobile', 'i_family', 's_address', 'e_type','s_value','e_donor'];
}
