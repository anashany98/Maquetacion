<?php

namespace App\Models\DB;

class User extends DBModel
{

    protected $table = 'users';

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

}
