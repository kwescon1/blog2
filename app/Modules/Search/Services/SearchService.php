<?php

namespace App\Modules\Search\Services;

use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Post\Contracts\PostRepositoryInterface;
use App\Modules\Search\Contracts\SearchServiceInterface;




class SearchService extends CoreService implements SearchServiceInterface
{

    private $searchPost;


    public function __construct(PostRepositoryInterface $searchPost)
    {
        $this->searchPost = $searchPost;
    }

    public function index($data): ?\Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->searchPost->search($data);
    }
}
