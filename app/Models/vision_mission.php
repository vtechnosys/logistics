<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vision_mission extends Model
{
    use HasFactory;
    protected $fillable=['title','description'];
}
