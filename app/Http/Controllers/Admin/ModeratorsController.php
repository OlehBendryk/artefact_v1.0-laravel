<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModeratorCreateRequest;
use App\Http\Requests\ModeratorUpdateRequest;
use App\Models\Subdomain;
use App\Models\Moderator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ModeratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $moderators = Moderator::all();
        $subdomains = Subdomain::all();

        return view('admin.moderation.moderators.index')
            ->with('moderators', $moderators)
            ->with('subdomains', $subdomains);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'superadmin')->pluck('name', 'id');

        $subdomains = Subdomain::all()->pluck('name', 'id');

        return view('admin.moderation.moderators.create')
            ->with('roles', $roles)
            ->with('subdomains', $subdomains);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModeratorCreateRequest $request)
    {
        $moderator = DB::transaction(function () use ($request) {

            $password = Hash::make(Str::lower($request->get('password')));

            $moderator = new Moderator();
            $moderator->name = $request->get('name');
            $moderator->email = $request->get('email');
            $moderator->password = $password;
            $moderator->subdomain_id = $request->get('subdomain');
            $moderator->save();

            $moderator->assignRole($request->get('role'));

            return $moderator;
        });

        return redirect()->route('moderator.show', $moderator)
            ->with('success', "Moderator {$moderator->name} was registered");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Moderator $moderator)
    {
        return view('admin.moderation.moderators.show')
            ->with('moderator', $moderator);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Moderator $moderator)
    {
        $roles = Role::where('name', '!=', 'superadmin')->pluck('name', 'id');

        $subdomains = $moderator->subdomain->subdomain;

        return view('admin.moderation.moderators.edit')
            ->with('moderator', $moderator)
            ->with('roles', $roles)
            ->with('subdomains', $subdomains);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ModeratorUpdateRequest $request, Moderator $moderator)
    {

        $moderator->syncRoles([$request->get('role')]);

        return redirect()->route('moderator.show', $moderator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Moderator $moderator)
    {
        if ($moderator->id === Auth::id()) {

            return redirect()->back()
                ->with('error', 'Disable to remove yourself');
        }
        $moderator->delete();

        return redirect()->route('moderator.index')
            ->with('success', "Moderator {$moderator->name} success remove");
    }
}
