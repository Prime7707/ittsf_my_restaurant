<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserDashboardController extends Controller
{
	// protected $theme_prefix = "frontend.dashboard.";
	// return view($this->theme_prefix . 'dashboard', compact('title'));

	public function index(): View
	{
		$title = "Dashboard";
		return view('frontend.pages.dashboard.dashboard', compact('title'));
	}

	public function profileIndex(): View
	{
		$user = Auth::user();
		$title = "Edit-Personal Info | ($user->username)";
		return view('frontend.pages.dashboard.personal_info', compact('title', 'user'));
	}

	public function profileUpdate(Request $request): RedirectResponse
	{
		$validator = Validator::make($request->all(), [
			'first_name' => ['required', 'string'],
			'last_name' => ['required', 'string'],
			'display_name' => ['nullable', 'string'],
			'phone' => ['nullable', 'string'],
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}
		$request->user()->update([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'display_name' => $request->display_name,
			'phone' => $request->phone,
		]);
		return redirect()->back();
	}
	public function securityIndex(): View
	{
		$title = "Security & Privacy";
		return view('frontend.pages.dashboard.security', compact('title'));
	}

	public function passwordUpdate(Request $request): RedirectResponse
	{
		$validated = $request->validateWithBag('updatePassword', [
			'current_password' => ['required', 'current_password'],
			'password' => ['required', Password::defaults(), 'confirmed'],
		]);

		$request->user()->update([
			'password' => Hash::make($validated['password']),
		]);

		return back()->with('status', 'password-updated');
	}
}
