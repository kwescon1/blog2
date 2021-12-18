<?php

namespace App\Modules\Tag\Repositories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Tag\Contracts\TagRepositoryInterface;

class TagRepository extends BaseRepository implements TagRepositoryInterface
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function createTag($tag): ?Model
    {
        return $this->model()::firstOrCreate(['name' => $tag]);
    }

    public function attachTags(array $data)
    {
        return $this->model()::whereIn('name', $data)->get()->pluck('id');
    }
}
