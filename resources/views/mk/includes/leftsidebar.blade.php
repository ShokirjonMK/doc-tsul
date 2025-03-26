<div class="brand-logo">
	<a href="{{ route('mk')}}">
		{{-- <img src="{{ asset('assets/admin/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
		<img src="{{ asset('assets/admin/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo"> --}}
		<span class="light-logo">
			E-univ TSUL 
		</span> 
		<span class="dark-logo" style="color: #0b132b; font-weight: 700 !important;">
			E-univ TSUL
		</span> 
	</a>
	<div class="close-sidebar" data-toggle="left-sidebar-close">
		<i class="ion-close-round"></i>
	</div>
</div>
<div class="menu-block customscroll">
	<div class="sidebar-menu icon-style-1 icon-list-style-2">
		<ul id="accordion-menu">
			@include('mk.includes.menu')
		</ul>
	</div>
</div>