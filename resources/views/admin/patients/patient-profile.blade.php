@extends('layout.front.main')
@section('content')
<div class="breadcrumb-bar">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-md-12 col-12">
              <nav aria-label="breadcrumb" class="page-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
              </nav>
              <h2 class="breadcrumb-title">Profile</h2>
            </div>
          </div>
        </div>
      </div>
      <!-- /Breadcrumb -->

      <!-- Page Content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar dct-dashbd-lft">

              <!-- Profile Widget -->
              @include('layout.front.sidebar')
              <!-- /Profile Widget -->



            </div>

            <div class="col-md-7 col-lg-8 col-xl-9 dct-appoinment">
              <div class="card">
                <div class="card-body pt-0">
                  <div class="user-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom nav-justified flex-wrap">
                      <li class="nav-item">
                        <a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" href="#pres" data-toggle="tab"><span>Prescription</span></a>
                      </li> -->
                      <li class="nav-item">
                        <a class="nav-link" href="#diagnosis" data-toggle="tab"><span>Diagnosis</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#medical" data-toggle="tab"><span class="med-records">Medical Records</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#aboutPatient" data-toggle="tab"><span>about Patient</span></a>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content">

                    <!-- Appointment Tab -->
                    <div id="pat_appointments" class="tab-pane fade show active">
                      <div class="card card-table mb-0">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                              <thead>
                                <tr>
                                  <th>Patient Name</th>

                                  <th>Booking Date</th>
                                  <th>Amount</th>

                                  <th>Status</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($appointments as $key =>$item)
                                <tr>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="{{asset('img/profiles/'.$item->user_appointment->photo) }}" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">{{$item->user_appointment->first_name}}
                                          {{$item->user_appointment->last_name}}</a>
                                    </h2>
                                  </td>
                                  <td>{{$item->date}} <span class="d-block text-info">{{$item->time}} {{$item->type}}</span></td>

                                  <td>${{$item->price}}</td>

                                  <td>
                                      @if($item->status=='accept')
                                        <span class="badge badge-pill bg-success-light">{{$item->status}}</span>
                                      @elseif($item->status=='cancelled')
                                        <span class="badge badge-pill bg-danger-light">{{$item->status}}</span>
                                      @elseif($item->status=='pending')
                                        <span class="badge badge-pill bg-warning-light">{{$item->status}}</span>
                                      @else
                                          <span class="badge badge-pill bg-info-light">Completed</span>
                                      @endif
                                  </td>
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
                                                                                <input type="radio" name="status" class="switchBootstrap" value="pending" {{ $item->status == 'pending' ? 'checked' : '' }}>
                                                                                <label>Pending </label>
                                                                                <br>
                                                                                <input type="radio" name="status" class="switchBootstrap" value="accept" {{ $item->status == 'accept' ? 'checked' : '' }}>
                                                                                <label>Accept</label>
                                                                                <br>
                                                                                <input type="radio" name="status" class="switchBootstrap" value="expired" {{ $item->status == 'expired' ? 'checked' : '' }}>
                                                                                <label>Expired</label>
                                                                                <br>
                                                                                <input type="radio" name="status" class="switchBootstrap" value="cancelled" {{ $item->status == 'cancelled' ? 'checked' : '' }}>
                                                                                <label>Cancelled</label>
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
                            </table>{{ $appointments->links('admin.custom') }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Appointment Tab -->

                    <!-- Medical Records Tab -->
                    <div class="tab-pane fade" id="medical">
                      <!-- <div class="text-right">
                        <a href="#" class="add-new-btn" data-toggle="modal" data-target="#add_medical_records">Add Medical Records</a>
                      </div> -->
                      <div class="card card-table mb-0">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                              <thead>
                                <tr>
                                  <th>Attachment</th>
                                  <th>Date</th>
                                  <th>time</th>
                                  <th>size </th>
                                  <!-- <th>Created</th> -->
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($records as $key =>$record)
                                <tr>
                                  <td>{{$record->name}}</td>
                                  <td>{{$record->date}}</td>
                                  <td>{{$record->time}}</a></td>
                                  <td>{{$record->size}}</td>
                                  <!-- <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Ruby Perrin <span>Dental</span></a>
                                    </h2>
                                  </td> -->
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>{{ $records->links('admin.custom') }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Medical Records Tab -->

                    <!-- Prescription Tab -->
                    <div class="tab-pane fade" id="diagnosis">
                      <div class="text-right">
                        <a href="add-prescription" class="add-new-btn">Add Prescription</a>
                      </div>
                      <div class="card card-table mb-0">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                              <thead>
                                <tr>
                                  <th>Category </th>
                                  <th>medicine</th>
                                  <th>Notes</th>
                                  <th>Date </th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($diagnosis as $key =>$item)
                                <tr>
                                  <td>{{ $item->categories->title }}</td>
                                  <td>{{$item->medicine}}</td>
                                  <td>{{$item->note}}</td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <!-- <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                      </a> -->
                                      <a href="doctor-profile">{{ $item->date }} <span>{{ $item->time }}</span></a>
                                    </h2>
                                  </td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="edit-prescription" class="btn btn-sm bg-success-light">
                                        <i class="fas fa-edit"></i> Edit
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                  @endforeach

                              </tbody>
                            </table>
                          {{ $diagnosis->links('admin.custom') }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Prescription Tab -->

                    <!-- Prescription Tab -->
                    <div class="tab-pane fade" id="aboutPatient">
                      <div class="card-body">
                        <!-- Profile Settings Form -->
                        <form>
                          <div class="row form-row">
                            <div class="col-12 col-md-12">
                              <div class="form-group">
                                <div class="change-avatar">
                                  <div class="profile-img">
                                    <img src="{{asset('img/profiles/'.$patients->photo) }}" alt="User Image">
                                  </div>

                                </div>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>First Name:</label>
                                <input type="text" class="form-control" value="{{$patients->first_name}}" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="{{$patients->last_name}}" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>Date of Birth</label>
                                  <input type="text" class="form-control " value="{{$patients->dateOfBirth}}" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>Blood Group</label>
                                <select class="form-control select" disabled>
                                  <option selected >{{$patients->bloode_group}}</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>Email ID</label>
                                <input type="email" class="form-control" value="{{$patients->email}}" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" value="{{$patients->mobile}}" class="form-control" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                              <label>Gender</label>
                                <input type="text" class="form-control" value="{{$patients->gender}}" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                              <label>Height</label>
                                <input type="text" class="form-control" value="{{$patients->height}}" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                              <label>Weight</label>
                                <input type="text" class="form-control" value="{{$patients->weight}}" disabled>
                              </div>
                            </div>
                            <div class="col-12 col-md-6">
                              <div class="form-group">
                              <label>marital_status</label>
                                <input type="text" class="form-control" value="{{$patients->marital_status}}" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                          </div>
                        </form>
                        <!-- /Profile Settings Form -->
                      </div>
                    </div>
                    <!-- /Prescription Tab -->

                    <!-- Billing Tab -->
                    <div class="tab-pane" id="billing">
                      <div class="text-right">
                        <a class="add-new-btn" href="add-billing">Add Billing</a>
                      </div>
                      <div class="card card-table mb-0">
                        <div class="card-body">
                          <div class="table-responsive">

                            <table class="table table-hover table-center mb-0">
                              <thead>
                                <tr>
                                  <th>Invoice No</th>
                                  <th>Doctor</th>
                                  <th>Amount</th>
                                  <th>Paid On</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0010</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Ruby Perrin <span>Dental</span></a>
                                    </h2>
                                  </td>
                                  <td>$450</td>
                                  <td>14 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0009</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Darren Elder <span>Dental</span></a>
                                    </h2>
                                  </td>
                                  <td>$300</td>
                                  <td>13 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                      <a href="edit-billing" class="btn btn-sm bg-success-light">
                                        <i class="fas fa-edit"></i> Edit
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                                        <i class="far fa-trash-alt"></i> Delete
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0008</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Deborah Angel <span>Cardiology</span></a>
                                    </h2>
                                  </td>
                                  <td>$150</td>
                                  <td>12 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0007</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Sofia Brient <span>Urology</span></a>
                                    </h2>
                                  </td>
                                  <td>$50</td>
                                  <td>11 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0006</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Marvin Campbell <span>Ophthalmology</span></a>
                                    </h2>
                                  </td>
                                  <td>$600</td>
                                  <td>10 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0005</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Katharine Berthold <span>Orthopaedics</span></a>
                                    </h2>
                                  </td>
                                  <td>$200</td>
                                  <td>9 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0004</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Linda Tobin <span>Neurology</span></a>
                                    </h2>
                                  </td>
                                  <td>$100</td>
                                  <td>8 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0003</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Paul Richard <span>Dermatology</span></a>
                                    </h2>
                                  </td>
                                  <td>$250</td>
                                  <td>7 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0002</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. John Gibbs <span>Dental</span></a>
                                    </h2>
                                  </td>
                                  <td>$175</td>
                                  <td>6 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    <a href="invoice-view">#INV-0001</a>
                                  </td>
                                  <td>
                                    <h2 class="table-avatar">
                                      <a href="doctor-profile" class="avatar avatar-sm mr-2">
                                        <img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                                      </a>
                                      <a href="doctor-profile">Dr. Olga Barlow <span>#0010</span></a>
                                    </h2>
                                  </td>
                                  <td>$550</td>
                                  <td>5 Nov 2019</td>
                                  <td class="text-right">
                                    <div class="table-action">
                                      <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                        <i class="fas fa-print"></i> Print
                                      </a>
                                      <a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                                        <i class="far fa-eye"></i> View
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Billing Tab -->

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
            <!-- /Page Content -->


    <!-- Add Medical Records Modal -->
    <div class="modal fade custom-modal" id="add_medical_records">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Medical Records</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label>Date</label>
                <input type="text" class="form-control datetimepicker" value="31-10-2019">
              </div>
              <div class="form-group">
                <label>Description ( Optional )</label>
                <textarea class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Upload File</label>
                <input type="file" class="form-control">
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
    <!-- /Add Medical Records Modal -->


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
@endsection
