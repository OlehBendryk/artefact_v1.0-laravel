<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.moderation.permissions.index')
            ->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.moderation.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create(['name' => Str::lower($request->get('name'))]);
        return redirect()->route('permission.show', $permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('admin.moderation.permissions.show')
            ->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.moderation.permissions.edit')
            ->with('permission', $permission);

    }

    /**
     * Update the specified resource in storage
     *
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->name = $request->get('name');
        $permission->update(['name' => $request->get('name')]);

        return redirect()->route('permission.show', $permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        if ($permission->roles()->count())  {
            return redirect()->back()->with('error', 'Помилка! Permission привязаний до Role');
        }
        $permission->delete();

        return redirect()->route('permission.index')->with('success', 'Permission успішно видалено');


    }
}

