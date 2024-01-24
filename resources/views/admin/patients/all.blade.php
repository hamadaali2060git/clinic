@extends('layout.admin_main')
@section('content')	


<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">نوع العقار</h3><br>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
					</li>
					<li class="breadcrumb-item active">نوع العقار
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="dropdown float-md-right">
			<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">اضافة </a>
		</div>
	</div>

	@if (session('message'))
	<div class="alert alert-success">
		{{ session('message') }}
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
				<div class="card-header">
					<h4 class="card-title"></h4>
					<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show">
					<div class="card-body card-dashboard">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered keytable-integration">
									<thead>
									<tr>
														<th >ID</th>
														<th>الصورة</th>
														<th>أسم المريض</th>
														<th>الموبايل</th>
														<th>البريد اللكتروني</th>
														
														<th>تاريخ الميلاد</th>
														<th>الحالة</th>
														<th>العمليات</th>
													</tr>
									</thead>
									<tbody>
										

									@foreach ($patients as $_item)
													<tr>
														<td class="text-center">{{$_item->id}}</td>
														<td class="text-center">
														
															@if($_item->photo !=null)
        														 <a href="{{url('patient-profile/'.$_item->id) }}"> 
        												            <img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/patients/'.$_item->photo) }}" alt="User Image" width="60px" height="60px">
        												        </a>
        												    @else
        												         <a href="{{url('patient-profile/'.$_item->id) }}">
        												             <img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/profile_image.png') }}" alt="User Image" width="60px" height="60px">
        												        </a>
        												    @endif
														</td>
														<td class="text-center">
															<h2 class="table-avatar">	
															<a href="{{url('patient-profile/'.$_item->id) }}"> 	
															   {{$_item->first_name_ar}} {{$_item->last_name_ar}} </a>
															</h2>
														</td>
														<td class="text-center">{{ $_item->mobile }}</td>
														<td class="text-center">{{ $_item->email }}</td>
														<td class="text-center">
															{{ \Carbon\Carbon::parse($_item->dateOfBirth)->format('d/m/Y')}}
														</td>
														<td class="text-center">
															<div class="status-toggle">
 															<input type="checkbox" data-id="{{ $_item->id }}" name="status"  class="js-switch" {{ $_item->status == 1 ? 'checked' : '' }}>
														</div>
														</td>	
														<td class="text-center">
												<div class="actions">
													<a class="btn btn-sm bg-success-light" data-toggle="modal"
													data-name ="{{$_item->name}}"
													data-catid="{{ $_item->id }}"
													data-target="#edit">
													<button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
												</a>
												<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
													<button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
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


<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة مريض</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('patients.store')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم الاول عربي</label>
											<input type="text" name="first_name_ar" class="form-control" value="{{old('email')}}">
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
											<label>أسم العائلة عربي</label>
											<input type="text" name="last_name_ar" class="form-control" value="{{old('last_name_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>أسم العائلة انجليزي</label>
											<input type="text" name="last_name_en" class="form-control" value="{{old('last_name_en')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="email" name="email" class="form-control" value="{{old('email')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control"  value="{{old('password')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>رقم الهاتف</label>
											<input type="number" name="mobile" class="form-control" value="{{old('mobile')}}">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>النوع</label>
											<select class="form-control select" name="gender">
												<option>اختر النوع</option>
												<option value="Male" {{(old('gender')=="Male")? 'selected':''}}>ذكر</option>
												<option value="Female" {{(old('gender')=='Female')? 'selected':''}}>أنثى</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>تاريخ الميلاد</label>
											<input type="date" name="dateOfBirth" class="form-control" value="{{old('dateOfBirth')}}">
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="photo" class="form-control"  value="{{old('photo')}}">
											<input type="hidden" name="url"  value="profile_image.png">
										</div>
									</div>
								
								</div>
								<button type="submit" class="btn btn-primary btn-block"> حفظ </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">تعديل </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form  method="post" action="{{route('categories.update','test')}}" enctype="multipart/form-data">
					@csrf
					@method('put')

					<div class="row form-row">
						<input type="hidden" name="id" id="cat_id" >
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>نوع العقار</label>
								<input type="text" name="name" class="form-control" id="name" >

							</div>
						</div>
						<!-- <div class="col-12 col-sm-6">
							<div class="form-group">
								<label>التخصص انجليزي</label>
								<input type="text" name="name_en" class="form-control" id="nameen" >
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>الترتيب</label>
								<input type="text" name="num" class="form-control" id="num" >
							</div>
						</div> -->
						<!--<div class="col-12 col-sm-6">-->
						<!--	<div class="form-group">-->
						<!--		<label>الايكون</label>-->
						<!--		<input type="file" name="icon"  class="form-control" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">-->
						<!--		<input type="hidden" name="url"  class="form-control" id="icon">-->
						<!--	</div>-->
						<!--</div>-->

						<!--<div class="col-12 col-sm-6 text-center" style="margin-top: 30px">-->
						<!--	<div class="form-check">-->
						<!--		<input class="form-check-input" name="top" type="checkbox" value="0" id="top">-->
						<!--		<label class="form-check-label" for="invalidCheck">الظهور في الرئيسية</label>	-->
						<!--	</div>-->
						<!--</div>-->

					</div>
					<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
				</form>



			</div>
		</div>
	</div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document" >
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">حذف</h4>
					<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
					<div class="row text-center">
						<div class="col-sm-3">
						</div>
						<div class="col-sm-2">
							<form method="post" action="{{route('categories.destroy','test')}}">
								@csrf
								@method('delete')
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
</section>



<script src="{{asset('js/app.js')}}"></script>

<script>
$('#edit').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget)
	var name = button.data('name')
	// var name_en = button.data('name_en')
	// var num = button.data('num')
	// var icon = button.data('icon')
	// var top = button.data('top')
	var cat_id = button.data('catid')
	var modal = $(this)

	modal.find('.modal-body #name').val(name);
	// modal.find('.modal-body #nameen').val(name_en);
	// modal.find('.modal-body #num').val(num);
	// modal.find('.modal-body #icon').val(icon);
	modal.find('.modal-body #cat_id').val(cat_id);
})


$('#delete').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget)

	var cat_id = button.data('catid')
	var modal = $(this)

	modal.find('.modal-body #cat_id').val(cat_id);
})


</script>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

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
		                    url: '{{ route('patients.update.status') }}',
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
		</script>





		<!-- /Main Wrapper -->
@endsection