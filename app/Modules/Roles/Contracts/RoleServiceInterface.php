<?php

namespace App\Modules\Roles\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface RoleServiceInterface
{
    public function index(): ?Collection;
    public function trashedRoles(): ?Collection;

    public function store($data): \Illuminate\Database\Eloquent\Model;

    public function edit(int $id): ?array;

    public function update(array $data, int $id): void;

    public function softDeleteRole($id): void;

    public function restoreRole($id): void;

    public function destroy($id): void;

    public function show($id): ?object;
}
