<?php

namespace App\Http\Controllers\Subdomains;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubdomainRequest;
use App\Models\Subdomain;
use Illuminate\Http\Request;

class SubdomainsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $subdomains = Subdomain::all();

        return view('admin.moderation.subdomains.index')
            ->with('subdomains', $subdomains);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.moderation.subdomains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SubdomainRequest $request)
    {
        $subdomain = new Subdomain();
        $subdomain->name = $request->get('name');
        $subdomain->subdomain = $request->get('subdomain');
        $subdomain->status = true;
        $subdomain->save();

        return redirect()->route('subdomain.show', $subdomain);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Subdomain $subdomain)
    {
        return view('admin.moderation.subdomains.show')
            ->with('subdomain', $subdomain);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Subdomain $subdomain)
    {
        return view('admin.moderation.subdomains.edit')
            ->with('subdomain', $subdomain);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SubdomainRequest $request, Subdomain $subdomain)
    {
        $subdomain->name = $request->get('name');
        $subdomain->subdomain = $request->get('subdomain');
        $subdomain->save();

        return redirect()->route('subdomain.show', $subdomain);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Subdomain $subdomain)
    {
        if ($subdomain->users()->exists()) {
            return back()->with('error', "To # {$subdomain->id} domain attach users");
        }
        $subdomain->delete();

        return redirect()->route('subdomain.index');
    }

    public function toggle(Subdomain $subdomain)
    {
        if ($subdomain->status === 'enable' ? $subdomain->status = 'disable' : $subdomain->status = 'enable')
        $subdomain->save();

        return redirect()->back()->with('success', "Subdomain {$subdomain->name} is {$subdomain->status}");
    }
}

