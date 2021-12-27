<?php

namespace App\Modules\User\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\User\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function allUsers(): ?Collection
    {
        return $this->model()->where('id','!=',1)->get();

        // return $this->model()->whereHas('roles', function ($q) {
        //     $q->where('name', '!=', 'Super Admin');
        // })->get();
    }

    public function trashedUsers(): ?Collection
    {
        return $this->model()->onlyTrashed()->latest()->get();
    }

    public function destroy($id): void
    {
        $this->model()->onlyTrashed()->find($id)->forceDelete();

        return;
    }

    public function restoreUser($id): void
    {
        $this->model()->withTrashed()->find($id)->restore();

        return;
    }
}
