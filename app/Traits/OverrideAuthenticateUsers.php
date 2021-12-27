<?php

namespace App\Traits;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

trait OverrideAuthenticateUsers
{
    // use RedirectsUsers;

    use AuthenticatesUsers {
        AuthenticatesUsers::showLoginForm as signInForm;
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function signInForm()
    {
        return view('backend.auth.signin');
    }
}
