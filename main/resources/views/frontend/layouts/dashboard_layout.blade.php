<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title')</title>
		{{-- icon and CSS sheets Start--}}
		@include('layouts_components.css')
		{{-- icon and CSS sheets End--}}
		{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
	</head>

	<body class="bg-frontend-dark-7">
		<div class="min-h-screen relative">
			<!-- Page Loader Start-->
			@include('layouts_components.loader')
			<!-- Page Loader End-->

			{{-- Header Start--}}
			@include('layouts_components.header')
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
					@include('layouts_components.footer')
					{{-- Footer End--}}
				</div>
			</div>
		</div>

		{{-- Scroll to Top Button Start --}}
		@include('layouts_components.scroll_to_top')
		{{-- Scroll to Top Button End --}}

		{{-- Customer Service Chat Start--}}
		@include('layouts_components.customer_chat')
		{{-- Customer Service Chat End--}}

		{{-- Logout form Start--}}
		@include('layouts_components.logout_form')
		{{-- Logout form End--}}

		{{-- Custom allLayout Js Start --}}
		@include('layouts_components.common_Js')
		{{-- Custom allLayout Js End --}}

		{{-- Custom Client Layout Js Start --}}
		@include('layouts_components.client_js')
		{{-- Custom Client Js End --}}

		{{-- Custom page Js Start --}}
		@yield('scripts')
		{{-- Custom page Js End --}}
	</body>

</html>