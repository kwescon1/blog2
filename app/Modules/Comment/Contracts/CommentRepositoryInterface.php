<?php

namespace App\Modules\Comment\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface CommentRepositoryInterface
{
    public function index($id): ?Collection;
}
