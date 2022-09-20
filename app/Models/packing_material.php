<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packing_material extends Model
{
    use HasFactory;
    protected $fillable=['img','title','description'];
}
