<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:38 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Katen - Minimal Blog & Magazine HTML Theme</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('asstes') }}/images/favicon.png">

	<!-- STYLES -->
	<link rel="stylesheet" href="{{ asset('asstes') }}/css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('asstes') }}/css/all.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('asstes') }}/css/slick.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('asstes') }}/css/simple-line-icons.css" type="text/css" media="all">
	<link rel="stylesheet" href="{{ asset('asstes') }}/css/style.css" type="text/css" media="all">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- preloader -->
<div id="preloader">
	<div class="book">
		<div class="inner">
			<div class="left"></div>
			<div class="middle"></div>
			<div class="right"></div>
		</div>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</div>

<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	<header class="header-default">
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<!-- site logo -->
				<a class="navbar-brand" href="index.html"><img src="{{ asset('asstes') }}/images/logo.svg" alt="logo" /></a> 

				<div class="collapse navbar-collapse">
					<!-- menus -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="{{ route('index') }}">Home</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="index.html">Magazine</a></li>
								<li><a class="dropdown-item" href="{{ route('personal.index') }}">Personal</a></li>
								<li><a class="dropdown-item" href="{{ route('personals.index') }}">Personal Alt</a></li>
								<li><a class="dropdown-item" href="{{ route('minimal.index') }}">Minimal</a></li>
								<li><a class="dropdown-item" href="{{ route('classic.index') }}">Classic</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('category.index') }}">Lifestyle</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('category.index') }}">Inspiration</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#">Pages</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{ route('category.index') }}">Category</a></li>
								<li><a class="dropdown-item" href="{{ route('blog.index') }}">Blog Single</a></li>
								<li><a class="dropdown-item" href="{{ route('blogs.index') }}">Blog Single Alt</a></li>
								<li><a class="dropdown-item" href="{{ route('about.index') }}">About</a></li>
								<li><a class="dropdown-item" href="{{ route('contract.index') }}">Contact</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('contract.index') }}">Contact</a>
						</li>
					</ul>
				</div>

				<!-- header right section -->
				<div class="header-right">
					<!-- social icons -->
					<ul class="social-icons list-unstyled list-inline mb-0">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
					<!-- header buttons -->
					<div class="header-buttons">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>
			</div>
		</nav>
	</header>
@yield('content')

    <!-- JAVA SCRIPTS -->
<script src="{{ asset('asstes') }}/js/jquery.min.js"></script>
<script src="{{ asset('asstes') }}/js/popper.min.js"></script>
<script src="{{ asset('asstes') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('asstes') }}/js/slick.min.js"></script>
<script src="{{ asset('asstes') }}/js/jquery.sticky-sidebar.min.js"></script>
<script src="{{ asset('asstes') }}/js/custom.js"></script>

</body>

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:47 GMT -->
</html>