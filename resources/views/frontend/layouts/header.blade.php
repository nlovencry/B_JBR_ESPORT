<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="index.html">
				<img src="{{asset('frontend/img/logo.png')}}" alt="">
			</a>
			<div class="user-panel">
				<a href="{{ url('login')}}">Login / Register</a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			<nav class="main-menu">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Team</a></li>
					<li><a href="#">Tournament</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->