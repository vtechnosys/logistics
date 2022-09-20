<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enquire extends Model
{
    use HasFactory;
    protected $fillable=['name','email','contact','service','location_from','location_to','message'];
}
