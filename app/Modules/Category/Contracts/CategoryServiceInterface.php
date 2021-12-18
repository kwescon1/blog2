<?php

namespace App\Modules\Category\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface CategoryServiceInterface
{
    public function index(): ?Collection;
    public function trashedCategories(): ?Collection;

    public function store($data): \Illuminate\Database\Eloquent\Model;

    public function edit(int $id): ?array;

    public function update(array $data, int $id): void;

    public function softDeleteCat($id): void;

    public function restoreCat($id): void;

    public function destroy($id): void;

    public function show($name): ?object;
}
