@if(Auth::guest() || (Auth::check() && Auth::user()->role === 'user'))

<!-- Chat Widget Toggle Button -->
<button id="chat-widget-toggle" class="fixed bottom-10 right-6 z-50 p-[14px] rounded-full btnStyle shadow-lg transition-all" aria-label="Scroll to Top">
	<x-icon_lucid name="message-circle-more" class="w-[32px] h-[32px]" stroke-width="3" />
</button>

<!-- Chat Widget-->
<div id="chat-widget" class="block translate-y-full fixed bottom-0 right-[50%] translate-x-1/2 md:right-[7rem] md:translate-x-0 z-51 sm:min-w-[70vw] md:min-w-[25rem] lg:w-[35rem] max-w-screen rounded-t-lg shadow-lg overflow-hidden transition-all ease-linear duration-500">
	<!-- Chat Header (click to expand/collapse) -->
	<div id="chat-body-toggle" class="flex items-center justify-between font-bold tracking-wider bg-frontend-highlight-4 text-frontend-dark-9 md:btnStyle px-4 py-2 md:cursor-pointer text-lg group">
		<span class="">Customer Service</span>
		<div id="toggle-icon" class="transition-all ease-linear duration-500 transform">
			<x-icon_lucid name="chevron-down" class="w-6 h-6 text-frontend-dark-9 md:btnStyleGrp" stroke-width="3" />
		</div>
	</div>

	<!-- Chat Body -->
	<div id="chat-body" class="relative max-h-0 overflow-hidden transition-all ease-linear duration-500 bg-frontend-dark-9">
		<!-- Clear Chat Button (initially hidden) -->
		<div id="clear-chat-container" class="hidden absolute left-1/2 -translate-x-1/2 mx-auto mt-3 px-3 !bg-transparent ">
			<button id="clear-chat-btn" class="btnStyle py-[4px] px-[10px] rounded-full whitespace-nowrap">
				Clear Chat History
			</button>
		</div>
		<!-- Scrollable chat history -->
		<div class="h-64 md:h-[24rem] lg:h-[28rem] overflow-y-auto p-3 space-y-2 text-[17px] pt-[60px]" id="chat-history">
			<!-- Example messages -->
			{{-- <div class="text-left">
				<p class="bg-frontend-dark-6 inline-block px-3 py-2 rounded-md">Hello, how can I help you?</p>
			</div> --}}
		</div>

		<!-- Input Area -->
		<div class="flex items-center border-t border-frontend-dark-6 px-3 py-2">
			<input type="text" id="chat-input" placeholder="Type your message..." class="flex-1 text-[17px] bg-transparent outline-none text-white placeholder:text-frontend-dark-3" />
			<button id="chat-send-btn" class="ml-2 text-frontend-dark-2 hover:text-frontend-highlight-4 transition">
				<!-- Send icon -->
				<x-icon_lucid name="send" class="w-6 h-6 transform rotate-[45deg]" stroke-width="3" />
			</button>
		</div>
	</div>
</div>
@endif