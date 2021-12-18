<?php

namespace App\Modules\Comment\Repositories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Comment\Contracts\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    public function index($id): ?Collection
    {
        return $this->model()->latest()->where('post_id', $id)->get();
    }
}
