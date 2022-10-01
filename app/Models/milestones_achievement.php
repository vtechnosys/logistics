<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class milestones_achievement extends Model
{
    use HasFactory;
    protected $fillable=['year','img','description'];
}
