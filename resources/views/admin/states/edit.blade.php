
    @extends('layout.admin_main')
    @section('content')
    <div class="content-header row">
			        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">تعديل المدينة</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>

			                <li class="breadcrumb-item active">المدينة
			                </li>
			              </ol>
			            </div>
			          </div>
			        </div>



			        @if(session()->has('message'))
                        @include('admin.includes.alerts.success')
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
      <!-- <div class="content-header row">
                        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                          <h3 class="content-header-title mb-0 d-inline-block">تعديل المدينة</h3><br>
                          <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-6">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>

                                <li class="breadcrumb-item active">الكورسات
                                </li>
                              </ol>
                            </div>
                            @if(session()->has('message'))
    	                        @include('admin.includes.alerts.success')
    	                    @endif

                          </div>
                        </div>

        </div> -->


    <section id="basic-form-layouts">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title" id="bordered-layout-basic-form"></h4>
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
                    <div class="card-content collpase show">
                      <div class="card-body">

    			       <form  method="post" action=" {{route('states.update',$state->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
    								<div class="row form-row">
    									<div class="col-12 col-sm-6">
    										<div class="form-group">
                          <label> اسم المدينة </label>
                          <input type="text" name="name" class="form-control" value="{{$state->name}}" >
    										</div>
    									</div>
                      <div class="col-12 col-sm-6">
    										<div class="form-group">
    											<label>الدولة </label>
    											<select class="form-control select" name="city_id">
    												<option disabled>اختر الدولة</option>
    												@foreach ($cities as $_item)
    												   <option value="{{$_item->id}}" {{($_item->id==$state->city_id) ? 'selected' : '' }}>{{$_item->name}}</option>
    												@endforeach
    											</select>
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
        </section>

@endsection
