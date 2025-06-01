<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
	/**
	 * Display the email verification prompt.
	 */
	public function __invoke(Request $request): RedirectResponse|View
	{
		$title='Verify Email';
		return $request->user()->hasVerifiedEmail() ? redirect()->intended(route('user.dashboard', absolute: false)) : view('frontend.pages.auth.verify-email',compact('title'));
	}
}
