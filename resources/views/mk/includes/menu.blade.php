
@if(Auth::user()->role == 777)
{{--	<li class="dropdown @if( ( Request::is('backoffice/strc') ) ||  ( Request::is('backoffice/department') ) ) show @endif">--}}
	<li class="show">
		<a href="{{ route('doc.index')}}" class="dropdown-toggle">
			<span class="micon dw dw-house-1"></span><span class="mtext">Asosiy </span>
		</a>
	</li>
	<li class=" ">
		<a href="{{ route('mk.user.index')}}" class="dropdown-toggle">
			<span class="micon dw dw-user"></span><span class="mtext">Foydalanuvchilar </span>
		</a>
	</li>

	
@endif