<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

trait OverrideRegistersUsers
{
    // use RedirectsUsers;

    use RegistersUsers {
        RegistersUsers::showRegistrationForm as registerationForm;

        RegistersUsers::register as registerUser;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */

    public function registrationForm()
    {
        // $this->showRegistrationForm();

        return view('backend.auth.signup');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function registerUser(Request $request)
    {
        // $this->register();

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->back()->with("success", "User registered successfully");;
    }
}
