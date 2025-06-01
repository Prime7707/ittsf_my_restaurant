@extends('frontend.layouts.main_layout')

@section('title',$title)

@section('content')

<main class="min-h-screen bg-frontend-dark-8 text-frontend-dark-2 flex items-center justify-center px-4 py-12">
	<div class="max-w-lg bg-frontend-dark-9 p-8 rounded-2xl shadow-lg text-center">
		<h1 class="text-3xl font-bold text-frontend-highlight-4 mb-4">Verify Your Email Address</h1>

		@if (session('status') === 'verification-link-sent')
		<div class="mb-4 text-green-400 font-semibold">
			A new verification link has been sent to your email address.
		</div>
		@endif

		<p class="mb-6 text-frontend-dark-3">
			Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you.
			If you didn’t receive the email, we’ll gladly send you another.
		</p>

		<form method="POST" action="{{ route('verification.send') }}" class="mb-4">
			@csrf
			<button type="submit" class="bg-frontend-highlight-4 hover:bg-frontend-highlight-3 text-frontend-dark-9 font-semibold px-6 py-2 rounded-full transition">
				Resend Verification Email
			</button>
		</form>

		<form method="POST" action="{{ route('logout') }}">
			@csrf
			<button class="text-sm text-gray-400 hover:text-red-400 underline" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
				Logout
			</button>
		</form>
	</div>
</main>

@endsection

@section('scripts')

@endsection