<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ParentModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        Log::info('Parent guard authenticated:', ['status' => Auth::guard('parent')->check()]);
        Log::info('Web guard authenticated:', ['status' => Auth::guard('web')->check()]);
        

        return Auth::guard('parent')->check() ? redirect()->intended(route('parent.student_login')) : redirect()->intended(route('dashboard')); 
      // $request->session()->regenerate();

       // return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {  

        Log::info('Parent guard authenticated:', ['status' => Auth::guard('parent')->check()]);
        Log::info('Web guard authenticated:', ['status' => Auth::guard('web')->check()]);
        

        if(Auth::guard('web')->check()){
           
            Auth::guard('web')->logout();

        }
        

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function destroyParent(Request $request): RedirectResponse
    {
        
        Log::info('Parent guard authenticated:', ['status' => Auth::guard('parent')->check()]);
        Log::info('Web guard authenticated:', ['status' => Auth::guard('web')->check()]);
        

        if (Auth::guard('parent')->check()) {
            Auth::guard('parent')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to home page
    }


    

}
