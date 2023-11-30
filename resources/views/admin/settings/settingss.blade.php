

@extends('layout.admin_main')
@section('content')	
		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">الإعدادات</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">الرعدادات
			                </li>
			              </ol> 
			            </div>
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
										<form action="{{url('admin/settings/update')}}" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											
											<div class="form-group">
												<label>privacy</label>
												<input type="text" name="privacy" class="form-control" value="{{$contactInfo->privacy}}">
											</div>
											<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
											
										</form>
									</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection






@extends('layout.admin_main')
@section('content')	

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">المستخدمين</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="index.html">Home</a>
			                </li>
			                
			                <li class="breadcrumb-item active">المستخدمين
			                </li>
			              </ol> 
			            </div>
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
										<form action="{{url('admin/settings/update')}}" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											<div class="form-group">
												<label> العنوان عربي </label>
												<input type="text" name="title_ar" class="form-control" value="{{$contactInfo->title_ar}}">
											</div>
											<div class="form-group">
												<label>العنوان انجليزي</label>
												<input type="text" name="title_en" class="form-control" value="{{$contactInfo->title_en}}">
											</div>
											<div class="form-group">
												<label>رقم التواصل</label>
												<input type="text" name="phone" class="form-control" value="{{$contactInfo->phone}}">
											</div>
											<div class="form-group">
												<label>البري الإلكتروني</label>
												<input type="text" name="email" class="form-control" value="{{$contactInfo->email}}">
											</div>
											<div class="form-group">
												<label>العنوان بالعربي</label>
												<input type="text" name="address_ar" class="form-control" value="{{$contactInfo->address_ar}}">
											</div>
											<div class="form-group">
												<label>العنوان بالانجليزي</label>
												<input type="text" name="address_en" class="form-control" value="{{$contactInfo->address_en}}">
											</div>
											<div class="form-group">
												<label>الموقع</label>
												<input type="text" name="location" class="form-control" value="{{$contactInfo->location}}">
											</div>
											<!-- <div class="form-group">
												<label>mesion Image</label>
												<input type="file" class="form-control">
												<small class="text-secondary">Recommended image size is <b>150px x 150px</b></small>
											</div> -->
											<div class="form-group ">
												<label>Mesion Ar</label>
												<input type="text" name="mesion_ar" class="form-control" value="{{$contactInfo->mesion_ar}}">
											</div>
											<div class="form-group">
												<label>Vesion en</label>
												<input type="text" name="mesion_en" class="form-control" value="{{$contactInfo->mesion_en}}">
											</div>
											
											<div class="form-group">
												<label>Vesion Ar</label>
												<input type="text" name="vesion_ar" class="form-control" value="{{$contactInfo->vesion_ar}}">
											</div>
											<div class="form-group">
												<label>Vesion En</label>
												<input type="text" name="vesion_en" class="form-control" value="{{$contactInfo->vesion_en}}">
											</div>
											
											<div class="form-group">
												<label>الوصف عربي</label>
												<input type="text" name="description_ar" class="form-control" value="{{$contactInfo->description_ar}}">
											</div>
											<div class="form-group">
												<label>الوصف انجليزي</label>
												<input type="text" name="description_en" class="form-control" value="{{$contactInfo->description_en}}">
											</div>
											<div class="form-group">
												<label>الاصدار</label>
												<input type="text" name="version" class="form-control" value="{{$contactInfo->version}}">
											</div>
											<div class="form-group row">
												
												<div class="col-md-2">
													
													<img class="avatar-img" src="{{asset('assets_admin/img/settings/'.$contactInfo->mesion_image) }}" alt="Speciality" width="120" height="100">
												</div>	
												<div class="col-md-10">
													<label>Mesion Image</label>
													<input type="file" name="mesion_image" class="form-control">
													<input type="hidden" name="url4" value="{{$contactInfo->mesion_image}}">
												</div>	
												
											</div>

											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('assets_admin/img/settings/'.$contactInfo->vesion_image) }}" alt="Speciality" width="120" height="100">
												</div>	
												<div class="col-md-10">
													<label> vesion image</label>
													<input type="file" name="vesion_image" class="form-control">
													<input type="hidden" name="url3" value="{{$contactInfo->vesion_image}}">			
												</div>	

											</div>
											
											<div class="form-group row">												
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('assets_admin/img/settings/'.$contactInfo->logo) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>الشعار</label>
													<input type="file" name="logo" class="form-control">
													<!-- <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small> -->
													<input type="hidden" name="url" value="{{$contactInfo->logo}}">	
												</div>												
											</div>
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('assets_admin/img/settings/'.$contactInfo->favicon) }}" alt="Speciality" width="120" height="100">

												</div>	
												<div class="col-md-10">
													<label>Favicon</label>
													<input type="file" name="favicon" class="form-control">	
													<input type="hidden" name="url2" value="{{$contactInfo->favicon}}">	
												</div>	
												
											</div>
											<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
											
										</form>
									</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


@endsection