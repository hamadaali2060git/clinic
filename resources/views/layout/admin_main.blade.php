<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>

    @include('layout.admin_head')
</head>

	<!-- nav -->

@if(!Route::is(['admin-login','register','forgot-password','lock-screen','error-404','error-500']))
	<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" 
	  		data-menu="vertical-menu-modern" data-col="2-columns">
		 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
	    	<div class="navbar-wrapper">
	    		@include('layout.admin_nav')
	    	</div>
  		</nav>

  		 <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
  		 	@include('layout.admin_sidbar')
  		 </div>	
@endif
	<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page" data-open="click" 
		data-menu="vertical-menu-modern" data-col="1-column">	
	<!-- nav -->
	


  	<!-- content -->
 	<div class="app-content content">
    	<div class="content-wrapper">
      		<div class="content-header row">
      		</div>
      		<div class="content-body">
      			@yield('content')
			</div>
    	</div>
  	</div>

    @include('layout.admin_footer')
</body>
</html>