<?php

namespace App\Modules\Category\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function trashedCategories(): ?Collection;

    public function destroy($id): void;

    public function restoreCat($id): void;
}
