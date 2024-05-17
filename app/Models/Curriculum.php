<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $table = 'curriculums';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','course_id','name','duration','type','benefits','no_of_lecture','lecture','lecturer',
    ];
}
