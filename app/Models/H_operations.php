<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class H_operations extends Model
{
    use HasFactory;
    
    protected $fillable=['type','cost','patien_id','doctor_id','dept_id','room_id','emp_id'
     ,'description'];
}
