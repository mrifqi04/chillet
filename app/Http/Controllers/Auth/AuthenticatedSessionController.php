<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

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
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = request(['email', 'password']);

        $request->authenticate();

        $request->session()->regenerate();

        $token = JWTAuth::attempt($credentials);
        $request->session()->put('token', $token);

        if (Auth::user()->role_id == 1) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('homepage');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
