@extends('frontend.layouts.main_layout')

@section('title',$title)

@section('content')

<main class="min-h-screen bg-frontend-dark-8 flex items-center justify-center px-4">
	<div class="w-full max-w-md bg-frontend-dark-9 p-8 rounded-2xl shadow-lg">
		<h2 class="text-3xl font-bold text-frontend-highlight-4 text-center mb-6">Login to Foodie Haven</h2>

		<form method="POST" action="{{ route('login') }}" class="space-y-5">
			@csrf
			<!-- Email -->
			<div>
				<label for="email" class="block text-sm font-medium text-frontend-dark-2 mb-1">Email Address</label>
				<input type="email" name="email" id="email" required class="w-full px-4 py-2 rounded-md bg-frontend-dark-7 text-white border border-frontend-dark-6 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 focus:border-transparent transition" autofocus>
			</div>

			<!-- Password -->
			<div>
				<label for="password" class="block text-sm font-medium text-frontend-dark-2 mb-1">Password</label>
				<div class="relative">
					<input type="password" name="password" id="password" required class="w-full px-4 py-2 rounded-md bg-frontend-dark-7 text-white border border-frontend-dark-6 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 focus:border-transparent transition pr-10">
					<button type="button" onclick="togglePassword('password', 'eye1')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
						<svg id="eye1" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
						</svg>
					</button>
				</div>
			</div>

			<!-- Remember Me & Forgot -->
			<div class="flex items-center justify-between text-sm text-frontend-dark-4">
				<label class="flex items-center space-x-2">
					<input type="checkbox" name="remember" class="accent-frontend-highlight-4">
					<span>Remember me</span>
				</label>
				<a href="{{ route('password.request') }}" class="hover:text-frontend-highlight-4">Forgot Password?</a>
			</div>

			<!-- Submit Button -->
			<div class="pt-3">
				<button type="submit" class="w-full btnStyle py-2 rounded-full transition-all duration-150 ease-linear">
					Login
				</button>
			</div>
		</form>

		<!-- Divider -->
		<div class="mt-6 text-center text-sm text-gray-400">
			Don’t have an account?
			<a href="{{ route('register') }}" class="text-frontend-highlight-4 hover:underline">Sign up</a>
		</div>
	</div>
</main>

@endsection

@section('scripts')
<!-- Toggle password script Start-->
<script>
	function togglePassword(inputId, iconId) {
		const input = document.getElementById(inputId);
		const icon = document.getElementById(iconId);
		
		if (input.type === 'password') {
			input.type = 'text';
			icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.975 9.975 0 013.347-4.486m4.27-2.07A9.935 9.935 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.972 9.972 0 01-1.357 2.572M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18"/>`;
		} else {
			input.type = 'password';
			icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
		}
	}
</script>
<!-- Toggle password script Start-->
@endsection