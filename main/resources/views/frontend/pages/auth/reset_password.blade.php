@extends('frontend.layouts.main_layout')

@section('title',$title)

@section('content')
{{-- Input Form Start--}}
<main class="min-h-screen bg-frontend-dark-8 flex items-center justify-center px-4 py-12 text-frontend-dark-2">
	<div class="w-full max-w-md bg-frontend-dark-9 p-8 rounded-2xl shadow-lg">
		<h2 class="text-2xl font-bold text-frontend-highlight-4 text-center mb-6">Reset Your Password</h2>

		<form method="POST" action="{{ route('password.store') }}" class="space-y-5">
			@csrf

			<!-- Hidden Token Field -->
			<input type="hidden" name="token" value="{{ request()->route('token') }}">

			<!-- Email -->
			<div>
				<input type="hidden" name="email" id="email" required value="{{ old('email', request()->email) }}" class="w-full px-4 py-2 rounded-md bg-frontend-dark-7 text-white border border-frontend-dark-6 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
			</div>

			<!-- New Password -->
			<div>
				<label for="password" class="block text-sm font-medium text-frontend-dark-2 mb-1">Password</label>
				<div class="relative">
					<input type="password" name="password" id="password" required class="w-full px-4 py-2 pr-10 rounded-md bg-frontend-dark-7 text-white border border-frontend-dark-6 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 focus:border-transparent transition">
					<button type="button" onclick="togglePassword('password', 'eye1')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
						<svg id="eye1" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
						</svg>
					</button>
				</div>
			</div>

			<!-- Confirm Password -->
			<div>
				<label for="password_confirmation" class="block text-sm font-medium text-frontend-dark-2 mb-1">Confirm Password</label>
				<div class="relative">
					<input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 pr-10 rounded-md bg-frontend-dark-7 text-white border border-frontend-dark-6 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 focus:border-transparent transition">
					<button type="button" onclick="togglePassword('password_confirmation', 'eye2')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
						<svg id="eye1" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
						</svg>
					</button>
				</div>
			</div>

			<!-- Submit Button -->
			<div class="pt-3">
				<button type="submit" class="w-full bg-frontend-highlight-4 text-frontend-dark-9 font-semibold py-2 rounded-full hover:bg-frontend-highlight-3 transition">
					Reset Password
				</button>
			</div>
		</form>
	</div>
</main>

{{-- Input Form End--}}

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