<?php

namespace App\Modules\Permissions\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface PermissionRepositoryInterface
{
    public function allPermissions(): ?Collection;
}
