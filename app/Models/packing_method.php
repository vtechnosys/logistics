<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packing_method extends Model
{
    use HasFactory;
    protected $fillable=['img','title','description','status'];
}
