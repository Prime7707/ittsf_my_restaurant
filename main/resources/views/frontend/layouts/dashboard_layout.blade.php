<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>@yield('title')</title>
		<link rel="icon" type="" href="{{asset('assets/frontend/images/sitelogo.png')}}">
		{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
		<link rel="stylesheet" href="{{asset('build/assets/app-DfV7FnPN.css')}}">
	</head>

	<body>
		<div class="min-h-screen relative">
			{{-- Header Start--}}
			@include('frontend.layouts.header')
			{{-- Header End--}}
			<div class="relative flex pt-16">
				{{-- Sidebar Start--}}
				@include('frontend.layouts.dashboard_sidebar')
				{{-- Sidebar End--}}
				<div class="md:ml-64 flex-auto min-h-[calc(100vh)] flex flex-col transition-all">
					{{-- Content Start--}}
					@yield('content')
					{{-- Content End--}}
					{{-- Footer End--}}
					@include('frontend.layouts.footer')
					{{-- Footer End--}}
				</div>
			</div>
		</div>

		{{-- Scroll to Top Button Start --}}
		<button id="scrollTopBtn" class="hidden fixed bottom-6 right-6 z-50 p-3 rounded-full btnStyle shadow-lg transition-all" aria-label="Scroll to Top">
			<!-- Up arrow icon (Heroicon - Chevron Up) -->
			<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
			</svg>
		</button>
		{{-- Scroll to Top Button End --}}

		{{-- Logout form Start--}}
		<form id="logoutForm" method="post" action="{{ route('logout') }}">
			@csrf
		</form>
		{{-- Logout form End--}}

		<script src="{{asset('build/assets/app-Bf4POITK.js')}}"></script>
		<script>
			// Mobile Menu Script Start
			document.getElementById('mobile-menu-toggle').addEventListener('click', function () { const menu = document.getElementById('mobile-menu'); menu.classList.toggle('hidden'); }); 
			// Mobile Menu Script End

			// Scroll to Top Buttom Start
			const scrollBtn = document.getElementById('scrollTopBtn');

  		window.addEventListener('scroll', () => {
  		  if (window.scrollY > 250) {
  		    scrollBtn.classList.remove('hidden');
  		  } else {
  		    scrollBtn.classList.add('hidden');
  		  }
  		});

  		scrollBtn.addEventListener('click', () => {
  		  window.scrollTo({
  		    top: 0,
  		    behavior: 'smooth'
  		  });
  		});
			// Scroll to Top Buttom End
		</script>
		@yield('scripts')
	</body>

</html>