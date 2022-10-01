<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class celebration extends Model
{
    use HasFactory;
    protected $fillable=['title','images','status'];
}

