<?php

namespace App\Modules\User\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\User\Contracts\UserServiceInterface;
use App\Modules\Roles\Contracts\RoleServiceInterface;
use App\Modules\User\Contracts\UserRepositoryInterface;


class UserService extends CoreService implements UserServiceInterface
{

    private $userRepository;
    private $roleService;

    public function __construct(UserRepositoryInterface $userRepository, RoleServiceInterface $roleService)
    {
        $this->userRepository = $userRepository;
        $this->roleService = $roleService;
    }

    public function index(): ?Collection
    {
        return $this->userRepository->allUsers();
    }

    public function trashedUsers(): ?Collection
    {
        return $this->userRepository->trashedUsers();
    }

    public function softDeleteUser($id): void
    {
        $this->userRepository->delete($id);
    }

    public function restoreUser($id): void
    {
        $this->userRepository->restoreUser($id);

        return;
    }

    public function destroy($id): void
    {
        $this->userRepository->destroy($id);

        return;
    }

    public function edit($id): ?array
    {

        $user = $this->userRepository->find($id);

        return [
            'form_name' => 'Edit User Role',
            'data' => $user
        ];
    }

    public function update($data, $id): void
    {
        $this->userRepository->update($id, ['name' => $data['name']]);

        $user = $this->userRepository->find($id);

        $role = $this->roleService->show($data['role']);

        $user->roles()->sync($role);

        return;
    }

    public function storePassword($data, $id)
    {
        $user = $this->userRepository->find($id);

        return !Hash::check($data['current_password'], $user->password) ? "error" : $this->userRepository->update($id, ['password' => Hash::make($data['password'])]);
    }

    public function show($id): ?Model
    {

        return $this->userRepository->find($id);
    }

    public function updateProfile($data): ?Model
    {

        $path = $this->processImage($data['image'], "users", ["665x665"]);

        $data['image665x665'] = $path[0];

        return $this->userRepository->update(auth()->user()->id, $data);
    }
}
