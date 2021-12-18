<?php

namespace App\Modules\Comment\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface CommentServiceInterface
{
    public function store($data): Model;
    public function index($id): ?Collection;
}
