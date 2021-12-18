<?php

namespace App\Modules\Contact\Repositories;

use App\Models\ContactUs;
use App\Modules\Base\Repositories\BaseRepository;
use App\Modules\Contact\Contracts\ContactUsRepositoryInterface;

class ContactUsRepository extends BaseRepository implements ContactUsRepositoryInterface
{
    public function __construct(ContactUs $model)
    {
        parent::__construct($model);
    }

    public function notifications()
    {
        return $this->model()->latest()->get();
    }
}
