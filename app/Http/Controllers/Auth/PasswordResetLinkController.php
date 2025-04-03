<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ParentModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {     
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $guard = $this->determineGuard($request->email);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::broker($guard)->sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }


      /**
     * Determine if the email belongs to a parent or user guard.
     *
     * @param  string  $email
     * @return string
     */
    private function determineGuard($email)
    {
        // You can customize this logic to check the email against specific tables, etc.
        if (ParentModel::where('email', $email)->exists()) {
            return 'parents';  // This is for the 'parents' guard
        }

        return 'users';  // Default to 'users' guard
    }



















}
