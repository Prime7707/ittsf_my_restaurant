{{-- Toastr Js Start --}}
<script src="{{ asset('assets/plugins/toastr/jQuery_v3.6.4.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.js') }}"></script>
<script>
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "progressBar": true,
    "preventDuplicates": true,
    "positionClass": "toast-top-right",
    "onclick": null,
    "showDuration": "400",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
    @if (session()->has('alert_type'))
      toastr['{{ session()->get('alert_type') }}']('{!! session()->get('message') !!}', '{{ session()->get('title') }}')
		@endif
</script>
{{-- Toastr Js End --}}

{{-- Custom Js From Build Start --}}
<script src="{{asset('build/assets/app-Bf4POITK.js')}}"></script>
{{-- Custom Js From Build End --}}

{{-- Custom commom Js Start --}}
<script>
  // Page Loader Script Start
	window.addEventListener('load', () => {
		const loader = document.getElementById('page-loader');
	  if (loader) {
			setTimeout(() => {
				loader.classList.add('opacity-0', 'pointer-events-none');
	      setTimeout(() => loader.remove(), 300);
	    }, 0); // Delay Time in ms
	  }
	});
	// Page Loader Script End
	
	// Mobile Menu Script Start
	document.getElementById('mobile-menu-toggle').addEventListener('click', function () {
    const menubtn = document.getElementById('mobile-menu-toggle');

    const menubtnToggleClasses = ['ring-2','ring-frontend-highlight-4'];
    menubtnToggleClasses.forEach(cls => {
      menubtn.classList.toggle(cls);
    });

    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }); 
	// Mobile Menu Script End
	
	// Scroll to Top Button Start
  window.addEventListener('scroll', () => {
    const scrollBtn = document.getElementById('scrollTopBtn');
    if (window.scrollY > 250) {
			scrollBtn.classList.remove('hidden');
      scrollBtn.addEventListener('click', () => {
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    } else {
			scrollBtn.classList.add('hidden');
    }
  });
	// Scroll to Top Button End
</script>
{{-- Custom commom Js End --}}a