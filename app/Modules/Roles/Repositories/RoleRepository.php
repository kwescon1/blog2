<?php

namespace App\Modules\Roles\Repositories;

use App\Models\Roles;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Roles\Contracts\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Roles $model)
    {
        parent::__construct($model);
    }

    public function allRoles(): ?Collection
    {
        return $this->model()->where('name', '!=', 'Super Admin')->get();
    }

    public function trashedRoles(): ?Collection
    {
        return $this->model()->onlyTrashed()->latest()->get();
    }

    public function destroy($id): void
    {
        $this->model()->onlyTrashed()->find($id)->forceDelete();

        return;
    }

    public function restoreRole($id): void
    {
        $this->model()->withTrashed()->find($id)->restore();

        return;
    }
}
