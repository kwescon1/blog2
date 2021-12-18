<?php

namespace App\Models;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permissions extends Permission
{
    use HasFactory;

    // public $guard_name = 'web';
}
