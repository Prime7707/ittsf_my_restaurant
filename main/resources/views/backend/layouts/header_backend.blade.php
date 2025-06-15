<header class="bg-frontend-dark-9 shadow-md fixed top-0 inset-x-0 z-50 h-16">
	<div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex justify-between items-center h-16">
			<!-- Mobile Menu button -->
			<div class="md:hidden">
				<button id="mobile-menu-toggle" class="hover:text-frontend-highlight-4 focus:outline-none hover:ring-2 hover:ring-frontend-highlight-4">
					<x-icon_lucid name="menu" class="w-6 h-6" stroke-width="3" />
				</button>
			</div>
			<!-- Mobile Menu End -->
			<!-- Logo + Restaurant Name -->
			<a href="{{Route('home')}}" class="flex items-center space-x-2">
				<img src="{{asset('assets/frontend/images/logos/sitelogo.png')}}" alt="Logo" class="h-7 w-6 xsm:h-10 xsm:w-8">
				<span class="text-[18px] xsmtext-[22px] font-bold text-frontend-highlight-4 whitespace-nowrap">Foodie Haven</span>
			</a>

			<!-- Login Button -->
			<div class="relative group h-full flex items-center lg:min-w-[225.724px] justify-end">
				@auth
				@if (Route::is('admin.dashboard') || Route::is('admin.dashboard.*') )
				<nav class="hidden md:flex h-full items-center transition-all ease-linear tracking-wider mr-2">
					<a href="{{Route('home')}}" class="headerPageLinks">Home</a>
				</nav>
				@endif
				<button class="btnStyle headerBtns" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
					Logout
				</button>
				@endauth
			</div>

		</div>
	</div>
	<!-- Mobile Nav -->
	<div id="mobile-menu" class="md:hidden hidden px-4 pb-4 bg-frontend-dark-9 font-bold">
		<nav class="flex flex-col space-y-2">
			<a href="{{Route('home')}}" class="hover:text-frontend-highlight-4 transition">Home</a>
			<a href="{{Route('admin.dashboard')}}" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard')])>Dashboard</a>
			<a href="{{Route('admin.dashboard.personal_info')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard.personal_info')])>Personal Info</a>
			<a href="{{Route('admin.dashboard.user_management')}}" @class(['block hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('admin.dashboard.user_management')])>User Management</a>
			<a href="javascript:void(0)" class="hover:text-frontend-highlight-4 transition" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</a>
		</nav>
	</div>
	<!-- Mobile Nav -->
</header>