<!-- Page Loader 1 Start-->
{{-- <div id="page-loader" class="fixed inset-0 z-50 flex items-center justify-center bg-frontend-dark-9 text-frontend-highlight-4">
	<div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-frontend-highlight-4"></div>
</div> --}}
<!-- Page Loader 1 End-->

<!-- Page Loader 2 Start-->
<!-- Loader with orbiting images -->
<div id="page-loader" class="fixed inset-0 z-50 flex items-center justify-center bg-frontend-dark-9 bg-opacity-90 transition-opacity duration-300">
	<div class="relative w-[230px] md:w-[350px] h-[230px] md:h-[350px]">
		<!-- Center image -->
		<img src="{{asset('assets/frontend/images/Loader/loader_img_center.png')}}" class="absolute inset-0 m-auto w-[95px] md:w-[145px] h-[95px] md:h-[145px] z-10 animate-spin-slow" alt="Center">

		<!-- Rotating container -->
		<div class="absolute inset-0 animate-spin-slow">
			<!-- Orbiter 1 -->
			<div class="absolute top-0 left-1/2 transform -translate-x-1/2">
				<img src="{{asset('assets/frontend/images/Loader/loader_img_rotating_1.png')}}" class="w-[95px] md:w-[145px] h-[95px] md:h-[145px] animate-counter-spin" alt="Orbit1">
			</div>
			<!-- Orbiter 2 -->
			<div class="absolute right-0 top-1/2 transform -translate-y-1/2">
				<img src="{{asset('assets/frontend/images/Loader/loader_img_rotating_2.png')}}" class="w-[95px] md:w-[145px] h-[95px] md:h-[145px] animate-counter-spin" alt="Orbit2">
			</div>
			<!-- Orbiter 3 -->
			<div class="absolute left-0 top-1/2 transform -translate-y-1/2">
				<img src="{{asset('assets/frontend/images/Loader/loader_img_rotating_3.png')}}" class="w-[95px] md:w-[145px] h-[95px] md:h-[145px] animate-counter-spin" alt="Orbit3">
			</div>
			<!-- Orbiter 4 -->
			<div class="absolute bottom-0 left-1/2 transform -translate-x-1/2">
				<img src="{{asset('assets/frontend/images/Loader/loader_img_rotating_4.png')}}" class="w-[95px] md:w-[145px] h-[95px] md:h-[145px] animate-counter-spin" alt="Orbit4">
			</div>
		</div>
	</div>
</div>
<!-- Page Loader 2 End-->