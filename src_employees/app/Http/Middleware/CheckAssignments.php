<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAssignments
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$positions): Response
    {
        $user = User::where('id', Auth::user()->id)
            ->with('assignments', function($query) {
                $query->with('positions');
            })
            ->first();

        foreach ($user->assignments AS $assignment) {
            foreach ($assignment->positions AS $position) {
                if (in_array($position->id, $positions)) {
                    return $next($request);
                }
            }
        }

        return response()->json(['error' => 'Permission denied'], 403);
    }
}
