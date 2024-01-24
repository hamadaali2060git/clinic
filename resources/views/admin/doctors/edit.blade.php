@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">تعديل بيانات الدكتور</h3>
								
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active"> الدكتور</li>
								</ul>

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
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									
								<form  method="post" action=" {{route('doctors.update',$doctor->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                               
								<div class="row form-row">
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاول بالعربي</label>
											<input type="text" name="first_name_ar" class="form-control" value="{{$doctor->first_name_ar}}" >
										</div>
									</div>
									
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاول انجليزي</label>
											<input type="text" name="first_name_en" class="form-control" value="{{$doctor->first_name_en}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاخير عربي</label>
											<input type="text" name="last_name_ar" class="form-control" value="{{$doctor->last_name_ar}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الاسم الاخير انجليزي</label>
											<input type="text" name="last_name_en" class="form-control" value="{{$doctor->last_name_en}}">
										</div>
									</div>
									<!-- //////١//// -->
									<!-- <div class="col-12 col-sm-3">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" value="{{$doctor->email}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control" class="form-control" value="{{$doctor->password}}">
										</div>
									</div> -->
									<div class="col-md-3">
										<div class="form-group">
											<label>الدولة </label>
											<select class="form-control select" name="countryId">
												<option disabled>اختر الدولة</option>
												@foreach ($countries as $_item)
												   <option value="{{$_item->id}}" {{($_item->id==$doctor->specialityId) ? 'selected' : '' }}>{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>المدينة </label>
											<select class="form-control select" name="cityId">
												<option disabled>اختر المدينة</option>
												@foreach ($cities as $_item)
												   <option value="{{$_item->id}}" {{($_item->id==$doctor->specialityId) ? 'selected' : '' }}>{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<!-- ////////  2   ///////////// -->
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>العنوان عربي</label>
											<input type="text" name="address_ar" class="form-control" value="{{$doctor->address_ar}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>العنوان انجليزي</label>
											<input type="text" name="address_en" class="form-control" value="{{$doctor->address_en}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>longitude</label>
											<input type="text" name="longitude" class="form-control" value="{{$doctor->longitude}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>latitude</label>
											<input type="text" name="latitude" class="form-control" value="{{$doctor->latitude}}">
										</div>
									</div>
									<!-- //////  3  //// -->
									<div class="col-md-3">
										<div class="form-group">
											<label>التخصص </label> 
											<select class="form-control select" name="specialityId">
												<option>اختر التخصص</option>
												@foreach ($specialities as $_item)
												   <option value="{{$_item->id}}" {{($_item->id==$doctor->specialityId) ? 'selected' : '' }}>{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>وصف التخصص عربي</label>
											<input type="text" name="specialityDesc_ar" class="form-control" value="{{$doctor->specialityDesc_ar}}">
										</div>
									</div>

									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>وصف التخصص  انجليزي</label>
											<input type="text" name="specialityDesc_en" class="form-control" value="{{$doctor->specialityDesc_en}}">
										</div>
									</div>

									
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control" value="{{$doctor->mobile}}">
										</div>
									</div>
									
									<!-- //////////4///////// -->
									
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>عدد سنوات الخبرة</label>
											<input type="number" name="experience" class="form-control" value="{{$doctor->experience}}">
										</div>
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option  value="Male" {{($doctor->gender=='Male') ? 'selected' : '' }}>ذكر</option>
												<option  value="Female" {{($doctor->gender=='Female') ? 'selected' : '' }}>أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>رقم العضويه </label>
											<input type="number" name="membershipNo" class="form-control" value="{{$doctor->membershipNo}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الدرجة العلمية عربي</label>
											<input type="text" name="authority_ar" class="form-control" value="{{$doctor->authority_ar}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>جهة تسجيل الطبيب انجليزي</label>
											<input type="text" name="authority_en" class="form-control" value="{{$doctor->authority_en}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الدرجة العلمية عربي</label>
											<input type="text" name="degree_ar" class="form-control" value="{{$doctor->degree_ar}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>الدرجة العلمية انجليزي</label>
											<input type="text" name="degree_en" class="form-control" value="{{$doctor->degree_en}}">
										</div>
									</div> 
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>سنة التسجيل</label>
											<input type="number" name="yearOfRegistration" class="form-control" value="{{$doctor->yearOfRegistration}}">
										</div>
									</div>
									<div class="col-12 col-sm-3">
										<div class="form-group">
											<label>رقم الحساب البنكي</label>
											<input type="text" name="bankNumber" class="form-control" value="{{$doctor->bankNumber}}">
										</div>
									</div>
									
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<img class="avatar-img rounded-circle" 
																src="{{asset('assets_admin/img/doctors/photo/'.$doctor->photo) }}" alt="User Image" width="60px" height="60px">
											<label>صورة الدكتور </label>
											<input type="file" name="photo" class="form-control" >
											<input type="hidden" name="url" value="{{$doctor->photo}}">
										</div>
									</div>

									<div class="col-12 col-sm-12">
										<div class="form-group">
											<!-- <a href="{{asset('assets_admin/img/doctors/degree/'.$doctor->university_degree) }}" target="_black">
												<embed src="{{asset('assets_admin/img/doctors/degree/'.$doctor->university_degree) }}"  style="width:90px; height:50px;" frameborder="1">
											</a> -->
											
											@if($doctor->university_degree!=null)
                                                <a href="{{asset('assets_admin/img/doctors/degree/'.$doctor->university_degree) }}" target="_black">
										    	<label>الشهادة الجامعية </label></a>    
											@else
											   <label>الشهادة الجامعية </label>
											@endif								
											<input type="file" name="university_degree" class="form-control" >
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<!-- <embed src="{{asset('assets_admin/img/doctors/certificate/'.$doctor->practice_certificate) }}"  style="width:90px; height:90px;" frameborder="1"> -->
											@if($doctor->practice_certificate!=null)
                                                <a href="{{asset('assets_admin/img/doctors/certificate/'.$doctor->practice_certificate) }}" target="_black">
										    	<label>شهادة مزاولة المهنة </label></a>    
											@else

											    <label>شهادة مزاولة المهنة </label>
											@endif
											<input type="file" name="practice_certificate" class="form-control" >
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<!-- <embed src="{{asset('assets_admin/img/doctors/qualification/'.$doctor->other_qualification) }}"  style="width:90px; height:90px;" frameborder="1"> -->
											

											@if($doctor->other_qualification!=null)
                                                <a href="{{asset('assets_admin/img/doctors/qualification/'.$doctor->other_qualification) }}" target="_black">
										    	<label>مؤهلات أخرى </label></a>    
											@else

											    <label>مؤهلات أخرى </label></a>
											@endif
										
											<input type="file" name="other_qualification" class="form-control" >
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
			</div>
			<!-- /Page Wrapper -->
			
			
        </div>
		<!-- /Main Wrapper -->
@endsection