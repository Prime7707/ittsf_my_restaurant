@extends('frontend.layouts.dashboard_layout')

@section('title',$title)

@section('content')
<section class="min-h-screen bg-frontend-dark-7 text-frontend-dark-2 flex items-center justify-center px-4 py-12 ">
	<div class="w-full max-w-2xl bg-frontend-dark-8 p-8 rounded-xl shadow-md">
		<h2 class="text-2xl font-bold text-frontend-highlight-4 mb-6">Edit Personal Info</h2>

		<form method="POST" action="{{ route('user.dashboard.info') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
			@csrf
			@method('PUT')

			<!-- First Name -->
			<div class="col-span-1">
				<label for="first_name" class="block text-sm font-medium mb-1">First Name</label>
				<input type="text" id="first_name" name="first_name" required class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->first_name}}">
			</div>

			<!-- Last Name -->
			<div class="col-span-1">
				<label for="last_name" class="block text-sm font-medium mb-1">Last Name</label>
				<input type="text" id="last_name" name="last_name" required class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->last_name}}">
			</div>

			<!-- Display Name -->
			<div class="col-span-1 md:col-span-2">
				<label for="display_name" class="block text-sm font-medium mb-1">Display Name</label>
				<input type="text" id="display_name" name="display_name" class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->display_name}}">
			</div>

			<!-- Phone Number -->
			<div class="col-span-1 md:col-span-2">
				<label for="phone" class="block text-sm font-medium mb-1">Phone Number</label>
				<input type="tel" id="phone" name="phone" class="w-full bg-frontend-dark-9 text-white border border-frontend-dark-6 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" value="{{$user->phone}}">
			</div>

			<!-- Submit Button -->
			<div class="col-span-1 md:col-span-2 mt-4">
				<button type="submit" class="w-full md:w-auto btnStyle px-6 py-2 rounded-full transition">
					Save Changes
				</button>
			</div>
		</form>
	</div>
</section>

@endsection

@section('scripts')

@endsection