<?php

namespace App\Modules\Roles\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RoleRepositoryInterface
{
    public function trashedRoles(): ?Collection;

    public function destroy($id): void;

    public function restoreRole($id): void;

    public function allRoles(): ?Collection;
}
