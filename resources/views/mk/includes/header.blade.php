<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<!-- <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form autocomplete="off" id="mk-search" action="{{ route('search') }}" class="" method="post" enctype="multipart/form-data">
					 @csrf
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" name="search" required="true" class="form-control search-input" placeholder="Qidirish...">
						<div class="dropdown">
							<button class="dropdown-toggle no-arrow btn btn-search"  type="submit" >
								<i class="icon-copy fa fa-search mt-1" aria-hidden="true" ></i>
							</button>
						</div>
					</div>
				</form>
			</div> -->
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="{{ asset('assets/admin/vendors/images/photo1.jpg') }}" alt="">
						</span>
						<span class="user-name">
						 {{ Auth::user()->username }}
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						
						 <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="dw dw-logout"></i>
                                        {{ __('Chiqish') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						
					</div>
				</div>
			</div>
			<div class="github-link">
				<a href="https://t.me/ShokirjonMK" target="_blank"><img src="vendors/images/github.svg" alt=""></a>
			</div>
		</div>