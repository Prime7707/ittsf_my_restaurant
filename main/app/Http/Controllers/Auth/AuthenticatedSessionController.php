<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
	/**
	 * Display the login view.
	 */
	// public function create(): View
	// {
	//     return view('auth.login');
	// }
	public function login(): View
	{
		$title = "Login";
		return view('frontend.pages.auth.login', compact('title'));
	}

	/**
	 * Handle an incoming authentication request.
	 */
	public function loginAttempt(LoginRequest $request): RedirectResponse
	{
		$request->authenticate();
		$request->session()->regenerate();
		if (Auth::user()->role == 'admin') {
			return redirect()->intended(route('admin.dashboard', absolute: false));
		} else {
			return redirect()->intended(route('user.dashboard', absolute: false));
		}
	}

	/**
	 * Destroy an authenticated session.
	 */
	public function logoutAttempt(Request $request): RedirectResponse
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect(route('login'));
	}
}
