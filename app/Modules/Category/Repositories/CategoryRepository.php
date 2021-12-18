<?php

namespace App\Modules\Category\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Category\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function trashedCategories(): ?Collection
    {
        return $this->model()->onlyTrashed()->latest()->get();
    }

    public function destroy($id): void
    {
        $this->model()->onlyTrashed()->find($id)->forceDelete();

        return;
    }

    public function restoreCat($id): void
    {
        $this->model()->withTrashed()->find($id)->restore();

        return;
    }
}
