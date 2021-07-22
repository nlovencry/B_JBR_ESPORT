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
			
			<nav class="main-menu">
				<ul>
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('allteam')}}">Team</a></li>
					<li><a href="{{url('tournament')}}">Tournament</a></li>
					@if (Auth::user())
					@if(Auth::user()->role == 3)
					<li><a href="{{url('jadwal')}}">Jadwal</a></li>
					<li><a href="{{url('profil')}}">{{ Auth::user()->name }}</a></li>
					@elseif(Auth::user()->role == 2)
					<li><a href="{{url('profile')}}">{{ Auth::user()->name }}</a></li>
					@else
					<li><a href="{{url('admin')}}">{{ Auth::user()->name }}</a></li>
					@endif
					@csrf
					@endif
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->