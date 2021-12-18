<?php

namespace App\Modules\Base\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{

    public function find(int $id): ?Model;

    public function create(array $data): ?Model;

    public function update(int $id, array $data): ?Model;

    public function delete(int $id);

    public function all(): Collection;
}
