<?php

namespace App\Modules\Permissions\Repositories;

use App\Models\Permissions;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Permissions\Contracts\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function __construct(Permissions $model)
    {
        parent::__construct($model);
    }

    public function allPermissions(): ?Collection
    {
        return $this->model()->where('name', '!=', 'super_admin')->get();
    }
}
