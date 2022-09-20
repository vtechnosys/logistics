<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_contact extends Model
{
    use HasFactory;
    protected $fillable=['name','phone','email','company_name','message','enquire_for']
}
