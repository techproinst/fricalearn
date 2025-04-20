<?php

namespace App\Http\Middleware;

use App\Services\ParentService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStudentHasActiveSubscription
{  
    public function __construct(public ParentService $parentService)
    {
        
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $students = $this->parentService->handleGetParentKids();

        $hasActiveSubscription = $students->contains(function ($student) {
            $student->activeSubscriptions()->exists();
        } );


            
        if(!$hasActiveSubscription){

            return redirect()->route('parent.dashboard');
        }



        return $next($request);
    }
}
