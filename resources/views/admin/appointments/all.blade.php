<?php $page="doctor-dashboard";?>
@extends('layout.front.main')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                <!-- Profile Sidebar -->
                @include('layout.front.sidebar')
                <!-- /Profile Sidebar -->

            </div>

            <div class="col-md-7 col-lg-8 col-xl-9">



                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Patient Appoinment</h4>
                        <div class="appointment-tab">

                            <!-- Appointment Tab -->
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upcoming-appointments"
                                        data-toggle="tab">Upcoming</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                                </li>
                            </ul>
                            <!-- /Appointment Tab -->

                            <div class="tab-content">

                                <!-- Upcoming Appointment Tab -->
                                <div class="tab-pane show active" id="upcoming-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <!-- <th>Purpose</th> -->
                                                            <!-- <th>Type</th> -->
                                                            <th class="text-center">Paid Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($appointments as $key =>$item)
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('img/profiles/'.$item->user_appointment->photo) }}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile">{{$item->user_appointment->first_name}}
                                                                        {{$item->user_appointment->last_name}}</a>
                                                                </h2>
                                                            </td>
                                                            <td> {{$item->date}}<span
                                                                    class="d-block text-info">{{$item->time}} {{$item->type}}</span>
                                                            </td>
                                                            <!-- <td>General</td> -->
                                                            <!-- <td>New Patient</td> -->
                                                            <td class="text-center">${{$item->price}}</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="#" class="btn btn-sm bg-info-light"
                                                                        data-toggle="modal" data-target="#appt_details">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);" data-toggle="modal"
                                                                      data-target="#status{{$key}}"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> {{$item->status}}
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="status{{$key}}" aria-hidden="true" role="dialog">
                                                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="form-content p-2">
                                                                                <h4 class="modal-title">Change appointment status</h4>

                                                                                <div class="row text-center">
                                                                                <div class="col-sm-3">
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <form method="post" action="{{route('appointments.update.status')}}">
                                                                                            @csrf
                                                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                                                            <div class="col-md-12">
                                                                                              <div class="">
                                                                                                <div class="card-content">
                                                                                                  <div class="card-body" style="text-align: right;">
                                                                                                    <fieldset>
                                                                                                      <div class="float-left">
<br>
                                                                                                        <input type="radio" name="status" class="switchBootstrap" value="1" {{ $item->status == 'pending' ? 'checked' : '' }}>
                                                                                                        <label>Pending </label>
                                                                                                        <br>
                                                                                                        <input type="radio" name="status" class="switchBootstrap" value="0" {{ $item->status == 'accept' ? 'checked' : '' }}>
                                                                                                        <label>Accept</label>
                                                                                                        <br>
                                                                                                        <input type="radio" name="status" class="switchBootstrap" value="2" {{ $item->status == 'expired' ? 'checked' : '' }}>
                                                                                                        <label>Expired</label>
                                                                                                        <br>
                                                                                                      </div>
                                                                                                    </fieldset>
                                                                                                  </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>

                                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                                        </form>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $appointments->links('admin.custom') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Upcoming Appointment Tab -->

                                <!-- Today Appointment Tab -->
                                <div class="tab-pane" id="today-appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Patient Name</th>
                                                            <th>Appt Date</th>
                                                            <!-- <th>Purpose</th>
                                                                <th>Type</th> -->
                                                            <th class="text-center">Paid Amount</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($appointments_today as $key => $_item)
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a href="patient-profile"
                                                                        class="avatar avatar-sm mr-2"><img
                                                                            class="avatar-img rounded-circle"
                                                                            src="{{asset('img/profiles/'.$_item->user_appointment->photo) }}"
                                                                            alt="User Image"></a>
                                                                    <a href="patient-profile">{{$_item->user_appointment->first_name}}
                                                                        {{$_item->user_appointment->last_name}}</a>
                                                                </h2>
                                                            </td>
                                                            <td> {{$_item->date}}<span
                                                                    class="d-block text-info">{{$_item->time}} {{$item->type}}</span>
                                                            </td>
                                                            <!-- <td>General</td> -->
                                                            <!-- <td>New Patient</td> -->
                                                            <td class="text-center">${{$_item->price}}</td>
                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="#" class="btn btn-sm bg-info-light"
                                                                        data-toggle="modal" data-target="#appt_details">
                                                                        <i class="far fa-eye"></i> View
                                                                    </a>

                                                                    <a href="javascript:void(0);" data-toggle="modal"
                                                                      data-target="#status_today{{$key}}"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> {{$_item->status}}
                                                                    </a>
                                                                    <!-- <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a> -->
                                                                </div>
                                                            </td>
                                                        </tr>


                                                        <div class="modal fade" id="status_today{{$key}}" aria-hidden="true" role="dialog">
                                                                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                                    <div class="modal-content">
                                                                        <div class="modal-body">
                                                                            <div class="form-content p-2">
                                                                                <h4 class="modal-title">Change appointment status </h4>

                                                                                <div class="row text-center">
                                                                                <div class="col-sm-3">
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <form method="post" action="{{route('appointments.update.status')}}">
                                                                                            @csrf
                                                                                            <input type="hidden" name="id" value="{{ $_item->id }}">
                                                                                            <div class="col-md-12">
                                                                                              <div class="">
                                                                                                <div class="card-content">
                                                                                                  <div class="card-body" style="text-align: right;">
                                                                                                    <fieldset>
                                                                                                      <div class="float-left">
<br>
                                                                                                        <input type="radio" name="status" class="switchBootstrap" value="pending" {{ $_item->status == 'pending' ? 'checked' : '' }}>
                                                                                                        <label>Pending </label>
                                                                                                        <br>
                                                                                                        <input type="radio" name="status" class="switchBootstrap" value="accept" {{ $_item->status == 'accept' ? 'checked' : '' }}>
                                                                                                        <label>Accept</label>
                                                                                                        <br>
                                                                                                        <input type="radio" name="status" class="switchBootstrap" value="expired" {{ $_item->status == 'expired' ? 'checked' : '' }}>
                                                                                                        <label>Expired</label>
                                                                                                        <br>

                                                                                                      </div>
                                                                                                    </fieldset>
                                                                                                  </div>
                                                                                                </div>
                                                                                              </div>
                                                                                            </div>

                                                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                                                        </form>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>

                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $appointments_today->links('admin.custom') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Today Appointment Tab -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

<!-- Appointment Details Modal -->
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="info-details">
                    <li>
                        <div class="details-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="title">#APT0001</span>
                                    <span class="text">21 Oct 2019 10:00 AM</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <button type="button" class="btn bg-success-light btn-sm"
                                            id="topup_status">Completed</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="title">Status:</span>
                        <span class="text">Completed</span>
                    </li>
                    <li>
                        <span class="title">Confirm Date:</span>
                        <span class="text">29 Jun 2019</span>
                    </li>
                    <li>
                        <span class="title">Paid Amount</span>
                        <span class="text">$450</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Appointment Details Modal -->
<!-- edit Modal -->
<div class="modal fade custom-modal" id="edit_element">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form  method="post" action="{{route('appointments.update','test')}}" enctype="multipart/form-data">
    					@csrf
    					@method('put')
                <div class="modal-body">
                    <input type="hidden" name="id" id="cat_id" >
                    <div class="form-group">
                        <label>title Ar</label>
                        <input type="text" name="title_ar" class="form-control" value="" id="appntStatus">
                    </div>
                    <div class="form-group">
                        <label>title En</label>
                        <input type="text" name="title_en" class="form-control" value="" id="titleEn">
                    </div>
                    <!-- <div class="form-group">
								<label>Description ( Optional )</label>
								<textarea class="form-control"></textarea>
							</div> -->
                    <div class="form-group">
                        <label>Upload icon</label>
                        <input type="file" name="icon" class="form-control">
                    </div>
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        <button type="button" class="btn btn-secondary submit-btn" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /edit Modal -->
<script src="{{asset('js/app.js')}}"></script>
<script>
  $('#edit_element').on('show.bs.modal', function (event) {
  	var button = $(event.relatedTarget)
  	var appntStatus = button.data('appnt_status')
  	var cat_id = button.data('catid')
  	var modal = $(this)
  	modal.find('.modal-body #appntStatus').val(appntStatus);
  	modal.find('.modal-body #cat_id').val(cat_id);
  })
</script>
@endsection
