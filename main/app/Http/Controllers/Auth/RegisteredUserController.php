<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
	/**
	 * Display the registration view.
	 */
	public function register(): View
	{
		$title = "Sign Up";
		return view('frontend.pages.auth.register', compact('title'));
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'username' => ['required', 'string', 'max:100', 'unique:users,username'],
			'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email'],
			'password' => ['required', 'string', 'min:5', 'confirmed'],
		]);
	}
	public function registerAttempt(Request $request): RedirectResponse
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
				'title' => 'Error',
				'message' => $errorsOut,
				'alert_type' => 'error',
			];
			return redirect()->back()->withErrors($validator)->with($notification);
		}

		$user = User::create([
			'username' => $request->username,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);

		event(new Registered($user));

		Auth::login($user);

		return redirect(route('user.dashboard', absolute: false));
	}
}
