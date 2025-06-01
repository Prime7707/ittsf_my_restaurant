@extends('backend.layouts.dashboard_layout')

@section('title',$title)

@section('content')
<section class="bg-frontend-dark-7 text-frontend-dark-2 flex flex-col items-center justify-center px-4 py-12">
	<div class="max-w-2xl bg-frontend-dark-8 p-8 rounded-xl shadow-md mb-16">
		<h2 class="text-2xl font-bold text-frontend-highlight-4 mb-6">Edit Personal Info</h2>

		<form method="POST" action="{{ route('admin.dashboard.personal_info') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
			@csrf
			@method('PUT')

			<!-- First Name -->
			<div class="col-span-1 min-w-[230px] md:min-w-[200px]">
				<label for="first_name" class="block text-sm font-medium mb-1">First Name</label>
				<input type="text" id="first_name" name="first_name" required class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->first_name}}">
			</div>

			<!-- Last Name -->
			<div class="col-span-1 min-w-[230px] md:min-w-[200px]">
				<label for="last_name" class="block text-sm font-medium mb-1">Last Name</label>
				<input type="text" id="last_name" name="last_name" required class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->last_name}}">
			</div>

			<!-- Display Name -->
			<div class="col-span-1 md:col-span-2 min-w-[230px] md:min-w-[400px]">
				<label for="display_name" class="block text-sm font-medium mb-1">Display Name</label>
				<input type="text" id="display_name" name="display_name" class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->display_name}}">
			</div>

			<!-- Phone Number -->
			<div class="col-span-1 md:col-span-2 min-w-[230px] md:min-w-[400px]">
				<label for="phone" class="block text-sm font-medium mb-1">Phone Number</label>
				<input type="tel" id="phone" name="phone" class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->phone}}">
			</div>

			<!-- Submit Button -->
			<div class="col-span-1 md:col-span-2 min-w-[230px] md:min-w-[400px] mt-4">
				<button type="submit" class="w-full md:w-auto btnStyle px-6 py-2 rounded-full transition">
					Save Changes
				</button>
			</div>
		</form>
	</div>
	<div class="max-w-2xl bg-frontend-dark-8 p-8 rounded-xl shadow-md mb-16">
		<h2 class="text-2xl font-bold text-frontend-highlight-4 mb-6">Update Password</h2>

		<form method="POST" action="{{ route('admin.dashboard.security') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
			@csrf
			@method('PUT')

			<!-- Old Password -->
			<div class="col-span-1 md:col-span-2 min-w-[230px] md:min-w-[450px]">
				<label for="current_password" class="block text-sm font-medium mb-1">Current Password</label>
				<div class="relative">
					<input type="password" id="current_password" name="current_password" required class="w-full pr-10 bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
					<button type="button" onclick="togglePassword('current_password', 'eyeOld')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
						<svg id="eyeOld" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
						</svg>
					</button>
				</div>
			</div>

			<!-- New Password -->
			<div class="col-span-1 md:col-span-2 min-w-[230px] md:min-w-[450px]">
				<label for="password" class="block text-sm font-medium mb-1">New Password</label>
				<div class="relative">
					<input type="password" id="password" name="password" required class="w-full pr-10 bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
					<button type="button" onclick="togglePassword('password', 'eyeNew')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
						<svg id="eyeNew" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
						</svg>
					</button>
				</div>
			</div>

			<!-- Confirm Password -->
			<div class="col-span-1 md:col-span-2 min-w-[230px] md:min-w-[450px]">
				<label for="password_confirmation" class="block text-sm font-medium mb-1">Confirm Password</label>
				<div class="relative">
					<input type="password" id="password_confirmation" name="password_confirmation" required class="w-full pr-10 bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
					<button type="button" onclick="togglePassword('password_confirmation', 'eyeConfirm')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
						<svg id="eyeConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
						</svg>
					</button>
				</div>
			</div>

			<!-- Submit Button -->
			<div>
				<button type="submit" class="w-full md:w-auto btnStyle px-6 py-2 rounded-full transition">
					Update Password
				</button>
			</div>
		</form>
	</div>
</section>

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