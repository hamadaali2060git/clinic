@extends('layout.mainlayout_admin')
@section('content')	

<!-- Page Wrapper -->

<!-- <link rel="stylesheet" href="{{asset('assets_admin/select/selectthree.css')}}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="{{asset('assets_admin/select/choosen.js')}}"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->

					<div class="page-header">

						<!-- Page Wrapper -->
						

						
						<div class="row">
							<div class="col">
								<h3 class="page-title">  بيانات المريض : {{$patients->first_name_ar }} </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
							@if(session()->has('message'))
                            @include('admin.includes.alerts.success')
                            @endif
							@if(Session::has('error'))
                               <div class="row mr-2 ml-2" >
                                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
                                       {{Session::get('error')}}
                                    </button>
                                </div>
                            @endif 
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">

							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{asset('assets_admin/img/patients/'.$patients->photo) }}">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"> {{$patients->email }}</h4>
										<h6 class="text-muted"> {{$patients->mobile }}</h6>
										<!-- <div class="user-Location"><i class="fa fa-map-marker"></i>  -->
									</div>
									<!-- <div class="col-auto profile-btn">
										
										<a href="" class="btn btn-primary">
											Edit
										</a>
									</div> -->
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link " data-toggle="tab" href="#per_details_tab">من أنا</a>
									</li>
									<li class="nav-item">
										<a class="nav-link " data-toggle="tab" href="#password_tab"> كلمة المرور </a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#booking_apointment_tab">مواعيدي</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade " id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<!-- <h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5> -->
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">الامس</p>
														<p class="col-sm-10">{{$patients->first_name_ar }} {{$patients->last_name_ar }}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">24 Jul 1983</p>
													</div> -->
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">البريد الإلكتروني</p>
														<p class="col-sm-10">{{$patients->email }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">رقم الهاتف</p>
														<p class="col-sm-10">{{$patients->mobile }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">تاريخ الميلاد</p>
														<p class="col-sm-10">{{$patients->dateOfBirth}}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted  mb-0">عدد سنوات الخبرة</p>
														<p class="col-sm-10">{{$patients->experience}}</p>
													</div> -->
													
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">النوع</p>
														<p class="col-sm-10">{{$patients->gender}}</p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form>
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>First Name</label>
																			<input type="text" class="form-control" value="John">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Last Name</label>
																			<input type="text"  class="form-control" value="Doe">
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																			<label>Date of Birth</label>
																			<div class="cal-icon">
																				<input type="text" class="form-control" value="24-07-1983">
																			</div>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" value="johndoe@example.com">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Mobile</label>
																			<input type="text" value="+1 202-555-0125" class="form-control">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label>Address</label>
																			<input type="text" class="form-control" value="4663 Agriculture Lane">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>City</label>
																			<input type="text" class="form-control" value="Miami">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>State</label>
																			<input type="text" class="form-control" value="Florida">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Zip Code</label>
																			<input type="text" class="form-control" value="22434">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Country</label>
																			<input type="text" class="form-control" value="United States">
																		</div>
																	</div>
																</div>
																<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

									
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div class="tab-pane fade " id="password_tab">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">تغيير كلمة المرور</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
												<form action="{{route('patients.changepassword')}}" method="POST" 
	                                name="le_form"  enctype="multipart/form-data">
	                                @csrf
	                                					<input type="hidden" name="patientId" value="{{$patients->id}}">
														<!--<div class="form-group">-->
														<!--	<label>كلمة المرور الحالية</label>-->
														<!--	<input type="password" name="current-password" class="form-control">-->
														<!--</div>-->
														<div class="form-group">
															<label>كلمة المرور الجديدة</label>
															<input type="password" name="new-password" class="form-control">
														</div>
														<!-- <div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control">
														</div> -->
														<button class="btn btn-primary" type="submit">حفظ التغيير</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade  show active" id="booking_apointment_tab" >
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">الحجوزات  </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_booking_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">حجز جديد</a>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												
											    <div class="card">
													<div class="card-body">
														<div class="table-responsive">
								                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
								                                <thead>
																	<tr>
																		<th>صورة الدكتور </th>
																		<th>أسم الدكتور</th>
																		<th>التخصص</th>
																		<th>صورة المريض</th>
																		<th>أسم المريض</th>
																		<th>وقت الموعد</th>
																		<th>حالة الموعد</th>
																		<th>اكشن</th>
																	</tr>
																</thead>
																<tbody>														@foreach ($appointments as $_item)
																<tr>
																	<td>
																		<a href="{{url('doctor-profile/'.$_item->doctor['id']) }}">
																		<img class="avatar-img rounded-circle" 
																				src="{{asset('assets_admin/img/doctors/'.$_item->doctor['photo']) }}" alt="User Image" width="60px" height="60px"></a>
																	</td>
																	<td>
																		<a href="{{url('doctor-profile/'.$_item->doctor['id']) }}">{{$_item->doctor['first_name_ar']}}</a>
																		
																	</td>
																	<td>
																		@foreach ($_item->category as $_appoin)
																			@if($_appoin->id == $_item->doctor['specialityId'])
																			   {{$_appoin->name_ar}}
																			   
																			@endif
																		@endforeach
																		
																	</td>
																	<td class="text-center">
																		<h2 class="table-avatar">
																			<a href="{{url('patient-profile/') }}">
																			    <img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/patients/'.$_item->patient['photo']) }}" alt="User Image" width="60px" height="60px">
																			</a>
																		</h2>
																	</td>
																	<td>
																		<a href="">{{$_item->patient['first_name_ar']}} </a>
																	</td>
																	<td> {{$_item->date}}<span class="text-primary d-block">{{$_item->time}}</span></td>
																	
																	<!-- <td>
																		<span class="badge badge-pill bg-danger-light">Cancelled</span>
																		<span class="badge badge-pill bg-warning-light">Pending</span>
																		<span class="badge badge-pill bg-success-light">Confirm</span>
																	</td> -->
																	<td>
																		
																		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				                                                        
				               	                                        <a href="#" > <span data-toggle="modal" data-target="#exampleModall" class=""> 
				               	                                        	@if($_item->status=='confirmed')
				               	                                        		<span class="badge badge-pill bg-success-light">تم الموافقة</span> 
				               	                                        	@elseif($_item->status=='cancelled')
				               	                                        		<span class="badge badge-pill bg-danger-light">تم الرفض</span> 
				               	                                        	@elseif($_item->status=='pending')
				               	                                        		<span class="badge badge-pill bg-warning-light">قيد الانتظار</span> 
				               	                                        		<!-- <span class="badge badge-pill " style="color: #000;background-color:yellow ">انتظار الموافقة</span> -->
				               	                                        				<img class="avatar-img rounded-circle" 
																				src="{{asset('assets_admin/img/wait.png') }}" alt="User Image" width="60px" height="60px">
				               	                                        	@elseif($_item->status=='combledted')
				               	                                        		<span class="badge badge-pill bg-primary-light">أكتمل</span>
				               	                                        	@elseif($_item->status=='absent')
				               	                                        		<span class="badge badge-pill  btn-secondary">لم يأتي</span>	
																		<!--    @elseif($_item->status=='waiting')
				               	                                        		<span class="badge badge-pill " style="color: #000;background-color:yellow ">انتظار الموافقة</span>
				               	                                        				<img class="avatar-img rounded-circle" 
																				src="{{asset('assets_admin/img/wait.png') }}" alt="User Image" width="60px" height="60px"> -->
				               	                                        	@endif
				               	                                        </a>   
				                                                                                       
				                                                        <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog"
				                                                                           aria-labelledby="formModal" aria-hidden="true">
				                                                        <div class="modal-dialog" role="document" >
				                                                            <div class="modal-content">
				                                                                <div class="modal-header">
				                                                                    <h5 class="modal-title" id="formModal">صلاحية المستخدم</h5>
				                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                                                                        <span aria-hidden="true">&times;</span>
				                                                                    </button>
				                                                                </div>
				                                                                <div class="modal-body" style="margin: 20px">
				                                                                <form   action="{{url('appointments/update/status')}}" method="post">
				                                                                 @csrf
				                               										 <!-- @method('put') -->
				                                    
				                                                                <input type="hidden" name="appointmentId" value="{{ $_item->id }}" >   
				                                                                     <div class="row clearfix">                                       
				                                                                        <div class="col-sm-12 row"><label>حالة المستخدم</label></div>
				                                                                            <div class="row">                                             
				                                                                                <div class="col-sm-12 col-lg-6">
				                                                                                    <div class="form-check form-check-radio">
				                                                                                    <label>
				                                 													<input name="status" type="radio" value="confirmed" {{ ($_item->status=='confirmed')? 'checked' : '' }}/>
				                                                                                        <span>موافقة</span>
				                                                                                    	</label>
				                                                                                    </div>
				                                                                                </div>
				                                                                                <div class="col-sm-6 col-lg-6">
				                                                                                    <div class="form-check form-check-radio">
				                                                                                        <label>
				                                   												<input name="status" type="radio" value="cancelled" {{ ($_item->status=='cancelled')? 'checked' : '' }} />
				                                                                                            <span>تم الرفض</span>
				                                                                                        </label>
				                                                                                    </div>
				                                                                                </div>
				                                                                                <div class="col-sm-6 col-lg-6">
				                                                                                    <div class="form-check form-check-radio">
				                                                                                        <label>
				                               	 											    <input name="status" type="radio" value="pending" {{ ($_item->status=='pending')? 'checked' : '' }} />
				                                                                                            <span>قيد الانتظار</span>
				                                                                                        </label>
				                                                                                    </div>
				                                                                                </div>
				                                                                                <div class="col-sm-6 col-lg-6">
				                                                                                    <div class="form-check form-check-radio">
				                                                                                        <label>
				                           												        <input name="status" type="radio" value="combledted" {{ ($_item->status=='combledted')? 'checked' : '' }} />
				                                                                                            <span>اكتمل</span>
				                                                                                        </label>
				                                                                                    </div>
				                                                                                </div>
				                                                                                <div class="col-sm-6 col-lg-6">
				                                                                                    <div class="form-check form-check-radio">
				                                                                                        <label>
				                               												    <input name="status" type="radio" value="absent" {{ ($_item->status=='absent')? 'checked' : '' }} />
				                                                                                            <span>لم يأتي</span>
				                                                                                        </label>
				                                                                                    </div>
				                                                                                </div>
				                                                                            </div>
				                               						
				                                                    
																		        <button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>     
				                                                                </form>
				                                                                </div>
				                                                                </div>
				                                                                </div>
				                                                            </div>
				                                                        </div>
																	</td>
																	<!-- <td>				
																		 <form method="post" action="
																		   {{route('appointments.destroy',$_item->id) }}">
				                                                            @csrf
				                                                            @method('delete')
				                                                            <button type="submit" class="btn" style="    border: navajowhite;">
				                                                                 <a  href="# "  onclick="return confirm('هل انت متأكد من مسح هذا العنصر ?')">
				                                                                 	<i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
				                                                                 </a>
				                                                            </button>
				                                                        </form>
																	</td>	 -->
																	<td class="text-right">
																		<div class="actions">						
																			<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_apoint" class="btn btn-sm bg-danger-light">
																				<i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
																			</a>
																		</div>
																	</td>												
																</tr>
																@endforeach
																	
																		
																	</tbody>
								                                    
								                                </table>
								                            </div>
														</div>
													</div>
												</div>			
										</div>
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			
			<!-- /Page Wrapper -->

			<!-- start booking -->
				<div class="modal fade" id="Add_booking_details" aria-hidden="true" role="dialog">

					<div class="modal-dialog " role="document">

						<div class="modal-content">
							
							<div class="modal-header">
								<h5 class="modal-title">إضافة خدمة</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{route('patients.addbooking')}}" method="POST" 
	                                name="le_form"  enctype="multipart/form-data">
	                                @csrf
									<div class=" form-row">
										<input type="hidden" name="patientId" value="{{$patients->id}}">
										
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label>الاسم</label>
												<input type="text"  readonly class="form-control" value="{{$patients->first_name_ar}}">
											</div>
										</div>
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label>رقم الموبايل</label>
												<input type="text"  readonly class="form-control" value="{{$patients->mobile}}">
											</div>
										</div>
										<div class="col-md-12 col-sm-6">
											<div class="form-group ">									 
											        <label class="col-form-label col-md-7">اختر نوع الحجز</label>
											        <select  class="form-control formselect"  id="get_type">
											           <option  disabled selected>اختر نوع الحجز</option>	
											           <option  value="offers">عروض</option>
											           <option  value="service">خدمات كشف او استشارة فيديو</option>	

											        </select>
											</div>
										</div>

										<div class="col-md-6 col-sm-6">
											<div class="form-group ">
												<label class="col-form-label col-md-2">التخصص</label>
			<select name="" class="form-control formselect required" placeholder="Select Category" id="get_doctors_name">
													<option  disabled selected>Select</option>	
													@foreach ($specialities as $_item) 
													   <option value="{{$_item->id}}" {{(old('get_doctors_name')==$_item->id)? 'selected':''}}>{{$_item->name_ar}}</option>
													@endforeach
												</select>
											</div>
										</div>
										
							<div class="col-md-6 col-sm-6">
								<div class="form-group ">									 
								        <label class="col-form-label col-md-2">الدكتور</label>
								        <select name="doctorId" class="form-control formselect"  id="get_doctors">
								           <option  disabled selected>اختار الدكتور</option>	
								        </select>
								</div>
							</div>


							<div class="col-md-12 col-sm-6">
								<div class="form-group ">									 
								        <!-- <label class="col-form-label col-md-2">النوع</label> -->
								        <div id="add_type">
								        	<select name="type" class="form-control formselect"  id="get_offer">
									           <option  disabled selected>حدد النوع</option>	
									        </select>
								        </div>
								</div>
							</div>	
							<!-- <div class="col-md-6 col-sm-6">
								<div class="form-group ">									 
								        <label class="col-form-label col-md-2">الدكتور</label>
								        <select name="doctorId" class="myselect form-control formselect"  id="get_offer">
								           <option  disabled selected>اختار العرض</option>	
								        </select>
								</div>
							</div>	 -->				
							<style type="text/css">
								.select2-container {									    
								  width: 100% !important;		    
								}
								.select2-container .select2-selection--single{
											height: 40px;
								}
								.select2-container--default .select2-selection__rendered{
									line-height: 35;
								}
								.select2-container--default .select2-selection--single .select2-selection__arrow b{
									margin-top: 5px;
								}
								.select2-container--default .select2-search--dropdown .select2-search__field {
									
								    direction: rtl;
								}
							</style>
							<script type="text/javascript">
							  $(".myselect").select2();
							</script>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>التاريخ</label>
											<input type="date" name="date" class="form-control" id="get_date">
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<div class="form-group " id="get_time">													
									    </div>
									</div>
									<div>	
										<input type="hidden" name="permanent_type" id="permanent_type"  >
									</div>

									<br/><br/>
									<button type="submit" class="btn btn-primary btn-block">ارسال </button>
								</form>
								<!-- <span  onclick="myFunctionone()">Click </span> -->
									</div>
							</div>
						</div>
					</div>
				</div>

				<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        
		        <script>
		        	function myFunctionone() {
				        document.getElementById("permanent_type").value = "AM";
					}
					function myFunctiontwo() {
				        document.getElementById("permanent_type").value = "AF";
					}
					function myFunctionthree() {
				        document.getElementById("permanent_type").value = "PM";
					}
		            $(document).ready(function () {
		            // get doctors
		                $('#get_doctors_name').on('change', function () {
		                    let id = $(this).val();
		                    // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
		                    $.ajax({
		                        type: 'GET',
		                        url: "{{url('getdoctor')}}/"+id,
		                        success: function (response) {
		                            var response = JSON.parse(response);
		                            console.log(response);   
		                            $('#get_doctors').empty();
		                            $('#get_doctors').append(`<option value="0" disabled selected>Select </option>`);
		                            response.forEach(element => {
		                                $('#get_doctors').append(`<option value="${element['id']}">
		                                   ${element['first_name_ar']} - ${element['id']} 
		                                	
		                                </option>`);
		                            });
		                        }
		                   });
		                });
		                $('#get_type').on('change', function () {
		                    let type = $(this).val();
		                    console.log(type);   
		                    $('#add_type').empty();
		                    if(type=="offers"){
		                    	$('#add_type').append(`<select name="type" class="form-control formselect"  id="get_offer">`);
		                    	// $('#add_type').append(`<option  disabled selected>اختر العرض</option>`);
		                    	$('#add_type').append(`</select>`);
		                    }else{
		                    	$('#add_type').append(`<select name="type" class="form-control formselect" id="get_servic">`);
		                    	// $('#add_type').append(`<option  disabled selected>اختر الخدمة</option>`);

		                    	$('#add_type').append(`</select>`);
		                    }
		                    
		                });

		                $('#get_doctors').on('change', function () {
		                    let id = $(this).val();
		                    $.ajax({
		                        type: 'GET',
		                        url: "{{url('getoffer')}}/"+id,
		                        success: function (response) {
		                            var response = JSON.parse(response);
		                            console.log(response);   
		                            $('#get_offer').empty();
		                            $('#get_offer').append(`<option value="0" disabled selected>حدد النوع </option>`);
		                            response.forEach(element => {
		                                $('#get_offer').append(`<option value="${element['id']}">
		                                   ${element['offer_name_ar']}  
		                                	
		                                </option>`);
		                            });
		                        }
		                   });
		                });

		                $('#get_doctors').on('change', function () {
		                    let id = $(this).val();
		                    $.ajax({
		                        type: 'GET',
		                        url: "{{url('getservice')}}/"+id,
		                        success: function (response) {
		                            var response = JSON.parse(response);
		                            console.log(response);   
		                            $('#get_servic').empty();
		                            $('#get_servic').append(`<option value="0" disabled selected>حدد النوع </option>`);
		                            response.forEach(element => {
		                                $('#get_servic').append(`<option value="${element['id']}">
		                                   ${element['services_name_ar']} 
		                                	
		                                </option>`);
		                            });
		                        }
		                   });
		                });
		                
						

		            	$('#get_date').on('change', function () {
		                    let date = $(this).val();
		                    let doctorid = document.getElementById("get_doctors").value;
		                    console.log(date); 
		                    // $('#sub_category').empty();
		                    // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
		                    $.ajax({
		                        type: 'GET',
		                        url: "{{url('gettime')}}/"+date+"/"+doctorid,

		                        success: function (response) {
		                            var response = JSON.parse(response);
		                            
		                            $('#get_time').empty();
		                            $('#permanent_type').empty();
		                            response.forEach(element => {
		                            	
		                            	// console.log(element.first_time['0']);
		                            	$('#get_time').append(`<h6>الدوام الأول : </h6>`);   
		                            	console.log(element.first_time.appointmentbooked);
		                            	// console.log(element.first_time.appointmentbooked.time);
		                            	for(var r = 0; r < element.first_time.alltime.length; r++)
						          		{
						          			
						          			if(element.first_time.alltime[r]=='لا يوجد مواعيد صباحا'){
						          				$('#get_time').append(`<p>${element.first_time.alltime[r]}</p>`);
						          			}else{
						          				if (element.first_time.appointmentbooked==null) {
						          					$('#get_time').append(`
		                                            	<label style="margin:10;">
		                                            	<input onclick="myFunctionone()" type="radio" name="time"  value="${element.first_time.alltime[r]}" />
		                                                <span  style="">${element.first_time.alltime[r]}</span>

		                                              </label>
	                                           		`);
	                                           		// <span style="">${element.first_time.alltime[r]}</span>
	                                           		// $('#permanent_type').append(`<input type="hidden" name="permanent_type" value="AM">`);

						          				}else{
						          					if(element.first_time.alltime[r]!=element.first_time.appointmentbooked.time){
							          					$('#get_time').append(`
			                                            	<label style="margin:10;">
			                                            	<input onclick="myFunctionone()" type="radio" name="time"  value="${element.first_time.alltime[r]}" />
			                                                <span  style="">${element.first_time.alltime[r]}</span>
			                                              </label>
		                                           		`);
		                                           		// $('#permanent_type').append(`<input type="hidden" name="permanent_type" value="AM">`);
							          				}else{
							          					$('#get_time').append(`
			                                            	<label style="margin:10; color:red;">
			                                            	<input type="radio" name="time" disabled value="${element.first_time.alltime[r]}" />
			                                                <span style="">${element.first_time.alltime[r]}</span>
			                                              </label>
		                                           		`);		
		                                           						          					
							          				}
						          				}
						          					
						          			}
							          	}
							          	$('#get_time').append(`<br></br>`); 
							          	////// بعد الظهر////////////
							          	$('#get_time').append(`<h6>الدوام الثاني : </h6>`);  
							            for(var r = 0; r < element.second_time.alltime.length; r++)
						          		{
						          			
						          			if(element.second_time.alltime[r]=='لا يوجد مواعيد صباحا'){
						          				$('#get_time').append(`<p>${element.second_time.alltime[r]}</p>`);
						          			}else{
						          				if (element.second_time.appointmentbooked==null) {
						          					$('#get_time').append(`
		                                            	<label style="margin:10;">
		                                            	<input onclick="myFunctiontwo()" type="radio" name="time"  value="${element.second_time.alltime[r]}" />
		                                                <span style="">${element.second_time.alltime[r]}</span>
		                                              </label>
	                                           		`);
	                                           		// $('#permanent_type').append(`<input type="hidden" name="permanent_type" value="AF">`);
						          				}else{
						          					if(element.second_time.alltime[r]!=element.second_time.appointmentbooked.time){
							          					$('#get_time').append(`
			                                            	<label style="margin:10;">
			                                            	<input onclick="myFunctiontwo()" type="radio" name="time"  value="${element.second_time.alltime[r]}" />
			                                                <span style="">${element.second_time.alltime[r]}</span>
			                                              </label>
		                                           		`);
		                                           		// $('#permanent_type').append(`<input type="hidden" name="permanent_type" value="AF">`);	
							          				}else{
							          					$('#get_time').append(`
			                                            	<label style="margin:10;">
			                                            	<input  type="radio" name="time" disabled value="${element.second_time.alltime[r]}" />
			                                                <span style="">${element.second_time.alltime[r]}</span>
			                                              </label>
		                                           		`);		
		                                           					          					
							          				}
						          				}
						          					
						          			}
							          	}


							          	////////مساء//////////
							          	$('#get_time').append(`<br></br>`); 

							          	$('#get_time').append(`<h6>الدوام الثالث : </h6>`); 
							          	  for(var r = 0; r < element.third_time.alltime.length; r++)
						          		{
						          			
						          			if(element.third_time.alltime[r]=='لا يوجد مواعيد صباحا'){
						          				$('#get_time').append(`<p>${element.third_time.alltime[r]}</p>`);
						          			}else{
						          				if (element.third_time.appointmentbooked==null) {
						          					$('#get_time').append(`
		                                            	<label style="margin:10;">
		                                            	<input monclick="myFunctionthree()" type="radio" name="time"  value="${element.third_time.alltime[r]}" />
		                                                <span style="">${element.third_time.alltime[r]}</span>
		                                              </label>
	                                           		`);
	                                           		// $('#permanent_type').append(`<input type="hidden" name="permanent_type" value="PM">`);	

						          				}else{
						          					if(element.third_time.alltime[r]!=element.third_time.appointmentbooked.time){
							          					$('#get_time').append(`
			                                            	<label style="margin:10;">
			                                            	<input onclick="myFunctionthree()" type="radio" name="time"  value="${element.third_time.alltime[r]}" />
			                                                <span style="">${element.third_time.alltime[r]}</span>
			                                              </label>
		                                           		`);
		                                           		// $('#permanent_type').append(`<input type="hidden" name="permanent_type" value="PM">`);	

							          				}else{
							          					$('#get_time').append(`
			                                            	<label style="margin:10;">
			                                            	<input type="radio" name="time" disabled value="${element.third_time.alltime[r]}" />
			                                                <span style="">${element.third_time.alltime[r]}</span>
			                                              </label>
		                                           		`);		
		                                           						          					
							          				}
						          				}
						          					
						          			}
							          	}


						       
		                            });
		                        }

		                   });
		                    
		                });  
		               
		            });
		        </script>
			
        </div>


        <!-- Delete Modal -->
			<div class="modal fade" id="delete_apoint" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('patients.delet.apointment')}}">
	                                   		 @csrf
	                                         <!-- hidden -->
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
	                                    </form>
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

<style>
	
    label > input[type="radio"] {
      display: none;
    }
    label > input[type="radio"] + *::before {
      content: "";
      display: inline-block;
      vertical-align: bottom;
      width: 0rem;
      height: 0rem;
      margin-right: 0.0rem;
      border-radius: 50%;
      border-style: solid;
      border-width: 0.0rem;
      border-color: gray;
    }
    
    label > input[type="radio"] + * {
      background-color: white;
      box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;
    }
    label > input[type="radio"]:checked + * {
      color: #000;
      background-color: #dedede;
    }
    label > input[type="radio"]:checked + *::before {
         color: #000;
    	background-color: #dedede;
    }

   
    label > input[type="radio"] + * {
      display: inline-block;
      padding: 10px 10px;
    }
</style>
		<script src="{{asset('js/app.js')}}"></script>

<script type="text/javascript">
	$('#delete_apoint').on('show.bs.modal', function (event) {

		      var button = $(event.relatedTarget) 

		      var cat_id = button.data('catid') 
		      var modal = $(this)

		      modal.find('.modal-body #cat_id').val(cat_id);
	})
</script>

@endsection







