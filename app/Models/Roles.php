<?php

namespace App\Models;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roles extends Role
{
    use HasFactory, SoftDeletes;

    // public $guard_name = 'web';
}
