<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonAcademicGroup extends Model
{
    protected $fillable = [
        'groupId', 'category'
    ];

    protected $table = "non_academic_group";
}
