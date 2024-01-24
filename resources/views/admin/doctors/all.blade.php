

@extends('layout.mainlayout_admin')
@section('content')	
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->

                 <div class="page-wrapper">
                <div class="content container-fluid">
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">قائمة الدكاتره</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">الدكتور</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a data-target="#Add_doctor_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة دكتور جديد</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
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
                            
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
		                                <table
		                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
		                                    <thead>
												<tr>
													<th>ID</th>
													<th>الصورة</th>
													<th>أسم الدكتور</th>
													<th>التخصص </th>
													<!-- <th>Speciality En</th> -->
													<!--<th>عضو منذ</th>-->
													<!-- <th>Earned</th> -->
													<th>الحالة</th>
													<th>أكشن</th>
													
												</tr>
											</thead>
											<tbody>

												@foreach ($doctors as $_item)
												<tr>
													<td class="text-center">{{$_item->id}}</td>
													<td class="text-center">	
														<a href="{{url('doctor-profile/'.$_item->id) }}"> 
															<img class="avatar-img rounded-circle" 
																src="{{asset('assets_admin/img/doctors/photo/'.$_item->photo) }}" alt="User Image" width="60px" height="60px">
														</a>			
													</td>
													<td class="text-center">
														<h2 class="table-avatar">
															<a href="{{url('doctor-profile/'.$_item->id) }}"> 
															{{$_item->first_name_ar}} {{$_item->last_name_ar}}</a>
														</h2>
													</td>
													<td>

													</td>
												
													<!--<td>-->
													<!--    {{ mb_strimwidth($_item->created_at,0,10) }} <br>-->
													<!--	 <small>{{ substr($_item->created_at,10,11) }}</small> -->
													<!--</td>-->
													
													
													<!-- <td>${{ $_item->earned }}</td> -->
													
													<td>
														<div class="status-toggle">
										 				<input type="checkbox" data-id="{{ $_item->id }}" name="status" class="js-switch" {{ $_item->status == 1 ? 'checked' : '' }}>

														</div>
													</td>
													<td>
														<div class="actions">	
															<!-- <a class="btn btn-sm bg-success-light" data-toggle="modal" 
															data-first_name_ar ="{{ $_item->first_name_ar }}" 
															data-last_name_ar ="{{ $_item->last_name_ar }}"
															data-first_name_en ="{{ $_item->first_name_en }}"
															data-last_name_en ="{{ $_item->last_name_en }}"
															data-email ="{{ $_item->email }}"
															data-mobile ="{{ $_item->mobile }}"
															data-address_ar ="{{ $_item->address_ar }}"
															data-address_en ="{{ $_item->address_en }}"
															data-location ="{{ $_item->location }}"
															data-experience ="{{ $_item->experience }}"
															data-gender ="{{ $_item->gender }}" 
															data-first_name_ar ="{{ $_item->photo }}" 
															data-last__name_ar ="{{ $_item->university_degree }}"
															data-first_name_en ="{{ $_item->practice_certificate }}"
															data-last_name_en ="{{ $_item->other_qualification }}"
															data-catid="{{ $_item->id }}" 
															data-target="#edit">
																<i class="fe fe-pencil"></i> تعديل
															</a>
															 -->
															 <a class="btn btn-sm bg-success-light" href="{{ url('doctors/'.$_item->id).'/edit' }}"><i class="fe fe-pencil"></i> تعديل</a>
															<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> حذف
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
			</div>
			<!-- /Page Wrapper -->
			<div class="modal fade" id="Add_doctor_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة دكتور</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('doctors.store')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول بالعربي</label>
											<input type="text" name="first_name_ar" class="form-control" value="{{old('first_name_ar')}}" >
										</div>
									</div>
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول انجليزي</label>
											<input type="text" name="first_name_en" class="form-control" value="{{old('first_name_en')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير عربي</label>
											<input type="text" name="last_name_ar" class="form-control" value="{{old('last_name_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاخير انجليزي</label>
											<input type="text" name="last_name_en" class="form-control" value="{{old('last_name_en')}}">
										</div>
									</div>
									<!-- //////١//// -->
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" value="{{old('email')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="text" name="password" class="form-control" class="form-control" value="{{old('password')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>الدولة </label>
											<select class="form-control select" name="countryId">
												<option>اختر الدولة</option>
												@foreach ($countries as $_item)
												   <option value="{{$_item->id}}" {{(old('countryId')==$_item->id)? 'selected':''}}>{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>المدينة </label>
											<select class="form-control select" name="cityId">
												<option>اختر المدينة</option>
												@foreach ($cities as $_item)
												   <option value="{{$_item->id}}" {{(old('cityId')==$_item->id)? 'selected':''}}>{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<!-- ////////  2   ///////////// -->
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>العنوان عربي</label>
											<input type="text" name="address_ar" class="form-control" value="{{old('address_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>العنوان انجليزي</label>
											<input type="text" name="address_en" class="form-control" value="{{old('address_en')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>longitude</label>
											<input type="text" name="longitude" class="form-control" value="{{old('longitude')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>latitude</label>
											<input type="text" name="latitude" class="form-control" value="{{old('latitude')}}">
										</div>
									</div>
									<!-- //////  3  //// -->
									<div class="col-md-6">
										<div class="form-group">
											<label>التخصص </label> 
											<select class="form-control select" name="specialityId">
												<option>اختر التخصص</option>
												@foreach ($specialities as $_item)
												   <option value="{{$_item->id}}" {{(old('specialityId')==$_item->id)? 'selected':''}}>{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>وصف التخصص عربي</label>
											<input type="text" name="specialityDesc_ar" class="form-control" value="{{old('specialityDesc_ar')}}">
										</div>
									</div>

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>وصف التخصص  انجليزي</label>
											<input type="text" name="specialityDesc_en" class="form-control" value="{{old('specialityDesc_en')}}">
										</div>
									</div>

									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control" value="{{old('mobile')}}">
										</div>
									</div>
									
									<!-- //////////4///////// -->
									
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عدد سنوات الخبرة</label>
											<input type="number" name="experience" class="form-control" value="{{old('experience')}}">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option  value="Male" {{(old('gender')=='Male')? 'selected':''}}>ذكر</option>
												<option  value="Female" {{(old('gender')=='Female')? 'selected':''}}>أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم العضويه </label>
											<input type="number" name="membershipNo" class="form-control" value="{{old('membershipNo')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>جهة تسجيل الطبيب عربي</label>
											<input type="text" name="authority_ar" class="form-control" value="{{old('authority_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>جهة تسجيل الطبيب انجليزي</label>
											<input type="text" name="authority_en" class="form-control" value="{{old('authority_en')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدرجة العملية عربي</label>
											<input type="text" name="degree_ar" class="form-control" value="{{old('degree_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدرجة العلمية انجليزي</label>
											<input type="text" name="degree_en" class="form-control" value="{{old('degree_en')}}">
										</div>
									</div> 
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>سنة التسجيل</label>
											<input type="number" name="yearOfRegistration" class="form-control" value="{{old('yearOfRegistration')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الحساب البنكي</label>
											<input type="text" name="bankNumber" class="form-control" value="{{old('bankNumber')}}">
										</div>
									</div>
									
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>صورة الدكتور </label>
											<input type="file" name="photo" class="form-control" value="{{old('photo')}}">
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="modal fade" id="edit" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تعديل التخصص</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							 <form  method="post" action="{{route('doctors.update','test')}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                               
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم</label>
											<input type="text" name="first_name_ar" class="form-control" id='firstNameAr'>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم</label>
											<input type="text" name="last_name_ar" class="form-control" id="lastNameAr">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم</label>
											<input type="text" name="first_name_en" class="form-control" id="firstNameEn">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم</label>
											<input type="text" name="last_name_en" class="form-control" id="lastNameEn">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="text" name="email" class="form-control" id="email">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control" >
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="text" name="mobile" class="form-control" id="mobile">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="text" name="address_ar" class="form-control" id="address_ar">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="text" name="address_en" class="form-control" id="address_en">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="text" name="location" class="form-control" id="location">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="text" name="experience" class="form-control" id="experience">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>التخصص </label>
											<select class="form-control select" name="specialityId">
												s<option>اختر التخصص</option>
												@foreach ($specialities as $_item)
												   <option value="{{$_item->id}}">{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="photo" class="form-control" id="photo">
											<input type="hidden" name="url" value="profile_image.png">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="university_degree" class="form-control" id='universityDegree'>
											<input type="hidden" name="url2" value="profile_image.png">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="practice_certificate" class="form-control" id="practiceCertificate">
											<input type="hidden" name="url3" value="profile_image.png">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="photo" class="form-control" id="otherQualification">
											<input type="hidden" name="url4" value="profile_image.png">
										</div>
									</div>
									
								
								</div>
								
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
						</div>
					</div>
				</div>
			</div> -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
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
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل متأكد من الحذف</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('doctors.destroy','test')}}">
	                                   		 @csrf
	                                         @method('delete')
	                                         <!--hidden-->
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
    
 
		<script src="{{asset('js/app.js')}}"></script>

    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
        $(document).ready(function(){
            $('.js-switch').change(function () {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let userId = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('doctors.update.status') }}',
                    data: {'status': status, 'user_id': userId},
                    success: function (data) {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success(data.message);
                    }
                });
            });
        });
        
        
        
        $('#delete').on('show.bs.modal', function (event) {

		      var button = $(event.relatedTarget) 

		      var cat_id = button.data('catid') 
		      var modal = $(this)

		      modal.find('.modal-body #cat_id').val(cat_id);
		})

    </script>
  
@endsection
