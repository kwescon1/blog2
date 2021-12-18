<?php

namespace App\Modules\Contact\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ContactUsServiceInterface
{
    public function store(array $data): void;

    public function notifications();
}
