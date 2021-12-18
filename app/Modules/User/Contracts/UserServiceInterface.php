<?php

namespace App\Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface
{

    public function index(): ?Collection;

    public function trashedUsers(): ?Collection;

    public function update(array $data, int $id): void;

    public function softDeleteUser($id): void;

    public function restoreUser($id): void;

    public function destroy($id): void;

    public function edit(int $id): ?array;

    public function storePassword($data, $id);

    public function show($id): ?Model;

    public function updateProfile($data): ?Model;
}
