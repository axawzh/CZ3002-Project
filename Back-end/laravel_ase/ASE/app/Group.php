<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'groupName', 'description', 'admin', 'groupSize'
    ];
}
