<?php

namespace App\Modules\Contact\Services;

use App\Modules\Base\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\Contact\Contracts\ContactUsServiceInterface;
use App\Modules\Contact\Contracts\ContactUsRepositoryInterface;

class ContactUsService extends CoreService implements ContactUsServiceInterface
{

    private $contactUsRepository;

    public function __construct(ContactUsRepositoryInterface $contactUsRepository)
    {
        $this->contactUsRepository = $contactUsRepository;
    }


    public function store(array $data): void
    {
        $this->contactUsRepository->create($data);

        return;
    }

    public function notifications()
    {
        $notifcations = $this->contactUsRepository->notifications();

        $count = $notifcations->where('isOpened', false)->count();

        $display = $notifcations->take(8);

        return ["count" => $count, "display" => $display];
    }
}
