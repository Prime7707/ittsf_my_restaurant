@auth
<form id="logoutForm" method="post" action="{{ route('logout') }}">
	@csrf
</form>
@endauth