<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];
    protected $table = 'group';

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function hasUser($user_id)
    {
        foreach ($this->users as $user) {
            if($user->id == $user_id) {
                return true;
            }
        }
    }
}
