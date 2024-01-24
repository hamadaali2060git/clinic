@extends('layout.mainlayout_admin')
@section('content') 
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
                    
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">Profile</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-header">
                                <div class="row align-items-center">
                                    <div class="col-auto profile-image">
                                        <a href="#">
                                            <img class="rounded-circle" alt="User Image" src="../assets_admin/img/profiles/avatar-01.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml-md-n2 profile-user-info">
                                        <h4 class="user-name mb-0">Ryan Taylor</h4>
                                        <h6 class="text-muted">ryantaylor@admin.com</h6>
                                        <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
                                        <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                    </div>
                                    <div class="col-auto profile-btn">
                                        
                                        <a href="" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-menu">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#per_details_tab">من أنا</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#password_tab">تغيير كلمة المرور </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#booking_apointment_tab">مواعيدي</a>
                                    </li>
                                </ul>
                            </div>  
                            <div class="tab-content profile-tab-cont">
                                
                                <!-- Personal Details Tab -->
                                <div class="tab-pane fade " id="per_details_tab">
                                
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Personal Details</span> 
                                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h5>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                        <p class="col-sm-10">John Doe</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                        <p class="col-sm-10">24 Jul 1983</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                        <p class="col-sm-10">johndoe@example.com</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                        <p class="col-sm-10">305-310-5857</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                        <p class="col-sm-10 mb-0">4663  Agriculture Lane,<br>
                                                        Miami,<br>
                                                        Florida - 33165,<br>
                                                        United States.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Edit Details Modal -->
                                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Personal Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="row form-row">
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>First Name</label>
                                                                            <input type="text" class="form-control" value="John">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Last Name</label>
                                                                            <input type="text"  class="form-control" value="Doe">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>Date of Birth</label>
                                                                            <div class="cal-icon">
                                                                                <input type="text" class="form-control" value="24-07-1983">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Email ID</label>
                                                                            <input type="email" class="form-control" value="johndoe@example.com">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Mobile</label>
                                                                            <input type="text" value="+1 202-555-0125" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <h5 class="form-title"><span>Address</span></h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                        <label>Address</label>
                                                                            <input type="text" class="form-control" value="4663 Agriculture Lane">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>City</label>
                                                                            <input type="text" class="form-control" value="Miami">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>State</label>
                                                                            <input type="text" class="form-control" value="Florida">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Zip Code</label>
                                                                            <input type="text" class="form-control" value="22434">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Country</label>
                                                                            <input type="text" class="form-control" value="United States">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Edit Details Modal -->
                                            
                                        </div>

                                    
                                    </div>
                                    <!-- /Personal Details -->

                                </div>
                                <!-- /Personal Details Tab -->
                                
                                <!-- Change Password Tab -->
                                <div id="password_tab" class="tab-pane fade">
                                
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Change Password</h5>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-6">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Old Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active " id="booking_apointment_tab" >
                                        <div class="page-header">
                                                <div class="row">
                                                    <div class="col-sm-7 col-auto">
                                                        <h3 class="page-title">الخدمات  </h3>
                                                    </div>
                                                    <div class="col-sm-5 col">
                                                        <a data-target="#Add_booking_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    @if(session()->has('message'))
                                                    @include('admin.includes.alerts.success')
                                                    @endif
                                                    @if(Session::has('error'))
                                                       <div class="row mr-2 ml-2" >
                                                            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
                                                               {{Session::get('error')}}
                                                            </button>
                                                        </div>
                                                    @endif 
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>عنوان الخدمة</th>
                                                                            <th>السعر</th>  
                                                                            <th class="text-center">أكشن</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($appointments as $_item)
                                                                            <tr>
                                                                                <td class="text-center">
                                                                                    {{ $_item->id }}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{ $_item->price }}
                                                                                </td>                                                       
                                                                                <td class="text-center">
                                                                                    <div class="actions">
                                                                                        <a class="btn btn-sm bg-success-light" data-toggle="modal" 
                                                                                        data-services_name ="{{$_item->services_name}}" 
                                                                                        data-price ="{{ $_item->price }}"                   
                                                                                        data-catid="{{ $_item->id }}" 
                                                                                        data-target="#edit_service">
                                                                                            <i class="fe fe-pencil"></i> تعديل
                                                                                        </a>
                                                                                        <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_service" class="btn btn-sm bg-danger-light">
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
                                <!-- /Change Password Tab -->
                                
                            </div>
                        </div>
                    </div>
                
                </div>          
            
            <!-- /Page Wrapper -->

            <!-- start booking -->
                <div class="modal fade" id="Add_booking_details" aria-hidden="true" role="dialog">
                    <div class="modal-dialog " role="document"   >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">إضافة خدمة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('doctors/addservice')}}" method="POST" 
                                    name="le_form"  enctype="multipart/form-data">
                                    @csrf
                                    <div class=" form-row">
                                        <input type="hidden" name="doctorId" value="{{$patients->id}}">
                                        
                                        <div class="col-12 col-sm-١٢">
                                        <div class="form-group">
                                            <label>الاسم</label>
                                            <input type="text" name="services_name" readonly class="form-control" value="{{$patients->first_name_ar}}">
                                        </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <label>رقم الموبايل</label>
                                                <input type="text" name="price" readonly class="form-control" value="{{$patients->id}}">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group ">
                                                <label class="col-form-label col-md-2">التخصص</label>
                                                    <select class="form-control formselect required" placeholder="Select Category" id="sub_category_name">
                                                        <option value="0" disabled selected>Select</option> 
                                                        @foreach($data as $categories)
                                                            <option  value="{{ $categories->id }}">{{ ucfirst($categories->name) }}</option>
                                                        @endforeach    
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group ">
                                                <label class="col-form-label col-md-2">الدكتور</label>
                                                <select class="form-control formselect" placeholder="Select Sub Category" id="sub_category">
                                                    <option>ergjhet</option>
                                                </select>                                               
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <label>عنوان الخدمة</label>
                                                <input type="date" name="date" class="form-control" >
                                            </div>
                                        </div>

                                        
                                        
                                    </div>
                                    <br/>
                                        <br/>
                                    <button type="submit" class="btn btn-primary btn-block">أضافة </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        
                <script>
                    $(document).ready(function () {
                        $('#sub_category_name').on('change', function () {
                            let id = $(this).val();
                            // $('#sub_category').empty();
                            // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                            $.ajax({
                                type: 'GET',
                                url: 'GetSubCatAgainstMainCatEdit/' + id,
                                success: function (response) {
                                    var response = JSON.parse(response);
                                    console.log(response);   
                                    $('#sub_category').empty();
                                    $('#sub_category').append(`<option value="0" disabled selected>Select </option>`);
                                    response.forEach(element => {
                                        $('#sub_category').append(`<option value="${element['id']}">${element['name']}</option>`);
                                    });
                                }
                           });
                        });
                    });
                </script>
            <!-- end booking -->
        
        </div>
        <!-- /Main Wrapper -->
@endsection














@extends('layout.mainlayout_admin')
@section('content') 
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
                    
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">Profile</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-header">
                                <div class="row align-items-center">
                                    <div class="col-auto profile-image">
                                        <a href="#">
                                            <img class="rounded-circle" alt="User Image" src="../assets_admin/img/profiles/avatar-01.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml-md-n2 profile-user-info">
                                        <h4 class="user-name mb-0">Ryan Taylor</h4>
                                        <h6 class="text-muted">ryantaylor@admin.com</h6>
                                        <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
                                        <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                    </div>
                                    <div class="col-auto profile-btn">
                                        
                                        <a href="" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-menu">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#per_details_tab">من أنا</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#password_tab">تغيير كلمة المرور </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#booking_apointment_tab">مواعيدي</a>
                                    </li>
                                </ul>
                            </div>  
                            <div class="tab-content profile-tab-cont">
                                
                                <!-- Personal Details Tab -->
                                <div class="tab-pane fade " id="per_details_tab">
                                
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Personal Details</span> 
                                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h5>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                        <p class="col-sm-10">John Doe</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                        <p class="col-sm-10">24 Jul 1983</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                        <p class="col-sm-10">johndoe@example.com</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                        <p class="col-sm-10">305-310-5857</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                        <p class="col-sm-10 mb-0">4663  Agriculture Lane,<br>
                                                        Miami,<br>
                                                        Florida - 33165,<br>
                                                        United States.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Edit Details Modal -->
                                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Personal Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="row form-row">
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>First Name</label>
                                                                            <input type="text" class="form-control" value="John">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Last Name</label>
                                                                            <input type="text"  class="form-control" value="Doe">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>Date of Birth</label>
                                                                            <div class="cal-icon">
                                                                                <input type="text" class="form-control" value="24-07-1983">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Email ID</label>
                                                                            <input type="email" class="form-control" value="johndoe@example.com">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Mobile</label>
                                                                            <input type="text" value="+1 202-555-0125" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <h5 class="form-title"><span>Address</span></h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                        <label>Address</label>
                                                                            <input type="text" class="form-control" value="4663 Agriculture Lane">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>City</label>
                                                                            <input type="text" class="form-control" value="Miami">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>State</label>
                                                                            <input type="text" class="form-control" value="Florida">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Zip Code</label>
                                                                            <input type="text" class="form-control" value="22434">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Country</label>
                                                                            <input type="text" class="form-control" value="United States">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Edit Details Modal -->
                                            
                                        </div>

                                    
                                    </div>
                                    <!-- /Personal Details -->

                                </div>
                                <!-- /Personal Details Tab -->
                                
                                <!-- Change Password Tab -->
                                <div id="password_tab" class="tab-pane fade">
                                
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Change Password</h5>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-6">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Old Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active " id="booking_apointment_tab" >
                                        <div class="page-header">
                                                <div class="row">
                                                    <div class="col-sm-7 col-auto">
                                                        <h3 class="page-title">الخدمات  </h3>
                                                    </div>
                                                    <div class="col-sm-5 col">
                                                        <a data-target="#Add_booking_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    @if(session()->has('message'))
                                                    @include('admin.includes.alerts.success')
                                                    @endif
                                                    @if(Session::has('error'))
                                                       <div class="row mr-2 ml-2" >
                                                            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
                                                               {{Session::get('error')}}
                                                            </button>
                                                        </div>
                                                    @endif 
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>عنوان الخدمة</th>
                                                                            <th>السعر</th>  
                                                                            <th class="text-center">أكشن</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($appointments as $_item)
                                                                            <tr>
                                                                                <td class="text-center">
                                                                                    {{ $_item->id }}
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    {{ $_item->price }}
                                                                                </td>                                                       
                                                                                <td class="text-center">
                                                                                    <div class="actions">
                                                                                        <a class="btn btn-sm bg-success-light" data-toggle="modal" 
                                                                                        data-services_name ="{{$_item->services_name}}" 
                                                                                        data-price ="{{ $_item->price }}"                   
                                                                                        data-catid="{{ $_item->id }}" 
                                                                                        data-target="#edit_service">
                                                                                            <i class="fe fe-pencil"></i> تعديل
                                                                                        </a>
                                                                                        <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_service" class="btn btn-sm bg-danger-light">
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
                                <!-- /Change Password Tab -->
                                
                            </div>
                        </div>
                    </div>
                
                </div>          
            
            <!-- /Page Wrapper -->

            <!-- start booking -->
                <div class="modal fade" id="Add_booking_details" aria-hidden="true" role="dialog">
                    <div class="modal-dialog " role="document"   >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">إضافة خدمة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('doctors/addservice')}}" method="POST" 
                                    name="le_form"  enctype="multipart/form-data">
                                    @csrf
                                    <div class=" form-row">
                                        <input type="hidden" name="doctorId" value="{{$patients->id}}">
                                        
                                        <div class="col-12 col-sm-12">
                                        <div class="form-group">
                                            <label>الاسم</label>
                                            <input type="text" name="services_name" readonly class="form-control" value="{{$patients->first_name_ar}}">
                                        </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-12">
                                            <div class="form-group">
                                                <label>رقم الموبايل</label>
                                                <input type="text" name="price" readonly class="form-control" value="{{$patients->id}}">
                                            </div>
                                        </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group ">
                                    <label class="col-form-label col-md-2">التخصص</label>
                                    <select class="form-control formselect required" placeholder="Select Category" id="get_doctors_name">
                                        <option value="0" disabled selected>Select</option>                                                 @foreach ($specialities as $_item)
                                           <option value="{{$_item->id}}">{{$_item->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group ">
                                    <label class="col-form-label col-md-2">الدكتور</label>
                                        <select class="form-control formselect" placeholder="Select Sub Category" id="get_doctors">
                                            <option>ergjhet</option>
                                        </select>                                                                                           
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>عنوان الخدمة</label>
                                    <input type="date" name="date" class="form-control" id="get_date">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group " id="get_time">
                                    <!-- <label class="col-form-label col-md-2">الدكتور</label> -->
                                        <!-- <select class="form-control formselect" placeholder="Select Sub Category" id="get_time">
                                            <option>ergjhet</option>
                                        </select>
                                        <h1></h1> -->                                                                                           
                                </div>
                            </div>
                                        
                                    </div>
                                    <br/>
                                        <br/>
                                    <button type="submit" class="btn btn-primary btn-block">أضافة </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        
                <script>
                    $(document).ready(function () {
                    // get doctors
                        $('#get_doctors_name').on('change', function () {
                            let id = $(this).val();
                            // $('#sub_category').empty();
                            // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                            $.ajax({
                                type: 'GET',
                                url: "{{url('getdoctor')}}/"+id,
                                success: function (response) {
                                    var response = JSON.parse(response);
                                    console.log(response);   
                                    $('#get_doctors').empty();
                                    $('#get_doctors').append(`<option value="0" disabled selected>Select </option>`);
                                    response.forEach(element => {
                                        $('#get_doctors').append(`<option value="${element['id']}">${element['first_name_ar']}</option>`);
                                    });
                                }
                           });
                        });
                    //   
                        $('#get_date').on('change', function () {
                            let date = $(this).val();
                            console.log(date);   
                            // $('#sub_category').empty();
                            // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                            $.ajax({
                                type: 'GET',
                                url: "{{url('gettime')}}/"+date,

                                success: function (response) {
                                    var response = JSON.parse(response);
                                       
                                    $('#get_time').empty();
                                    $('#get_time').append(`<option value="0" disabled selected>Select </option>`);
                                    response.forEach(element => {
                                        $('#get_time').append(`<option value="${element['id']}">${element['id']}</option>`);
                                        // console.log(element.time['0']);
                                        console.log(element.time);
                                        for(var r = 0; r < element.time.length; r++)
                                        {
                                            console.log(element.time[r]);
                                            $('#get_time').append(`<option value="${element.time[r]}">${element.time[r]}</option>`);  

                                          //    for(var r = 0; r < element[i].time.length; r++)
                                          //    {   
                                          // //         // data[i].docapointment[r].date
                                                // $('#get_time').append(`<option value="${element[i]['id']}">${element[i]['id']}</option>`);  
                                                // console.log("jgjhhghfhg");           
                                          //    }
                                        }
                                        
                                    });
                                }

                    //             success:function(data)
                                // {
                                //   var output = '';
                                //   // $('#total_records').text(data.length);
                                //   for(var i = 0; i < data.length; i++)
                                //   {
                                   //       for(var r = 0; r < data[i].time.length; r++)
                                   //       {
                                         
                                   //        // output += '<td class="text-center">' + data[i].name + '</td>';
                                   //        // output += '<option value=' .element['time']['id']}'>' ${element['time']['day']}</option>';
                                   //           output +=  data[i].id ;
                                         
                                   //       }                                   
                                //   }
                                //   $('h1').html(output);
                                // }







                           });
                        });    


                    });
                </script>
            <!-- end booking -->
        
        </div>
        <!-- /Main Wrapper -->
@endsection









$('#get_time').append(`<option value="${element.time[r]}">${element.time[r]}</option>`);  
                                            $('#get_time').append(`<label>
                                                <input type="radio" name="radio-button" value="css" value="${element.time[r]}" />
                                                <span style="">${element.time[r]}</span>
                                              </label>`);
                                            
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style>
    label > input[type="radio"] {
      display: none;
    }
    label > input[type="radio"] + *::before {
      content: "";
      display: inline-block;
      vertical-align: bottom;
      width: 0rem;
      height: 0rem;
      margin-right: 0.0rem;
      border-radius: 50%;
      border-style: solid;
      border-width: 0.0rem;
      border-color: gray;
    }
    
    label > input[type="radio"] + * {
      background-color: gray
    }
    label > input[type="radio"]:checked + * {
      color: green;
      background-color: red;
    }
    label > input[type="radio"]:checked + *::before {
      background: red;
      border-color: red;
    }

    fieldset {
      margin: 20px;
      max-width: 400px;
    }
    label > input[type="radio"] + * {
      display: inline-block;
      padding: 0.5rem 1rem;
    }
</style>
<body>


 
  <label>
    <input type="radio" name="radio-button" value="css" checked />
    <span style="">20:20</span>
  </label>
  <label style="">
    <input type="radio" name="radio-button" value="no" />
    <span>No icons or unnecessary DOM</span>
  </label>





</body>
</html>
















@extends('layout.mainlayout_admin')
@section('content') 


<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
                    
                    <!-- Page Header -->
                    <div class="page-header">

<select class="chosen" style="width:500px;">
    <option>Html</option>
    <option>Css</option>
    <option>Css3</option>
    <option>Php</option>
    <option>MySql</option>
    <option>Javascript</option>
    <option>Jquery</option>
    <option>Html5</option>
    <option>Wordpress</option>
    <option>Joomla</option>
    <option>Druple</option>
    <option>Json</option>
    <option>Angular Js</option>
</select>
                        <div class="row">
                            <div class="col">
                                <h3 class="page-title">Profile</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-header">
                                <div class="row align-items-center">
                                    <div class="col-auto profile-image">
                                        <a href="#">
                                            <img class="rounded-circle" alt="User Image" src="../assets_admin/img/profiles/avatar-01.jpg">
                                        </a>
                                    </div>
                                    <div class="col ml-md-n2 profile-user-info">
                                        <h4 class="user-name mb-0">Ryan Taylor</h4>
                                        <h6 class="text-muted">ryantaylor@admin.com</h6>
                                        <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
                                        <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                    </div>
                                    <div class="col-auto profile-btn">
                                        
                                        <a href="" class="btn btn-primary">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-menu">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#per_details_tab">من أنا</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#password_tab">تغيير كلمة المرور </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#booking_apointment_tab">مواعيدي</a>
                                    </li>
                                </ul>
                            </div>  
                            <div class="tab-content profile-tab-cont">
                                
                                <!-- Personal Details Tab -->
                                <div class="tab-pane fade " id="per_details_tab">
                                
                                    <!-- Personal Details -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title d-flex justify-content-between">
                                                        <span>Personal Details</span> 
                                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                    </h5>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                        <p class="col-sm-10">John Doe</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                        <p class="col-sm-10">24 Jul 1983</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                        <p class="col-sm-10">johndoe@example.com</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                        <p class="col-sm-10">305-310-5857</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                        <p class="col-sm-10 mb-0">4663  Agriculture Lane,<br>
                                                        Miami,<br>
                                                        Florida - 33165,<br>
                                                        United States.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Edit Details Modal -->
                                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Personal Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="row form-row">
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>First Name</label>
                                                                            <input type="text" class="form-control" value="John">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Last Name</label>
                                                                            <input type="text"  class="form-control" value="Doe">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>Date of Birth</label>
                                                                            <div class="cal-icon">
                                                                                <input type="text" class="form-control" value="24-07-1983">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Email ID</label>
                                                                            <input type="email" class="form-control" value="johndoe@example.com">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Mobile</label>
                                                                            <input type="text" value="+1 202-555-0125" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <h5 class="form-title"><span>Address</span></h5>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                        <label>Address</label>
                                                                            <input type="text" class="form-control" value="4663 Agriculture Lane">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>City</label>
                                                                            <input type="text" class="form-control" value="Miami">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>State</label>
                                                                            <input type="text" class="form-control" value="Florida">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Zip Code</label>
                                                                            <input type="text" class="form-control" value="22434">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Country</label>
                                                                            <input type="text" class="form-control" value="United States">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Edit Details Modal -->
                                            
                                        </div>

                                    
                                    </div>
                                    <!-- /Personal Details -->

                                </div>
                                <!-- /Personal Details Tab -->
                                
                                <!-- Change Password Tab -->
                                <div id="password_tab" class="tab-pane fade">
                                
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Change Password</h5>
                                            <div class="row">
                                                <div class="col-md-10 col-lg-6">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Old Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>New Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input type="password" class="form-control">
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show active " id="booking_apointment_tab" >
                                        <div class="page-header">
                                                <div class="row">
                                                    <div class="col-sm-7 col-auto">
                                                        <h3 class="page-title">الخدمات  </h3>
                                                    </div>
                                                    <div class="col-sm-5 col">
                                                        <a data-target="#Add_booking_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    @if(session()->has('message'))
                                                    @include('admin.includes.alerts.success')
                                                    @endif
                                                    @if(Session::has('error'))
                                                       <div class="row mr-2 ml-2" >
                                                            <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
                                                               {{Session::get('error')}}
                                                            </button>
                                                        </div>
                                                    @endif 
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table
                                                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>اسم المريض</th>
                                                                            <th>اسم hgv;jmn</th>    
                                                                            <th>التاريخ</th>
                                                                            <th>الوقت</th>  
                                                                            <th class="text-center">أكشن</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($appointments as $_item)
                                                                            <tr>
                                                                                
                                                                                <td class="text-center">
                                                                                    {{ $_item->patient['first_name_ar'] }}
                                                                                </td>   
                                                                                <td class="text-center">
                                                                                    {{ $_item->doctor['first_name_ar'] }}
                                                                                </td>                                       <td class="text-center">
                                                                                    {{ $_item->date }}
                                                                                </td>
                                                                                </td>                                       <td class="text-center">
                                                                                    {{ $_item->time }}
                                                                                </td>               
                                                                                <td class="text-center">
                                                                                    <div class="actions">
                                                                                        <a class="btn btn-sm bg-success-light" data-toggle="modal" 
                                                                                        data-services_name ="{{$_item->services_name}}" 
                                                                                        data-price ="{{ $_item->price }}"                   
                                                                                        data-catid="{{ $_item->id }}" 
                                                                                        data-target="#edit_service">
                                                                                            <i class="fe fe-pencil"></i> تعديل
                                                                                        </a>
                                                                                        <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_service" class="btn btn-sm bg-danger-light">
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
                                <!-- /Change Password Tab -->
                                
                            </div>
                        </div>
                    </div>
                
                </div>          
            
            <!-- /Page Wrapper -->

            <!-- start booking -->
                <div class="modal fade" id="Add_booking_details" aria-hidden="true" role="dialog">
                    <div class="modal-dialog " role="document"   >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">إضافة خدمة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('patients.addbooking')}}" method="POST" 
                                    name="le_form"  enctype="multipart/form-data">
                                    @csrf
                                    <div class=" form-row">
                                        <input type="hidden" name="patientId" value="{{$patients->id}}">
                                        
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>الاسم</label>
                                                <input type="text"  readonly class="form-control" value="{{$patients->first_name_ar}}">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>رقم الموبايل</label>
                                                <input type="text"  readonly class="form-control" value="{{$patients->mobile}}">
                                            </div>
                                        </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="col-form-label col-md-2">التخصص</label>
                                    <select name="" class="form-control formselect required" placeholder="Select Category" id="get_doctors_name">
                                        <option  disabled selected>Select</option>  
                                        @foreach ($specialities as $_item) 
                                           <option value="{{$_item->id}}">{{$_item->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="col-form-label col-md-2">الدكتور</label>
                                        <select name="doctorId" class="form-control formselect" placeholder="Select Sub Category" id="get_doctors">
                                            <!-- <option>ergjhet</option> -->
                                        </select>                                                                                           
                                </div>
                            </div>



<select class="chosen" style="width:500px;">
    <option>Html</option>
    <option>Css</option>
    <option>Css3</option>
    <option>Php</option>
    <option>MySql</option>
    <option>Javascript</option>
    <option>Jquery</option>
    <option>Html5</option>
    <option>Wordpress</option>
    <option>Joomla</option>
    <option>Druple</option>
    <option>Json</option>
    <option>Angular Js</option>
</select>




                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>التاريخ</label>
                                    <input type="date" name="date" class="form-control" id="get_date">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group " id="get_time">
                                                                                                                            
                                </div>
                            </div>
                                        
                                    </div>
                                    <br/>
                                        <br/>
                                    <button type="submit" class="btn btn-primary btn-block">أضافة </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
        
                <script>
                    $(document).ready(function () {
                    // get doctors
                        $('#get_doctors_name').on('change', function () {
                            let id = $(this).val();
                            // $('#sub_category').empty();
                            // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                            $.ajax({
                                type: 'GET',
                                url: "{{url('getdoctor')}}/"+id,
                                success: function (response) {
                                    var response = JSON.parse(response);
                                    console.log(response);   
                                    $('#get_doctors').empty();
                                    $('#get_doctors').append(`<option value="0" disabled selected>Select </option>`);
                                    response.forEach(element => {
                                        $('#get_doctors').append(`<option value="${element['id']}">${element['first_name_ar']}</option>`);
                                    });
                                }
                           });
                        });
                    //   
                        $('#get_date').on('change', function () {
                            let date = $(this).val();
                            console.log(date);   
                            // $('#sub_category').empty();
                            // $('#sub_category').append(`<option value="0" disabled selected>Processing...</option>`);
                            $.ajax({
                                type: 'GET',
                                url: "{{url('gettime')}}/"+date,

                                success: function (response) {
                                    var response = JSON.parse(response);
                                       
                                    $('#get_time').empty();

                                    response.forEach(element => {
                                        
                                        // console.log(element.first_time['0']);
                                        $('#get_time').append(`<h6>الدوام الأول : </h6>`);   
                                        console.log(element.first_time);
                                        for(var r = 0; r < element.first_time.length; r++)
                                        {
                                            // console.log(element.first_time[r]);
                                            if(element.first_time[r]=='لا يوجد مواعيد صباحا'){
                                                $('#get_time').append(`<p>${element.first_time[r]}</p>`);
                                            }else{
                                                $('#get_time').append(`
                                                <label style="margin:10;"><input type="radio" name="time"  value="${element.first_time[r]}" />
                                                <span style="">${element.first_time[r]}</span>
                                              </label>
                                            `);
                                            }
                                            
                                        }
                                        $('#get_time').append(`<br></br>`); 
                                        $('#get_time').append(`<h6>الدوام الثاني : </h6>`);  
                                        for(var r = 0; r < element.second_time.length; r++)
                                        {
                                            // console.log(element.first_time[r]);
                                            // $('#get_time').append(`<option value="${element.first_time[r]}">${element.time[r]}</option>`);  
                                            

                                            if(element.second_time[r]=='لا يوجد مواعيد بعد الظهر'){
                                                $('#get_time').append(`<p>${element.second_time[r]}</p><br/>`);
                                            }else{
                                                $('#get_time').append(`
                                                <label style="margin:10;"><input type="radio" name="time" value="${element.second_time[r]}" />
                                                <span style="">${element.second_time[r]}</span>
                                              </label>
                                            `);
                                            }
                                        }
                                        $('#get_time').append(`<br></br>`); 
                                        $('#get_time').append(`<h6>الدوام الثالث : </h6>`);  
                                        for(var r = 0; r < element.third_time.length; r++)
                                        {
                                            // console.log(element.first_time[r]);
                                            // $('#get_time').append(`<option value="${element.first_time[r]}">${element.time[r]}</option>`);  
                                            if(element.third_time[r]=='لا يوجد مواعيد ف المساء'){
                                                $('#get_time').append(`<p>${element.third_time[r]}</p><br/>`);
                                            }else{
                                                $('#get_time').append(`
                                                <label style="margin:10;"><input type="radio" name="time" value="${element.third_time[r]}" />
                                                <span style="">${element.third_time[r]}</span>
                                              </label>
                                            `);
                                            }

                                            
                                        }
                                        
                                    });
                                }

                    






                           });
                        });    


                    });
                </script>
            
        </div>
<script type="text/javascript">
    $(".chosen").chosen();
</script>
<style>
    label > input[type="radio"] {
      display: none;
    }
    label > input[type="radio"] + *::before {
      content: "";
      display: inline-block;
      vertical-align: bottom;
      width: 0rem;
      height: 0rem;
      margin-right: 0.0rem;
      border-radius: 50%;
      border-style: solid;
      border-width: 0.0rem;
      border-color: gray;
    }
    
    label > input[type="radio"] + * {
      background-color: white;
      box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;
    }
    label > input[type="radio"]:checked + * {
      color: #000;
      background-color: #dedede;
    }
    label > input[type="radio"]:checked + *::before {
         color: #000;
        background-color: #dedede;
    }

   
    label > input[type="radio"] + * {
      display: inline-block;
      padding: 10px 10px;
    }
</style>
@endsection



