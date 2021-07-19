<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="index.php">
				<img src="{{asset('frontend/img/logo.png')}}" alt="">
			</a>
			<div class="user-panel">
				@if (Auth::user())
				<a href="{{ route('logout') }}"
				onclick="event.preventDefault();
							  document.getElementById('logout-form').submit();">
				 {{ __('Logout') }}
			 	</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
                @else
				<a href="{{ route('login')}}">Login / Register</a>
				@endif
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			@if (Auth::user())
			<nav class="main-menu">
				<ul>
					
					<li><a href="#">Home</a></li>
					<li><a href="#">Team</a></li>
					<li><a href="#">Tournament</a></li>
					<li><a href="#">Jadwal</a></li>
					<li><a href="#">Presensi</a></li>
					<li><a href="#">{{ Auth::user()->name }}</a></li>
					@csrf
				</ul>
			</nav>
			@else
			<nav class="main-menu">
				
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Team</a></li>
					<li><a href="#">Tournament</a></li>
				</ul>
			</nav>
				@endif
			<!--if menu-->
			
		</div>
	</header>
	<!-- Header section end -->