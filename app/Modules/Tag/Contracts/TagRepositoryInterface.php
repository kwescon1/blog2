<?php

namespace App\Modules\Tag\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface TagRepositoryInterface
{
    public function createTag($tag): ?Model;

    public function attachTags(array $data);
}
