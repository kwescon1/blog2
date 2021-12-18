<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\EditUserRequestAdmin;
use App\Http\Requests\ChangePasswordRequest;
use App\Modules\User\Contracts\UserServiceInterface;
use App\Modules\Roles\Contracts\RoleServiceInterface;


class UserController extends Controller
{
    private $userService;
    private $roleService;

    public function __construct(UserServiceInterface $userService, RoleServiceInterface $roleService)
    {
        $this->middleware('categories')->except(['show', 'changePassword', 'editProfile']);

        $this->userService = $userService;
        $this->roleService = $roleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $users = $this->userService->index();

        $roles = $this->roleService->index();

        $trashedUsers = $this->userService->trashedUsers();

        return  view('backend.users', compact('users', 'trashedUsers', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = $this->userService->edit($id);

        return redirect()->back()->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequestAdmin $request, $id)
    {
        //
        $data = $request->validated();

        $this->userService->update($data, $id);

        return redirect()->back()->with("success", "User Successfully Updated");
        //
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDeleteUser($id)
    {
        $this->userService->softDeleteUser($id);

        return redirect()->back()->with("success", "User Soft Deleted Successfully");
    }

    public function restoreUser($id)
    {
        $this->userService->restoreUser($id);

        return redirect()->back()->with("success", "User Restored Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->userService->destroy($id);

        return redirect()->back()->with("success", "User Permanently Deleted");
    }

    public function changePassword()
    {
        return view('backend.change-password');
    }

    public function storePassword(ChangePasswordRequest $request, $id)
    {
        $data = $request->validated();

        $change = $this->userService->storePassword($data, $id);

        if ($change !== "error") {
            return redirect()->back()->with('success', 'Password successfully changed');
        } else {
            return redirect()->back()->with("error", "Current Password Does Not Match");
        }
    }

    public function editProfile($id)
    {
        if (auth()->user()->id != $id) {
            abort(404);
        }

        $user = $this->userService->show($id);

        return view('backend.edit-profile', ['user' => $user]);
    }

    public function storeProfile(EditProfileRequest $request)
    {

        $data = $request->validated();

        $this->userService->updateProfile($data);

        return redirect()->back()->with('success', "Your profile has been successfully updated");
    }
}
