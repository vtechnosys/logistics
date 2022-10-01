<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class envisioning_future extends Model
{
    use HasFactory;
    protected $fillable=['title','description','img'];
}
