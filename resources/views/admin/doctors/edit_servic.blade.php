@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">تعديل العروض</h3>
								
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active"> العروض</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
							@if(session()->has('message'))
                            @include('admin.includes.alerts.success')
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
								<div class="card-body">
									
								<form  method="post" action="{{route('doctors.update.service')}}" enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<input type="hidden" name="id" value="{{$edit->id}}">
									<!-- <div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة عربي</label>
											<input type="text" name="services_name_ar" class="form-control" value="{{$edit->services_name_ar}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة انجليزي</label>
											<input type="text" name="services_name_en" class="form-control" value="{{$edit->services_name_en}}">
										</div>
									</div> -->
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر</label>
											<input type="text" name="price" class="form-control" value="{{$edit->price}}">
										</div>
									</div>
									
									
									<!-- <div class="col-md-6">
										<div class="form-group">
											<label>نوع الخدمة</label>
											<input type="text" name="type" class="form-control" value="{{$edit->type}}">
											<select class="form-control select" name="type" >
												<option value="كشف" {{($edit->type=='كشف') ? 'selected' : '' }}>كشف</option>
												<option value="استشارة" {{($edit->type=='استشارة') ? 'selected' : '' }}>استشارة</option>
											</select>
										</div>
									</div> -->
									<div class="col-md-6">
										<div class="form-group">
											<label>حالة الخدمة</label>
											
											<select class="form-control select" name="status" >
												<option value="1" {{($edit->status=='1') ? 'selected' : '' }}>مفعل</option>
												<option value="0" {{($edit->status=='0') ? 'selected' : '' }}>غير مفعل</option>
											</select>
										</div>
									</div>
									<!-- <div class="col-12 col-sm-12">
										<div class="form-group">
											<a href="{{url('doctor-profile/'.$edit->id) }}"> 
												<img class="avatar-img " src="{{asset('assets_admin/img/services/'.$edit->icon) }}" alt="offer Image" width="80px" height="80px">
											</a>
											<label>صورة الخدمة </label>
											<input type="file" name="icon" class="form-control" >
											<input type="hidden" name="url" value="{{$edit->icon}}">
										</div>
									</div>
									 -->
								</div>
								<br/><br/>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
								</div>
							</div>
						</div>			
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
			
        </div>
		<!-- /Main Wrapper -->
@endsection