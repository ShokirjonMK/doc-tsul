
@if(Auth::user()->role == 777)
{{--	<li class="dropdown @if( ( Request::is('backoffice/strc') ) ||  ( Request::is('backoffice/department') ) ) show @endif">--}}
	<li class="dropdown  show ">
		<a href="javascript:;" class="dropdown-toggle">
			<span class="micon dw dw-house-1"></span><span class="mtext">Asosiy </span>
		</a>
		<ul class="submenu">
			{{-- <li>
				<a href="{{ route('structure.strc')}} " class="@if( ( Request::is('backoffice/strc') ) || Request::is('backoffice/structure') ) ) active @endif">Struktura</a>
			</li> --}}
			<li>
				<a href="{{ route('department.index')}}" class="@if( ( Request::is('backoffice/department') ) || ( Request::is('backoffice/department/*') )|| ( Request::is('backoffice/stdep/*') ) ) active @endif active">Tashkiliy tuzilma</a>
			</li>
			<li>
				<a href="{{ route('staff.index')}}" class="@if( ( ( Request::is('backoffice/staff') ) || Request::is('backoffice/staff/*') ) ) active @endif active">Xodimlar</a>
			</li>
			<li>
				<a href="{{ route('university.index')}}" class="@if( ( ( Request::is('backoffice/university') ) || Request::is('backoffice/university/*') ) ) active @endif active">Ta'lim muassasalari</a>
			</li>
		</ul>
	</li>
@endif