<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    protected $fillable = [
        'indexNo', 'noOfGroup', 'groupSize', 'courseCode'
    ];

    protected $table = "index";
}
