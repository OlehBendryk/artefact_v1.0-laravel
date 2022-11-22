<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\Subdomain;
use Closure;
use http\Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SubdomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentSubdomain = $request->route('subdomain') . '.localtest.me';
        $subdomainsArray = Subdomain::all()->pluck('subdomain', 'id')->toArray();

        if (in_array($currentSubdomain, $subdomainsArray)) {
            $subdomain = Subdomain::where('subdomain', $currentSubdomain)->first();

            if ($subdomain['status'] === 'enable'){
                Post::addGlobalScope('posts_scope', function (Builder $builder) use($subdomain) {
                    $builder->where('subdomain_id', '=', $subdomain['id']);
                });
            } else{
                dd('This subdomain does not has posts');
            }
        } else{
            //error page 404
            dd('Such subdomain not found');
        }

        URL::defaults(['subdomain' => request('subdomain')]);

//        $request->route()->forgetParameter('subdomain');

        return $next($request);
    }
}

