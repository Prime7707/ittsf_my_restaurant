<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
	public function dashboardIndex(): View
	{
		$title = "Admin Dashboard";
		return View('backend.pages.dashboard', compact('title'));
	}

	public function profileIndex(): View
	{
		$user = Auth::user();
		$title = "Edit-Personal Info | ($user->username)";
		return view('backend.pages.personal_info', compact('title', 'user'));
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

	public function userManagement(): View
	{
		$users = User::get()->all();
		$title = "User Management";
		return View('backend.pages.user_management', compact('title', 'users'));
	}

	public function userAdd(Request $request): RedirectResponse
	{
		$request->validate([
			'username' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
			'first_name' => ['nullable', 'string'],
			'last_name' => ['nullable', 'string'],
			'display_name' => ['nullable', 'string'],
			'phone' => ['nullable', 'string'],
		]);

		$user = User::create([
			'username' => $request->username,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'display_name' => $request->display_name,
			'phone' => $request->phone,
			'role' => Str::lower($request->role),
			'status' => $request->status,
		]);

		event(new Registered($user));

		return redirect()->back();
	}
	public function userUpdate(Request $request, User $userid): RedirectResponse
	{
		$request->validate([
			'username' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
			'first_name' => ['nullable', 'string'],
			'last_name' => ['nullable', 'string'],
			'display_name' => ['nullable', 'string'],
			'phone' => ['nullable', 'string'],
		]);

		$user = User::where()->update([
			'username' => $request->username,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'display_name' => $request->display_name,
			'phone' => $request->phone,
			'role' => Str::lower($request->role),
			'status' => $request->status,
		]);

		event(new Registered($user));

		return redirect()->back();
	}
}
