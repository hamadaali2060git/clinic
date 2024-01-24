

@extends('layout.admin_main')
@section('content')	

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">معلومات التواصل</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">معلومات التواصل
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
										<form action="{{url('admin/settings/contactdata')}}" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											
											<div class="form-group">
												<label>phone</label>
												<input type="text" name="phone" class="form-control" value="{{$contactInfo->phone}}">
											</div>
											<div class="form-group">
												<label>email </label>
												<input type="text" name="email" class="form-control" value="{{$contactInfo->email}}">
											</div>
											<div class="form-group">
												<label>العنوان عريب</label>
												<input type="text" name="address_ar" class="form-control" value="{{$contactInfo->address_ar}}">
											</div>
											<div class="form-group">
												<label>العنوان انجليزي </label>
												<input type="text" name="address_en" class="form-control" value="{{$contactInfo->address_en}}">
											</div>
											<div class="form-group">
												<label>longitude</label>
												<input type="text" name="longitude" class="form-control" value="{{$contactInfo->longitude}}">
											</div>

											<div class="form-group">
												<label>latitude</label>
												<input type="text" name="latitude" class="form-control" value="{{$contactInfo->latitude}}">
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