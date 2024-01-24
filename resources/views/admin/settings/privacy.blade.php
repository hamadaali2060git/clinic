@extends('layout.admin_main')
@section('content')	
  <script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">سياسة الخصوصية</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">سياسة الخصوصية
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
						<form action="{{url('admin/settings/privacy')}}" method="POST" name="le_form"  enctype="multipart/form-data">
			                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											
											<div class="form-group">
												<label>سياسة الخصوصية عربي</label>
												<!-- <input type="text" name="privacy" class="form-control" value="{{$contactInfo->privacy}}"> -->
												<textarea name="privacy_ar" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor">{{$contactInfo->privacy_ar}}</textarea>

											</div>
											<div class="form-group">
												<label>سياسة الخصوصية انجليزي</label>
												<!-- <input type="text" name="privacy" class="form-control" value="{{$contactInfo->privacy}}"> -->
												<textarea name="privacy_en" id="des" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor">{{$contactInfo->privacy_en}}</textarea>

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