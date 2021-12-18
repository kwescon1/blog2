<?php

namespace App\Modules\Permissions\Services;

use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Permissions\Contracts\PermissionServiceInterface;
use App\Modules\Permissions\Contracts\PermissionRepositoryInterface;


class PermissionService extends CoreService implements PermissionServiceInterface
{
    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index(): ?Collection
    {
        return $this->permissionRepository->allPermissions();
    }
}
