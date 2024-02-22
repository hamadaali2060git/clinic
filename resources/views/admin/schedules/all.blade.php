<?php $page="schedule-timings";?>
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
						<li class="breadcrumb-item active" aria-current="page">Schedule Timings</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">Schedule Timings</h2>
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

				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">


								<!-- <div id="mydiv1">
									<div id="div1">
										hamada ali
									</div>
								</div>
								<hr>
								<div id="mydiv2">
								</div>
								<button onclick="add();">Add</button><br>
 -->


								<h4 class="card-title">Schedule Timings</h4>
								@if(session()->has('message'))
																				@include('admin.includes.alerts.success')
																		@endif
																		@if(session()->has('error'))
																				@include('admin.includes.alerts.error')
																		@endif
																		@if ($errors->any())
															<div class="alert alert-warning">
														<ul>
																		@foreach ($errors->all() as $error)
																			<li>{{ $error }}</li>
																		@endforeach
																</ul>
													</div>
													@endif
								<div class="profile-box">
									<div class="row">

									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="card schedule-widget mb-0">

												<!-- Schedule Header -->
												<div class="schedule-header">

													<!-- Schedule Nav -->
													<div class="schedule-nav">
														<ul class="nav nav-tabs nav-justified">
															@foreach ($days as $key => $item)
															<li class="nav-item">
																<a class="nav-link {{ $key=='' ? 'active' : '' }}"
																	data-toggle="tab"
																	href="#slot_{{$item->name}}">{{$item->name}}</a>
															</li>
															@endforeach
														</ul>
													</div>
													<!-- /Schedule Nav -->

												</div>
												<!-- /Schedule Header -->


												<!-- Schedule Content -->
												<div class="tab-content schedule-cont">

													<!-- Sunday Slot -->
													@foreach ($days as $key => $schedule)
													<div id="slot_{{$schedule->name}}"
														class="tab-pane fade {{ $key=='0' ? 'show active' : '' }}">
														@if($schedule->work_days)
														<h4 class="card-title d-flex justify-content-between">
															<span>Time Slots </span>
															<a class="edit-link" data-toggle="modal" id="{{$key}}" onclick="edit(this.id);"data-catid="{{ $schedule->id }}"
																href="#edit_time_slot"><i
																	class="fa fa-edit mr-1"></i>Edit</a>
														</h4>
														<!-- Slot List -->
														<div class="doc-times">
															@foreach($schedule->work_times as $work_time)
															<div class="doc-slot-list">
																{{$work_time->time}}{{$work_time->type}}
																<a href="javascript:void(0)" class="delete_schedule">
																	<i class="fa fa-times"></i>
																</a>
															</div>
															@endforeach
															<div id="work-time{{$key}}" style="display: none;">
																@foreach($schedule->work_times as $work_time)
																<div class="row form-row hours-cont">
																	<div class="col-12 col-md-10">
																		<div class="row form-row">
																			<div class="col-12 col-md-6">
																				<div class="form-group">
																					<label> Time {{$key}}</label>
																					<select class="form-control" name="time[]">
																						<option  value=""  selected>-</option>
																						<option value="1.00" {{ $work_time->time == "1.00" ? "selected" : "" }}>1.00</option>
																						<option value="2.00" {{ $work_time->time == "2.00" ? "selected" : "" }}>2.00</option>
																						<option value="3.00" {{ $work_time->time == "3.00" ? "selected" : "" }}>3.00</option>
																						<option value="4.00" {{ $work_time->time == "4.00" ? "selected" : "" }}>4.00</option>
																						<option value="5.00" {{ $work_time->time == "5.00" ? "selected" : "" }}>5.00</option>
																						<option value="6.00" {{ $work_time->time == "6.00" ? "selected" : "" }}>6.00</option>
																						<option value="7.00" {{ $work_time->time == "7.00" ? "selected" : "" }}>7.00</option>
																						<option value="8.00" {{ $work_time->time == "8.00" ? "selected" : "" }}>8.00</option>
																						<option value="9.00" {{ $work_time->time == "9.00" ? "selected" : "" }}>9.00</option>
																						<option value="10.00" {{ $work_time->time == "10.00" ? "selected" : "" }}>10.00</option>
																						<option value="11.00" {{ $work_time->time == "11.00" ? "selected" : "" }}>11.00</option>
																						<option value="12.00" {{ $work_time->time == "12.00" ? "selected" : "" }}>12.00</option>
																					</select>
																					<!-- <input class="form-control" type="text" name="time[]" value="{{$work_time->time}}"> -->
																				</div>
																			</div>
																			<div class="col-12 col-md-6">
																				<div class="form-group">
																					<label>type</label>
																					<select class="form-control" name="type[]">
																						<option value=""  selected>-</option>
																						<option value="AM" {{ $work_time->type == "AM" ? "selected" : "" }}>AM</option>
																						<option value="PM" {{ $work_time->type == "PM" ? "selected" : "" }}>PM</option>
																					</select>
																					<!-- <input class="form-control" type="text" name="type[]" value="{{$work_time->type}}"> -->
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a
																			href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
																</div>
																@endforeach
															</div>
														</div>
														<!-- /Slot List -->
														@else
														<h4 class="card-title d-flex justify-content-between">
															<span>Time Slots</span>
															<a class="edit-link" data-toggle="modal" data-catid="{{ $schedule->id }}"
																href="#add_time_slot" onclick="add();"><i class="fa fa-plus-circle"></i>
																Add Slot</a>
														</h4>
														<p class="text-muted mb-0">Not Available</p>

														@endif
													</div>
													@endforeach
													<!-- /Sunday Slot -->



												</div>
												<!-- /Schedule Content -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>
<!-- /Page Content -->
</div>
<!-- Add Time Slot Modal -->
<div class="modal fade custom-modal" id="add_time_slot">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Time Slots</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('schedules.store')}}" method="POST"
														name="le_form"  enctype="multipart/form-data">
														@csrf
					<input type="hidden" name="id" id="cat_id" >
					<div class="hours-info">
						<div class="row form-row hours-cont">
							<div class="col-12 col-md-10">
								<div class="row form-row">
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label> Time</label>
											<select class="form-control" name="time[]">
												<option  value=""  selected>-</option>
												<option value="1.00" {{ old('time') == "1.00" ? "selected" : "" }}>1.00</option>
												<option value="2.00" {{ old('time') == "2.00" ? "selected" : "" }}>2.00</option>
												<option value="3.00" {{ old('time') == "3.00" ? "selected" : "" }}>3.00</option>
												<option value="4.00" {{ old('time') == "4.00" ? "selected" : "" }}>4.00</option>
												<option value="5.00" {{ old('time') == "5.00" ? "selected" : "" }}>5.00</option>
												<option value="6.00" {{ old('time') == "6.00" ? "selected" : "" }}>6.00</option>
												<option value="7.00" {{ old('time') == "7.00" ? "selected" : "" }}>7.00</option>
												<option value="8.00" {{ old('time') == "8.00" ? "selected" : "" }}>8.00</option>
												<option value="9.00" {{ old('time') == "9.00" ? "selected" : "" }}>9.00</option>
												<option value="10.00" {{ old('time') == "10.00" ? "selected" : "" }}>10.00</option>
												<option value="11.00" {{ old('time') == "11.00" ? "selected" : "" }}>11.00</option>
												<option value="12.00" {{ old('time') == "12.00" ? "selected" : "" }}>12.00</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-md-6">
										<div class="form-group">
											<label>type</label>
											<select class="form-control" name="type[]">
												<option value=""  selected>-</option>
												<option value="AM" {{ old('type') == "AM" ? "selected" : "" }}>AM</option>
												<option value="PM" {{ old('type') == "PM" ? "selected" : "" }}>PM</option>

											</select>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="add-more mb-3">
						<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
					</div>
					<div class="submit-section text-center">
						<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Time Slot Modal -->

<!-- Edit Time Slot Modal -->
<div class="modal fade custom-modal" id="edit_time_slot">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Time Slots</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('schedules.store')}}" method="POST"
														name="le_form"  enctype="multipart/form-data">
														@csrf
					<input type="hidden" name="id" id="cat_id" >
					<div class="hours-info" id="work-modal">

						<!-- <p>vdfuvgdfy</p> -->
					</div>
					<!-- <div class="col-md-12" style="color: #FF4961; padding-right: 23px;padding-left: 23px" id="upload-error"> <div>vdfiuhvidfuv <p>vvv</p></div> </div> -->
					<div class="add-more mb-3">
						<a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
					</div>
					<div class="submit-section text-center">
						<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Time Slot Modal -->
<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
	$('#add_time_slot').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var cat_id = button.data('catid')
		var modal = $(this)
		modal.find('.modal-body #cat_id').val(cat_id);
	})
	$('#edit_time_slot').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget)
		var cat_id = button.data('catid')
		var modal = $(this)
		modal.find('.modal-body #cat_id').val(cat_id);
	})

	$('.hidden1').hide();
	function add() {
		// $('#upload-error').empty();
	}
	function edit(timeId) {
		console.log(timeId);
		$('#work-modal').empty();
		var firstDivContent = document.getElementById('work-time'+timeId);
		var secondDivContent = document.getElementById('work-modal');

		secondDivContent.innerHTML = firstDivContent.innerHTML;
	}
</script>
@endsection
