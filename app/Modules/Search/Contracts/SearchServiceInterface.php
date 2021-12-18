<?php

namespace App\Modules\Search\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface SearchServiceInterface
{
    public function index($data): ?\Illuminate\Pagination\LengthAwarePaginator;
}
