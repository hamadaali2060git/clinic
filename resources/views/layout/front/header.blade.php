<?php error_reporting(0);?>
<!-- Loader -->
@if(Route::is(['map-grid','map-list']))
<div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div>
	@endif
	<!-- /Loader  -->

<!-- Header -->
<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index" class="navbar-brand logo">
							<img src="{{asset('img/settings/'.$contact->logo) }}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">Home</a>
							</li>
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">About</a>
							</li>
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">Contact</a>
							</li>

						</ul>
					</div>
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> {{$contact->phone}}</p>
							</div>
							@if(Route::is(['page','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','invoice-view','doctor-register','components','calendar','map-grid','map-list','search','doctor-profile','booking','checkout','booking-success']))
							<li class="nav-item">
							<a class="nav-link header-login" href="login">login / Signup </a>
							</li>
							@endif
						</li>
						@if(Route::is(['patient-dashboard','favourites','video-call','profile-settings','change-password','voice-call']))
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>Richard Wilson</h6>
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="patient-dashboard">Dashboard</a>
								<a class="dropdown-item" href="profile-settings">Profile Settings</a>
								<a class="dropdown-item" href="login">Logout</a>
							</div>
						</li>
						@endif
						@if(!Route::is(['page','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','calendar','invoice-view','components','change-password','video-call','doctor-register','voice-call','favourites','map-grid','profile-settings','map-list','search','patient-dashboard','doctor-profile','booking','checkout','booking-success']))
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{asset('img/profiles/'.Auth::user()->photo) }}" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{asset('img/profiles/'.Auth::user()->photo) }}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6>
										<p class="text-muted mb-0">Doctor</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{url('categories')}}">Dashboard</a>
								<a class="dropdown-item" href="{{url('settings')}}">Profile Settings</a>
								<!-- <a class="dropdown-item" href="login">Logout</a> -->

								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> تسجيل الخروج </a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>


							</div>
						</li>
						<!-- /User Menu -->
						@endif

					</ul>
				</nav>
			</header>
			<!-- /Header -->
