<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main_group extends Model
{
	protected $fillable = ['groupName', 'description', 'admin', 'groupSize', 'isFreeJoin'];
    //
}
