@extends('backend.layouts.dashboard_layout')

@section('title',$title)

@section('content')
<div class="bg-frontend-dark-7 text-frontend-dark-2 tracking-wider flex flex-col min-h-[80vh] max-h-10 my-16 mx-3 xsm:mx-10">
	<!-- User Management Header -->
	<div class="flex gap-2 justify-between items-center bg-frontend-dark-8 pl-4 pr-3 py-2 lg:pr-4 rounded-[40px] whitespace-nowrap">
		<h1 class="xsm:py-2 text-[14px] xsm:text-[17px] md:text-2xl xsm:tracking-wider font-bold text-frontend-highlight-4 transition-all">User Management</h1>
		<button onclick="openUserForm('addUserFormModel')" class="btnStyle px-2 py-1 xsm:px-3 xsm:py-2 md:px-5 md:py-2 text-[12px] xsm:text-[14px] md:text-[17px] rounded-full transition-all">
			Add User
		</button>
	</div>


	<!-- Add User Form Modal -->
	<div id="addUserFormModel" class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center">
		<div class="bg-frontend-dark-9 w-full max-w-2xl mx-auto rounded-xl shadow-lg p-6 relative">

			<!-- Close Button -->
			<button onclick="closeUserForm('addUserFormModel')" class="absolute top-4 right-4 text-frontend-dark-3 hover:text-red-400 text-xl font-bold">
				&times;
			</button>

			<h2 class="text-xl font-bold text-frontend-highlight-4 mb-6">Add New User</h2>

			<form action="{{route('admin.dashboard.user_management.addUser')}}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
				@csrf

				<!-- Username -->
				<div>
					<label class="block text-sm mb-1">Username</label>
					<input type="text" name="username" required class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Email -->
				<div>
					<label class="block text-sm mb-1">Email</label>
					<input type="email" name="email" required class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- First Name -->
				<div>
					<label class="block text-sm mb-1">First Name</label>
					<input type="text" name="first_name" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Last Name -->
				<div>
					<label class="block text-sm mb-1">Last Name</label>
					<input type="text" name="last_name" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Display Name -->
				<div class="md:col-span-2">
					<label class="block text-sm mb-1">Display Name</label>
					<input type="text" name="display_name" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Phone -->
				<div class="md:col-span-2">
					<label class="block text-sm mb-1">Phone</label>
					<input type="tel" name="phone" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Password -->
				<div>
					<label for="password" class="block text-sm font-medium mb-1">Password</label>
					<div class="relative">
						<input type="password" id="password" name="password" required class="w-full pr-10 bg-frontend-dark-6 border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
						<button type="button" onclick="togglePassword('password', 'eyeNew')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
							<svg id="eyeNew" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
						</button>
					</div>
				</div>

				<!-- Confirm Password -->
				<div>
					<label for="password_confirmation" class="block text-sm font-medium mb-1">Confirm Password</label>
					<div class="relative">
						<input type="password" id="password_confirmation" name="password_confirmation" required class="w-full pr-10 bg-frontend-dark-6 border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
						<button type="button" onclick="togglePassword('password_confirmation', 'eyeConfirm')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
							<svg id="eyeConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
						</button>
					</div>
				</div>

				<!-- Role -->
				<div>
					<label class="block text-sm mb-1">Role</label>
					<select name="role" required class="w-full bg-frontend-dark-7 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</div>

				<!-- Status -->
				<div>
					<label class="block text-sm mb-1">Status</label>
					<select name="status" required class="w-full bg-frontend-dark-7 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
						<option value="1">Active</option>
						<option value="0">Disabled</option>
					</select>
				</div>

				<!-- Submit -->
				<div class="md:col-span-2 mt-4">
					<button type="submit" class="w-full btnStyle py-2 rounded-full transition">
						Create User
					</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Edit User Form Model -->
	<div id="editUserFormModel" class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center">
		<div class="bg-frontend-dark-9 w-full max-w-2xl mx-auto rounded-xl shadow-lg p-6 relative">

			<!-- Close Button -->
			<button onclick="closeUserForm('editUserFormModel')" class="absolute top-4 right-4 text-frontend-dark-3 hover:text-red-400 text-xl font-bold">
				&times;
			</button>

			<h2 class="text-xl font-bold text-frontend-highlight-4 mb-6">Add New User</h2>

			<form action="" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
				@csrf

				<!-- Username -->
				<div>
					<label class="block text-sm mb-1">Username</label>
					<input type="text" name="username" required class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Email -->
				<div>
					<label class="block text-sm mb-1">Email</label>
					<input type="email" name="email" required class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- First Name -->
				<div>
					<label class="block text-sm mb-1">First Name</label>
					<input type="text" name="first_name" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Last Name -->
				<div>
					<label class="block text-sm mb-1">Last Name</label>
					<input type="text" name="last_name" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Display Name -->
				<div class="md:col-span-2">
					<label class="block text-sm mb-1">Display Name</label>
					<input type="text" name="display_name" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Phone -->
				<div class="md:col-span-2">
					<label class="block text-sm mb-1">Phone</label>
					<input type="tel" name="phone" class="w-full bg-frontend-dark-7 border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
				</div>

				<!-- Password -->
				<div>
					<label for="password" class="block text-sm font-medium mb-1">Password</label>
					<div class="relative">
						<input type="password" id="password" name="password" required class="w-full pr-10 bg-frontend-dark-6 border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
						<button type="button" onclick="togglePassword('password', 'eyeNew')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
							<svg id="eyeNew" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
						</button>
					</div>
				</div>

				<!-- Confirm Password -->
				<div>
					<label for="password_confirmation" class="block text-sm font-medium mb-1">Confirm Password</label>
					<div class="relative">
						<input type="password" id="password_confirmation" name="password_confirmation" required class="w-full pr-10 bg-frontend-dark-6 border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition">
						<button type="button" onclick="togglePassword('password_confirmation', 'eyeConfirm')" class="absolute inset-y-0 right-2 flex items-center text-frontend-dark-4 hover:text-frontend-highlight-4">
							<svg id="eyeConfirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
							</svg>
						</button>
					</div>
				</div>

				<!-- Role -->
				<div>
					<label class="block text-sm mb-1">Role</label>
					<select name="role" required class="w-full bg-frontend-dark-7 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</div>

				<!-- Status -->
				<div>
					<label class="block text-sm mb-1">Status</label>
					<select name="status" required class="w-full bg-frontend-dark-7 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:ring-2 focus:ring-frontend-highlight-4">
						<option value="1">Active</option>
						<option value="0">Disabled</option>
					</select>
				</div>

				<!-- Submit -->
				<div class="md:col-span-2 mt-4">
					<button type="submit" class="w-full btnStyle py-2 rounded-full transition">
						Create User
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
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

<script>
	function openUserForm(inputId) {
    document.getElementById(inputId).classList.remove('hidden');
    document.getElementById(inputId).classList.add('flex');
  }

  function closeUserForm(inputId) {
    document.getElementById(inputId).classList.remove('flex');
    document.getElementById(inputId).classList.add('hidden');
  }
</script>
@endsection