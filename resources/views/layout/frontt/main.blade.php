
<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.frontt.head')

	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->
			<header class="header">
        @include('layout.frontt.header')
			</header>
			<!-- /Header -->
      @yield('content')


<!-- Footer -->
<footer class="footer">



</footer>
<!-- /Footer -->

</div>
<!-- /Main Wrapper -->

@include('layout.frontt.footer-scripts')
</body>

<!-- doccure/doctor-dashboard.html  30 Nov 2019 04:12:09 GMT -->
</html>
