<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeratorPostMiddleware
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
        $userId = Auth::user()->id;
        $userRole =Auth::user()->roles->first()->name;
        $userSubDomain = Auth::user()->subdomain_id;

        if ($userRole === 'journalist'){
            Post::addGlobalScope('modpost_scope', function (Builder $builder) use($userId) {
                $builder->where('moderator_id', '=', $userId);
            });
        } elseif ($userRole === 'admin'){
            Post::addGlobalScope('adminpost_scope', function (Builder $builder) use($userSubDomain) {
                $builder->where('subdomain_id', '=', $userSubDomain);
            });
        }

        return $next($request);
    }
}
