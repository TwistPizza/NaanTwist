	<!-- Pointer ring -->
	<div id="cursor" class="sm:block hidden"></div>
	<div id="cursor-border" class="sm:block hidden"></div>

	<!-- scrolltop-progress -->
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<div class="page-wraper">
	

	<!-- Header -->
	<header class="site-header main-bar-wraper top-0 left-0 w-full z-[999]">
		<div class="main-bar md:py-[15px] py-[5px]">
			<div class="container-fluid px-[90px] max-xl:px-[15px] relative flex justify-between">
				<!-- Website Logo -->
				<div class="logo-header w-[180px] h-[64px] items-center relative flex">
					<a href="{{ route('home') }}" class="">
						<img src="{{ asset('assets/images/Naanlogo2.png') }}" alt="/">
					</a>
				</div>
				
				<!-- Toggle button -->
				<button class="togglebtn lg:hidden block bg-primary w-[45px] h-[45px] relative rounded-md mt-2">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</button>	
				
				<!-- Header Nav -->
				<div class="header-nav lg:justify-end lg:grow lg:flex-row flex-col lg:gap-0 gap-5 flex lg:relative">
					<div class="logo-header lg:hidden">
						<a href="{{ route('home') }}" class="">
							<img src="{{ asset('assets/images/Naanlogo2.png') }}" alt="/">
						</a>
					</div>
					<ul class="nav navbar-nav navbar  gap-3 md:gap-4 lg:flex items-center {{ Request::is('/') ? '' : 'white' }}">
						<li ><a  class="font-bold {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
						<li ><a href="{{ route('store.location') }}" class=" font-bold {{ Route::is('store.location') ? 'active' : '' }}">Near By store</a></li>
							<li>
								<a href="#"
								class="font-bold bg-primary text-white px-3 py-1 rounded-full uppercase hover:bg-primary-dark transition">
								Order Now
								</a>
							</li>
						</ul>
					
					
					
				</div>	
			</div>
		</div>
	</header>
	<!-- Header -->
