<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'username' => ['required', 'string'],
			'password' => ['required', 'string'],
		]);
	}
	protected function credentials(array $data)
	{
		$username = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		return [
			$username => $data['username'],
			'password' => $data['password']
		];
	}
	public function loginAttempt(Request $request): RedirectResponse
	{
		$validator = $this->validator($request->all());
		if ($validator->fails()) {
			$errMessages = [];
			foreach ($validator->errors()->messages() as $key => $msg) {
				$errMessages[] = $msg[0];
			}
			$errorsOut = "<ul style=\"list-style:none;padding:0;margin:0\">";
			foreach ($errMessages as $errMsg) {
				$errorsOut .= "<li>" . $errMsg . "</li>";
			}
			$errorsOut .= "</ul>";
			$notification = [
				// 'title' => 'Error',
				'message' => $errorsOut,
				'alert_type' => 'error',
			];
			return redirect()->back()->withErrors($validator)->with($notification);
		}

		$credentials = $this->credentials($request->all());
		$user = User::where(array_keys($credentials)[0], array_values($credentials)[0])->first();
		if ($user) {
			if ($user->status == 0) {
				$notification = [
					// 'title' => 'Status',
					'message' => "User is Disabled",
					'alert_type' => 'error'
				];
				return redirect()->back()->with($notification);
			}
			if (Auth::guard('web')->attempt($credentials, (bool) $request['remember'])) {
				$request->session()->regenerate();
				$notification = [
					// 'title' => 'Status',
					'message' => "Logged in Successfully",
					'alert_type' => 'success'
				];
				if (Auth::user()->role == 'admin') {
					return redirect()->intended(route('admin.dashboard'))->with($notification);
				} else {
					return redirect()->intended(route('user.dashboard'))->with($notification);
				}
			}
		}
		$notification = [
			'title' => 'Status',
			'message' => "Incorrect Username or Password",
			'alert_type' => 'error'
		];
		return redirect()->back()->with($notification);
	}
	/**
	 * Destroy an authenticated session.
	 */
	public function logoutAttempt(Request $request): RedirectResponse
	{
		Auth::guard('web')->logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		$notification = [
			// 'title' => 'Status',
			'message' => "Logged Out Successfully",
			'alert_type' => 'success'
		];
		return redirect(route('login'))->with($notification);
	}
}
