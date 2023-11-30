


@extends('layout.admin_main')
@section('content')	

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">حسابي</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">حسابي
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>
			        <div class="content-header-right col-md-6 col-12">
			          <div class="dropdown float-md-right">
			           
			          </div>
			        </div>
			        
			        @if (session('success'))
			            <div class="alert alert-success">
			                {{ session('success') }}
			            </div>
			        @endif

			        @if (count($errors) > 0)
			                <div class="alert alert-danger">
			                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
			                        <span aria-hidden="true">&times;</span>
			                    </button>
			                    <strong>خطا</strong>
			                    <ul>
			                        @foreach ($errors->all() as $error)
			                        <li>{{ $error }}</li>
			                        @endforeach
			                    </ul>
			                </div>
			                @endif
		</div>
		<section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
               
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <div class="card-body">
						<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{asset('img/users/'.$users->photo) }}" width="120px">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$users->name}}</h4>
										<h6 class="text-muted">{{$users->email}}</h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> {{$users->address}}</div>
										<!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> -->
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
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">من أنا</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">كلمة المرور</a>
									</li> -->
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>البيانات الشخصية	</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>تعديل</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الاسم</p>
														<p class="col-sm-10">{{$users->name}}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">تاريخ الميلاد</p>
														<p class="col-sm-10">{{$users->dateOfBirth}}</p>
													</div> -->
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">البريد الالكتروني</p>
														<p class="col-sm-10">{{$users->email}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الهاتف</p>
														<p class="col-sm-10">{{$users->phone}}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0">العنوان</p>
														<p class="col-sm-10">{{$users->address}}</p>
																
													</div> -->
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">البيانات الشخصية</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="{{url('/admin/profile/update')}}" method="POST" 
								                                name="le_form"  enctype="multipart/form-data">
								                                @csrf
																<div class="row form-row">           
																 
																	<input type="hidden" name="id" value="{{Auth::user()->id}}">
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label> الاسم</label>
																			<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
																		</div>
																	</div>
																	
																	<!-- <div class="col-12">
																		<div class="form-group">
																			<label>تاريخ الميلاد</label>
																			<div class="cal-icon">
																				<input type="date" name="dateOfBirth" class="form-control" value="{{Auth::user()->dateOfBirth}}">
																			</div>
																		</div>
																	</div> -->
																	<!-- <div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" class="form-control" value="johndoe@example.com">
																		</div>
																	</div> -->
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>الهاتف</label>
																			<input type="text" name="mobile" value="{{Auth::user()->phone}}" class="form-control">
																		</div>
																	</div>
																	<!-- <div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div> -->
																	<!-- <div class="col-12">
																		<div class="form-group">
																		<label>العنوان</label>
																			<input type="text" name="address" class="form-control"
																			 value="{{Auth::user()->address}}">
																		</div>
																	</div> -->
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>الصورهة الشخصية</label>
																			<input type="hidden" name="url" value="{{Auth::user()->photo}}" >
																			<input type="file" name="photo" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">
																		</div>
																	</div>
																	
																</div>
																<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
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
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">تغيير كلمة المرور</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
															<form action="{{route('user.changepassword')}}" method="POST" 
	                                name="le_form"  enctype="multipart/form-data">
	                                @csrf
	                                					<input type="hidden" name="id" value="{{Auth::user()->id}}">
														<div class="form-group">
															<label>كلمة المرور الحالية</label>
															<input type="password" name="current-password" class="form-control">
														</div>
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
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>			
					</div>
                  </div>
                </div>
              </div>
            </div>
        </div>



@endsection