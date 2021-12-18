<?php

namespace App\Modules\User\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function allUsers(): ?Collection;

    public function trashedUsers(): ?Collection;

    public function destroy($id): void;

    public function restoreUser($id): void;
}
