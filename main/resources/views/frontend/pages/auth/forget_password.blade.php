@extends('frontend.layouts.main_layout')

@section('title',$title)

@section('content')
{{-- Input Form Start--}}
<section class="min-h-screen bg-frontend-dark-8 text-frontend-dark-2 flex items-center justify-center px-4 py-12">
	<div class="w-full max-w-md bg-frontend-dark-9 p-8 rounded-xl shadow-md">
		<h2 class="text-2xl font-bold text-frontend-highlight-4 mb-4 text-center">
			Forgot Your Password?
		</h2>
		<p class="text-sm text-center mb-6 text-frontend-dark-3">
			Enter your email address and we’ll send you a link to reset your password.
		</p>

		<form method="POST" action="{{ route('password.email') }}" class="space-y-5">
			@csrf

			<!-- Email Field -->
			<div>
				<label for="email" class="block text-sm font-medium mb-1">Email Address</label>
				<input type="email" id="email" name="email" required class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
			</div>

			<!-- Submit Button -->
			<div>
				<button type="submit" class="w-full btnStyle py-2 px-4 rounded-full">
					Send Password Reset Link
				</button>
			</div>
		</form>

		<!-- Back to Login -->
		<div class="mt-6 text-sm text-center">
			<a href="{{ route('login') }}" class="text-frontend-highlight-4 hover:underline">
				Back to Login
			</a>
		</div>
	</div>
</section>
{{-- Input Form End--}}

@endsection

@section('scripts')

@endsection