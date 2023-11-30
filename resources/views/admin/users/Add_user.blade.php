

@extends('layout.admin_main')
@section('content')
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
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
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
                <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">رجوع</a>
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

<section class="inputmask" id="inputmask">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Mask</h4>
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
                    <div class="card-body">
                         <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" 
                                 action="{{route('users.store')}}" method="POST" 
                                                                name="le_form"  enctype="multipart/form-data">
                                @csrf
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>اسم المستخدم: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm mg-b-20"
                                            data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                       <label>البريد الالكتروني: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm mg-b-20"
                                            data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>كلمة المرور: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="password" required="" type="password">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label> تاكيد كلمة المرور: <span class="tx-danger">*</span></label>
                                        <input class="form-control form-control-sm mg-b-20" data-parsley-class-handler="#lnWrapper" name="confirm-password" required="" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    
                                    <div class="form-group">
                                        <label class="form-label"> صلاحية المستخدم</label>
                                        {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">حالة المستخدم</label>
                                        <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                                            <option value="مفعل">مفعل</option>
                                            <option value="غير مفعل">غير مفعل</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>الهاتف</label>
                                            <input type="text" name="mobile" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>العنوان</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>الصورة</label>
                                <input type="file" name="photo" class="form-control" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">حفظ </button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
</section>
 <!-- Internal Nice-select js-->
        <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
        <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

        <!--Internal  Parsley.min js -->
        <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
        <!-- Internal Form-validation js -->
        <script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection