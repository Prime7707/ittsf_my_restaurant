@extends('frontend.layouts.main_layout')

@section('title',$title)

@section('content')
{{-- Hero Section Start--}}
<section class="relative w-full h-[70vh] overflow-hidden mb-10 tracking-wider">
	<!-- Slides container -->
	<div id="slider" class="w-full h-full relative">
		<!-- Slide Items -->
		<div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-100" style="background-image: url({{asset('assets/frontend/images/chicken_karahi.jpg')}});" data-index="0"></div>
		<div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url({{asset('assets/frontend/images/chicken_plao.jpg')}});" data-index="1"></div>
		<div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url({{asset('assets/frontend/images/Chicken_egg_fried_rice.jpg')}});" data-index="2"></div>
		<div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 opacity-0" style="background-image: url({{asset('assets/frontend/images/pizza.jpeg')}});" data-index="3"></div>

		<!-- Overlay Content -->
		<div class="absolute inset-0 bg-black/50 flex items-center px-8 md:px-24">
			<div class="text-white max-w-xl space-y-6">
				<h1 class="text-4xl md:text-6xl font-bold text-frontend-highlight-4">Foodie Haven</h1>
				<p class="text-lg md:text-xl text-gray-200">
					Enjoy mouth-watering dishes made with fresh ingredients and bold flavors. Delivered to your door.
				</p>
				<a href="#menu" class="inline-block btnStyle px-6 py-3 rounded-full text-[17px] tracking-wider transition">
					Order Now
				</a>
			</div>
		</div>

		<!-- Dots -->
		<div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex items-center space-x-2 z-10">
			<span class="w-6 h-[6px] rounded-full bg-white/50" data-dot="0"></span>
			<span class="w-6 h-[6px] rounded-full bg-white/50" data-dot="1"></span>
			<span class="w-6 h-[6px] rounded-full bg-white/50" data-dot="2"></span>
			<span class="w-6 h-[6px] rounded-full bg-white/50" data-dot="3"></span>
		</div>
	</div>


</section>
{{-- Hero Section End--}}

{{-- Best Seller Start--}}
<section class="relative bg-frontend-dark-9 text-frontend-dark-2 py-10 px-10 mb-10 overflow-hidden">
	<h2 class="text-3xl font-bold text-center text-frontend-highlight-4 mb-8">Best Sellers</h2>

	<!-- Scroll Buttons -->
	<!-- Left Scroll Button -->
	<button id="prevSlide" class="absolute left-4 top-[57%] -translate-y-1/2 z-10 btnStyle p-3 rounded-full shadow-lg transition">
		<svg class="w-5 h-5 transform -rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
			<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
		</svg>
	</button>
	<!-- Right Scroll Button -->
	<button id="nextSlide" class="absolute right-4 top-[57%] -translate-y-1/2 z-10 btnStyle p-3 rounded-full shadow-lg transition">
		<svg class="w-5 h-5 transform rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
			<path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
		</svg>
	</button>

	<!-- Carousel Wrapper -->
	<div class="flex justify-center">
		<!-- Carousel Container -->
		<div id="carousel" class="flex gap-6 overflow-x-auto scroll-smooth scrollbar-hide px-2 [scrollbar-width:none] [-ms-overflow-style:none]">
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/Chicken_egg_fried_rice.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Chicken Egg Fried Rice</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/chicken_karahi.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Chicken Karahi</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/chicken_plao.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Chicken Plao</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/pizza.jpeg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Pizza</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/Sichuan_Spicy_Noodles.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Sichuan Spicy Noodles</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/Chicken_egg_fried_rice.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Chicken Egg Fried Rice</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/chicken_karahi.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Chicken Karahi</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/chicken_plao.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Chicken Plao</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/pizza.jpeg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Pizza</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
			<!-- Carousel Element Start -->
			<div class="max-w-[300px] lg:max-w-[400px] bg-frontend-dark-8 rounded-xl p-4 flex-shrink-0 group relative overflow-hidden">
				<!-- Carousel Image Wrapper -->
				<div class="relative w-full h-[300px] rounded-md overflow-hidden">
					<img src="{{asset('assets/frontend/images/Sichuan_Spicy_Noodles.jpg')}}" alt="Dish 1" class="w-full h-full object-cover rounded-md">
					<!-- Overlay on Hover -->
					<div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
						<a href="#menu" class="btnStyle px-4 py-2 rounded-full transition">
							Order Now
						</a>
					</div>
				</div>
				<!-- Carousel Text Content -->
				<h3 class="text-xl font-semibold text-frontend-highlight-4 mt-4">Sichuan Spicy Noodles</h3>
				<p class="text-sm text-frontend-dark-3 mt-1">Juicy chicken with herbs wrapped in soft flatbread.</p>
			</div>
			<!-- Carousel Element End -->
		</div>
	</div>
</section>
{{-- Best Seller End--}}

{{-- Special Section (Oriental Taste) Start--}}
<section class="bg-frontend-dark-9 text-frontend-dark-2 py-10 px-6 mb-10 tracking-wider">
	<div class="flex justify-center">
		<h2 class="text-3xl md:text-4xl font-bold text-frontend-highlight-4 mb-10">Oriental Taste</h2>
	</div>
	<div class="max-w-[1200px] mx-auto grid md:grid-cols-3 gap-20 items-center">
		<div class="col-span-2">
			<img src="{{asset('assets/frontend/images/Sichuan_Spicy_Noodles.jpg')}}" alt="Oriental Dish" class="w-full h-auto max-h-[500px] rounded-xl shadow-lg object-fit">
		</div>
		<div>
			<h3 class="text-[24px] font-semibold mb-6">Sichuan Spicy Noodles</h3>
			<p class="text-[16px] text-frontend-dark-3 mb-6 italic">Origin: Sichuan Province, China</p>
			<p class="mb-10">
				Experience the bold and mouth-tingling flavor of authentic Sichuan spices in every bite.
				A fan favorite, made fresh with hand-pulled noodles, chili oil, and garlic-infused sauce.
			</p>
			<a href="#menu" class="inline-block btnStyle px-6 py-3 rounded-full transition">
				Order Now
			</a>
		</div>

	</div>
</section>
{{-- Special Section (Oriental Taste) End--}}

{{-- Statistics Section Start--}}
<section class="bg-frontend-dark-9 text-frontend-dark-2 py-10 px-6 mb-10">
	<div class="max-w-6xl mx-auto text-center">
		<h2 class="text-3xl md:text-4xl font-bold text-frontend-highlight-4 mb-10">Our Global Presence</h2>

		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

			<!-- Outlets -->
			<div class="bg-frontend-dark-8 rounded-xl py-8 px-4 shadow-lg">
				<h3 class="text-4xl font-extrabold text-frontend-highlight-4 mb-2">100</h3>
				<p class="uppercase text-sm tracking-widest text-frontend-dark-4">Outlets</p>
			</div>

			<!-- Chefs -->
			<div class="bg-frontend-dark-8 rounded-xl py-8 px-4 shadow-lg">
				<h3 class="text-4xl font-extrabold text-frontend-highlight-4 mb-2">100</h3>
				<p class="uppercase text-sm tracking-widest text-frontend-dark-4">Chefs</p>
			</div>

			<!-- Menus -->
			<div class="bg-frontend-dark-8 rounded-xl py-8 px-4 shadow-lg">
				<h3 class="text-4xl font-extrabold text-frontend-highlight-4 mb-2">300+</h3>
				<p class="uppercase text-sm tracking-widest text-frontend-dark-4">Menus</p>
			</div>

			<!-- Countries -->
			<div class="bg-frontend-dark-8 rounded-xl py-8 px-4 shadow-lg">
				<h3 class="text-4xl font-extrabold text-frontend-highlight-4 mb-2">30+</h3>
				<p class="uppercase text-sm tracking-widest text-frontend-dark-4">Countries</p>
			</div>

		</div>
	</div>
</section>
{{-- Statistics Section End--}}

{{-- Subscription Section Start--}}
<section class="bg-frontend-dark-9 text-frontend-dark-2 py-10 px-6 mb-10">
	<div class="max-w-3xl mx-auto text-center">
		<h2 class="text-3xl md:text-4xl font-bold text-frontend-highlight-4 mb-4">Subscribe to Our Newsletter</h2>
		<p class="text-frontend-dark-3 mb-8">
			Get the latest updates, special offers, and delicious surprises delivered to your inbox.
		</p>

		<form action="" method="" class="flex flex-col sm:flex-row items-center justify-center gap-4">
			@csrf
			<input type="email" name="email" required placeholder="Enter your email address" class="w-full sm:w-auto flex-1 px-5 py-3 rounded-md bg-frontend-dark-8 text-white border border-frontend-dark-6 focus:outline-none focus:ring-2 focus:ring-frontend-highlight-4 transition" />
			<button type="submit" class="btnStyle px-6 py-3 rounded-full text-[17px] tracking-wider transition">
				Subscribe
			</button>
		</form>
	</div>
</section>
{{-- Subscription Section End--}}

@endsection

@section('scripts')
{{-- Slider Script Start --}}
<script>
	const slides = document.querySelectorAll('#slider > div[data-index]');
	const dots = document.querySelectorAll('[data-dot]'); let current = 0;
	const slideInterval = 5000;
	const mobileToggle = document.getElementById('mobile-menu-toggle');
	
	function showSlide(index) {
		slides.forEach((slide, i) => {
			slide.style.opacity = i === index ? '1' : '0';
		});

		dots.forEach((dot, i) => {
			dot.classList.toggle('opacity-100', i === index);
			dot.classList.toggle('opacity-50', i !== index);
		});
		
		current = index;
	}
	
	function nextSlide() {
		current = (current + 1) % slides.length;
		showSlide(current);
	}
	
	dots.forEach((dot, i) => {
		dot.addEventListener('click', () => {
			showSlide(i);
		});
	});
	setInterval(nextSlide, slideInterval);
	showSlide(current); 
</script>
{{-- Slider Script End --}}

{{-- Best Seller Scroll Start --}}
<script>
	const carousel = document.getElementById('carousel');
  const nextBtn = document.getElementById('nextSlide');
  const prevBtn = document.getElementById('prevSlide');

  const scrollAmount = () => {
    const screenWidth = window.innerWidth;
    if (screenWidth >= 1280) return carousel.offsetWidth / 3;
    if (screenWidth >= 800) return carousel.offsetWidth / 2;
    return carousel.offsetWidth;
  };

  nextBtn.addEventListener('click', () => {
    const atEnd = carousel.scrollLeft + carousel.offsetWidth >= carousel.scrollWidth - 5;
    carousel.scrollTo({
      left: atEnd ? 0 : carousel.scrollLeft + scrollAmount(),
      behavior: 'smooth'
    });
  });

  prevBtn.addEventListener('click', () => {
    const atStart = carousel.scrollLeft <= 5;
    carousel.scrollTo({
      left: atStart ? carousel.scrollWidth : carousel.scrollLeft - scrollAmount(),
      behavior: 'smooth'
    });
  });
  function checkCarouselOverflow() {
    const hasOverflow = carousel.scrollWidth > carousel.clientWidth;
    if (hasOverflow) {
      prevBtn.classList.remove('hidden');
      nextBtn.classList.remove('hidden');
    } else {
      prevBtn.classList.add('hidden');
      nextBtn.classList.add('hidden');
    }
  }

  // Check once after DOM is ready
  window.addEventListener('load', checkCarouselOverflow);
  // Check again when window resizes (responsive layouts)
  window.addEventListener('resize', checkCarouselOverflow);
</script>
{{-- Best Seller Scroll Start --}}



@endsection