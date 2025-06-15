{{-- <aside class="hidden w-0 md:block md:fixed md:w-64 bg-frontend-dark-8 min-h-screen md:p-6 transition-all duration-200 origin-left ease-linear">
	<div class="max-h-screen ">
		<div class="text-xl font-bold text-frontend-highlight-4 mb-6">Hi, {{ Auth::user()->display_name ?? 'Admin' }}</div>
		<nav class="space-y-4 text-xl font-bold mt-20">
			<a href="{{Route('admin.dashboard')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard')])>Dashboard</a>
			<a href="{{Route('admin.dashboard.personal_info')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard.personal_info')])>Personal Info</a>
			<a href="{{Route('admin.dashboard.user_management')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard.user_management')])>User Management</a>
			<button class="block hover:text-frontend-highlight-4 transition" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</button>
		</nav>
	</div>
</aside> --}}
<aside class="w-0 md:w-64 block md:fixed bg-frontend-dark-8 min-h-screen md:p-6 transition-all duration-150 origin-left ease-linear overflow-hidden whitespace-nowrap">
	<div class="max-h-screen ">
		<div class="text-xl font-bold text-frontend-highlight-4 mb-6">Hi, {{ Auth::user()->display_name ?? 'Admin' }}</div>
		<nav class="space-y-4 text-xl font-bold mt-20">
			<a href="{{Route('admin.dashboard')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard')])>Dashboard</a>
			<a href="{{Route('admin.dashboard.personal_info')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard.personal_info')])>Personal Info</a>
			<a href="{{Route('admin.dashboard.user_management')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard.user_management')])>User Management</a>
			<button class="block hover:text-frontend-highlight-4 transition" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</button>
		</nav>
	</div>
</aside>