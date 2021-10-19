<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends ELoquent {

    protected $table = 'roles';

    public function users()
    {
        return $this->hasMany('User', 'role_id', 'id');
    }

    public function permissions()
    {
        return $this->hasMany('Permission');
    }
}
