<aside class="hidden w-0 md:block md:fixed md:w-64 bg-frontend-dark-8 min-h-screen md:p-6 transition-all duration-200 origin-left ease-linear">
	<div class="max-h-screen ">
		<div class="text-xl font-bold text-frontend-highlight-4 mb-6">Hi, {{ Auth::user()->display_name ?? 'User' }}</div>
		<nav class="space-y-4 text-xl font-bold mt-20">
			<a href="{{Route('user.dashboard')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('user.dashboard')])>Dashboard</a>
			<a href="{{Route('user.dashboard.info')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('user.dashboard.info')])>Personal Info</a>
			<a href="{{Route('user.dashboard.security')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('user.dashboard.security')])>Security & Privacy</a>
			<button class="block hover:text-frontend-highlight-4 transition" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</button>
		</nav>
	</div>
</aside>