<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_about extends Model
{
    use HasFactory;
    protected $fillable=['name','img','description'];
}
