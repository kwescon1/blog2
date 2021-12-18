<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Modules\Roles\Contracts\RoleServiceInterface;
use App\Modules\Permissions\Contracts\PermissionServiceInterface;

class RoleController extends Controller
{
    private $roleService;
    private $permissionService;

    public function __construct(RoleServiceInterface $roleService, PermissionServiceInterface $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;


        $this->middleware('categories');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = $this->roleService->index();

        $trashedRoles = $this->roleService->trashedRoles();

        $permissions = $this->permissionService->index();

        return  view('backend.roles', compact('roles', 'trashedRoles', 'permissions'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //
        $data = $request->validated();

        $store = $this->roleService->store($data);

        return redirect()->back()->with("success", "Role: $store->name Successfully Added");
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
        $data = $this->roleService->edit($id);

        return redirect()->back()->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        //
        $data = $request->validated();

        $this->roleService->update($data, $id);

        return redirect()->back()->with("success", "Role Successfully Updated");
        //
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDeleteRole($id)
    {
        $this->roleService->softDeleteRole($id);

        return redirect()->back()->with("success", "Role Soft Deleted Successfully");
    }

    public function restoreRole($id)
    {
        $this->roleService->restoreRole($id);

        return redirect()->back()->with("success", "Role Restored Successfully");
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
        $this->roleService->destroy($id);

        return redirect()->back()->with("success", "Role Permanently Deleted");
    }
}
