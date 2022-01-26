<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends ELoquent {

    protected $table = 'permissions';

    public function roles()
    {
        return $this->belongsToMany('Role');
    }
}