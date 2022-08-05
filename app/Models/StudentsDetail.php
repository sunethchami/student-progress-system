<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsDetail extends Model
{
    protected $fillable = ['reg_no','name','combined_maths','physics',
        'chemistry'];
    use HasFactory;
}
