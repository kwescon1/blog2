<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Contact\Contracts\ContactUsServiceInterface;

class NotificationController extends Controller
{
    //
    public function __construct(ContactUsServiceInterface $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }

    public function contactUs()
    {

        return $this->contactUsService->notifications();


        // $unread = collect($notifications)->filter(function ($payload) {
        //     $payload->isOpened != 1;
        // });


    }
}
