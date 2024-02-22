
<?php $page="appointments";?>
@extends('layout.front.main')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Appointments</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Appointments</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							<!-- Profile Sidebar -->
                            @include('layout.front.Sidebar')
                            <!-- /Profile Sidebar -->
						</div>

						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="appointments">

								<!-- Appointment List -->
								@foreach ($appointments as $key =>$item)
								<div class="appointment-list">
									<div class="profile-info-widget">
										<a href="patient-profile" class="booking-doc-img">
											<img src="{{asset('img/profiles/'.$item->user_appointment->photo) }}" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3><a href="patient-profile"> {{$item->user_appointment->first_name}}
                                                                        {{$item->user_appointment->last_name}}</a></h3>
											<div class="patient-details">
												<h5><i class="far fa-clock"></i> {{$item->date}} {{$item->time}} {{$item->type}}</h5>
												<h5><i class="fas fa-solid fa-vials fa-fw"></i> {{$item->user_appointment->bloode_group}}</h5>
												<h5><i class="fas fa-envelope"></i> {{$item->user_appointment->email}}</h5>
												<h5 class="mb-0"><i class="fas fa-phone"></i> {{$item->user_appointment->mobile}}</h5>
											</div>
										</div>
									</div>
									<div class="appointment-action">
										<a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
											<i class="far fa-eye"></i> View
										</a>
										<a href="javascript:void(0);" data-toggle="modal"
											data-target="#status{{$key}}"
												class="btn btn-sm bg-success-light">
												<i class="fas fa-check"></i> {{$item->status}}
										</a>
									</div>
								</div>
								<div class="modal fade" id="status{{$key}}" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
														<div class="modal-content">
																<div class="modal-body">
																		<div class="form-content p-2">
																				<h4 class="modal-title">Change appointment status</h4>

																				<div class="row text-center">
																				<div class="col-sm-3">
																						</div>
																						<div class="col-md-12">
																								<form method="post" action="{{route('appointments.update.status')}}">
																										@csrf
																										<input type="hidden" name="id" value="{{ $item->id }}">
																										<div class="col-md-12">
																											<div class="">
																												<div class="card-content">
																													<div class="card-body" style="text-align: right;">
																														<fieldset>
																															<div class="float-left">
								<br>
																																<input type="radio" name="status" class="switchBootstrap" value="1" {{ $item->status == 'pending' ? 'checked' : '' }}>
																																<label>Pending </label>
																																<br>
																																<input type="radio" name="status" class="switchBootstrap" value="0" {{ $item->status == 'accept' ? 'checked' : '' }}>
																																<label>Accept</label>
																																<br>
																																<input type="radio" name="status" class="switchBootstrap" value="2" {{ $item->status == 'expired' ? 'checked' : '' }}>
																																<label>Expired</label>
																																<br>
																															</div>
																														</fieldset>
																													</div>
																												</div>
																											</div>
																										</div>

																										<button type="submit" class="btn btn-primary">Save</button>
																								</form>
																						</div>

																				</div>
																		</div>
																</div>
														</div>
												</div>
								</div>
								@endforeach
								<!-- /Appointment List -->


							</div>
						</div>
					</div>

				</div>

			</div>
            <!-- /Page Content -->
</div>

		<!-- Appointment Details Modal -->
		<div class="modal fade custom-modal" id="appt_details">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Appointment Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<ul class="info-details">
							<li>
								<div class="details-header">
									<div class="row">
										<div class="col-md-6">
											<span class="title">#APT0001</span>
											<span class="text">21 Oct 2019 10:00 AM</span>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<span class="title">Status:</span>
								<span class="text">Completed</span>
							</li>
							<li>
								<span class="title">Confirm Date:</span>
								<span class="text">29 Jun 2019</span>
							</li>
							<li>
								<span class="title">Paid Amount</span>
								<span class="text">$450</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /Appointment Details Modal -->
@endsection
