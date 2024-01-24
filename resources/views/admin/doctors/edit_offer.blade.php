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
									
								<form  method="post" action="{{route('doctors.update.offers')}}" enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<input type="hidden" name="id" value="{{$edit->id}}">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض عربي</label>
											<input type="text" name="offer_name_ar" class="form-control" value="{{$edit->offer_name_ar}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض انجليزي</label>
											<input type="text" name="offer_name_en" class="form-control" value="{{$edit->offer_name_en}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف عربي</label>
											<input type="text" name="description_ar" class="form-control" value="{{$edit->description_ar}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف انجليزي</label>
											<input type="text" name="description_en" class="form-control" value="{{$edit->description_en}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر القديم</label>
											<input type="text" name="old_price" class="form-control" value="{{$edit->old_price}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر الجدد</label>
											<input type="text" name="new_price" class="form-control" value="{{$edit->new_price}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>نوع العرض</label>
											<select class="form-control select" name="type" >
												<option value="خدمة واحدة" {{($edit->type=='خدمة واحدة') ? 'selected' : '' }}>خدمة واحدة</option>
												<option value="باقة خدمات" {{($edit->type=='باقة خدمات') ? 'selected' : '' }}>باقة خدمات</option>


												
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											
											<a href="{{url('doctor-profile/'.$edit->id) }}"> 
												<img class="avatar-img " src="{{asset('assets_admin/img/offers/'.$edit->image) }}" alt="offer Image" width="80px" height="80px">
											</a>
											<label>صورة العرض </label>
											<input type="file" name="image" class="form-control" >
											<input type="hidden" name="url" value="{{$edit->image}}">
										</div>
									</div>
									
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