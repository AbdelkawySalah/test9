<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class H_patients extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['name','nationality_id','phone','attachment','title'
    ,'status','address','bloodtype','description'
     ];
}
