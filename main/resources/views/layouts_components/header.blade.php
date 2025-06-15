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

			<!-- Navigation -->
			@if (!Route::is('user.dashboard'))
			<nav class="hidden md:flex @auth md:gap-[0px] lg:gap-[10px] xl:lg:gap-[50px] @else md:gap-[20px] lg:gap-[30px] xl:lg:gap-[50px] @endauth mx-4 max-w-[648.835px] h-full items-center transition-all duration-300 ease-linear">
				<a href="{{Route('home')}}" @class(['headerPageLinks', 'active'=> request()->routeIs('home')])>Home</a>
				<a href="javascript:void(0)" @class(['headerPageLinks', 'active'=> request()->routeIs('product')])>Product</a>
				<a href="javascript:void(0)" @class(['headerPageLinks', 'active'=> request()->routeIs('promo')])>Promo</a>
				<a href="javascript:void(0)" @class(['headerPageLinks', 'active'=> request()->routeIs('about')])>About</a>
				<a href="javascript:void(0)" @class(['headerPageLinks', 'active'=> request()->routeIs('contack')])>Contact</a>
			</nav>
			@endif

			<!-- Dashboard / Home, Login / Logout/ SignUp Button -->
			<div class="relative group h-full flex items-center lg:min-w-[225.724px] justify-end">
				@auth
				@if (!Route::is('user.dashboard') && !Route::is('user.dashboard.*'))
				<nav class="hidden md:flex h-full items-center transition-all ease-linear tracking-wider mr-2">
					<a @if (Auth::user()->role == 'admin') href="{{Route('admin.dashboard')}}" @else href="{{Route('user.dashboard')}}" @endif class="headerPageLinks ">Dashboard</a>
				</nav>
				@else
				<nav class="hidden md:flex h-full items-center transition-all ease-linear tracking-wider mr-2">
					<a href="{{Route('home')}}" class="headerPageLinks ">Home</a>
				</nav>
				@endif
				<button class="btnStyle headerBtns" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</button>
				@else
				@if (!Route::is('login'))
				<a href="{{Route('login')}}" class="btnStyle headerBtns">Login</a>
				@if (!Route::is('register'))
				{{-- Dropdown Sign Up --}}
				<div class="absolute right-0 top-full w-56 bg-gray-800 text-sm text-frontend-dark-2 rounded shadow-lg p-4 pr-0 opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-300 flex-col">
					<p class="inline">Don't have an account?</p>
					<a href="{{Route('register')}}" class="text-frontend-highlight-4 hover:underline">Sign Up</a>
				</div>
				@endif
				@else
				<a href="{{Route('register')}}" class="btnStyle headerBtns">
					Sign Up
				</a>
				@endif
				@endauth
			</div>

		</div>
	</div>
	<!-- Mobile Nav -->
	@if (!Route::is('user.dashboard') && !Route::is('user.dashboard.*'))
	<div id="mobile-menu" class="md:hidden hidden px-4 pb-4 bg-frontend-dark-9 font-bold">
		<nav class="flex flex-col space-y-2">
			@auth
			<a @if (Auth::user()->role == 'admin') href="{{Route('admin.dashboard')}}" @else href="{{Route('user.dashboard')}}" @endif @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('user.dashboard')])>Dashboard</a>
			@endauth
			<a href="{{Route('home')}}" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('home')]) >Home</a>
			<a href="javascript:void(0)" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('product')]) >Product</a>
			<a href="javascript:void(0)" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('promo')]) >Promo</a>
			<a href="javascript:void(0)" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('about')]) >About</a>
			<a href="javascript:void(0)" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('contract')]) >Contact</a>
		</nav>
	</div>
	@else
	<div id="mobile-menu" class="md:hidden hidden px-4 pb-4 bg-frontend-dark-9 font-bold">
		<nav class="flex flex-col space-y-2">
			<a href="{{Route('home')}}" class="hover:text-frontend-highlight-4 transition-all">Home</a>
			<a href="{{Route('user.dashboard')}}" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('user.dashboard')])>Dashboard</a>
			<a href="{{Route('user.dashboard.info')}}" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('user.dashboard.info')]) >Personal Info</a>
			<a href="{{Route('user.dashboard.security')}}" @class(['hover:text-frontend-highlight-4 transition', 'active'=> request()->routeIs('user.dashboard.security')]) >Security & Privacy</a>
			<a href="javascript:void(0)" class="hover:text-frontend-highlight-4 transition-all" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</a>
		</nav>
	</div>
	@endif
	<!-- Mobile Nav -->
</header>