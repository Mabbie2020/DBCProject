<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class students extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'class_id',
        'class_type',
        'class_name',
        'lastname',
        'claa_captain',
        'class_teacher'

    ];
}
