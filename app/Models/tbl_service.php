<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_service extends Model
{
    use HasFactory;
    protected $fillable=['name','image','short_description','description','status'];
}
