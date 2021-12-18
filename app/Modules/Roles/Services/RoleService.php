<?php

namespace App\Modules\Roles\Services;

use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Roles\Contracts\RoleServiceInterface;
use App\Modules\Roles\Contracts\RoleRepositoryInterface;
use App\Modules\Permissions\Contracts\PermissionRepositoryInterface;


class RoleService extends CoreService implements RoleServiceInterface
{

    private $roleRepository;
    private $permissionRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(): ?Collection
    {
        return $this->roleRepository->allRoles();
    }

    public function trashedRoles(): ?Collection
    {
        return $this->roleRepository->trashedRoles();
    }

    public function store($data): \Illuminate\Database\Eloquent\Model
    {


        $permissions = $data['permission'];

        unset($data['permission']);

        $role = $this->roleRepository->create($data);

        $role->syncPermissions($permissions);

        return $role;
    }

    public function edit($id): ?array
    {

        $role = $this->roleRepository->find($id);

        return [
            'form_name' => 'Edit Role',
            'data' => $role
        ];
    }

    public function update($data, $id): void
    {
        $permissions = $data['permission'];

        unset($data['permission']);

        $role = $this->roleRepository->update($id, $data);

        $role->syncPermissions($permissions);

        return;
    }

    public function softDeleteRole($id): void
    {
        $this->roleRepository->delete($id);
    }

    public function restoreRole($id): void
    {
        $this->roleRepository->restoreRole($id);

        return;
    }

    public function destroy($id): void
    {
        $this->roleRepository->destroy($id);

        return;
    }

    public function show($id): ?object
    {
        return $this->roleRepository->find($id);
    }
}
