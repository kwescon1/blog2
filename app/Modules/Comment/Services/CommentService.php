<?php

namespace App\Modules\Comment\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Comment\Contracts\CommentServiceInterface;
use App\Modules\Comment\Contracts\CommentRepositoryInterface;


class CommentService extends CoreService implements CommentServiceInterface
{
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function store($data): Model
    {
        return $this->commentRepository->create($data);
    }

    public function index($id): ?Collection
    {
        return $this->commentRepository->index($id);
    }

    private function cacheComment($cacheKey, $duration, $query)
    {
        return Cache::remember($cacheKey, $duration, function () use ($query) {
            return $query;
        });
    }
}
