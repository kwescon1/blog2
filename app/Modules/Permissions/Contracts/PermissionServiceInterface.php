<?php

namespace App\Modules\Permissions\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface PermissionServiceInterface
{
    public function index(): ?Collection;
}
