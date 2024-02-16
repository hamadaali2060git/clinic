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
                @include('layout.front.Sidebar')
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">articles</h4>
                        <div class="appointment-tab">

                            <!-- Appointment Tab -->
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded" style="direction: rtl;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" data-toggle="modal" data-target="#appt_details">Add
                                    Article</a>
                                       
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
                                                            <th>Title Ar</th>
                                                            <th>Title En</th>
                                                            <!-- <th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th> -->
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($articles as $_item)
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <img class="avatar-img "
                                                                        src="{{asset('img/articles/'.$_item->image) }}"
                                                                        alt="User Image" style="width: 80px;height: 45px;"></a>
                                                                    
                                                                </h2>
                                                            </td>
                                                            <td>
                                                                {{$_item->title_ar}}
                                                            </td>
                                                            <td>
                                                                {{$_item->title_en}}
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-success-light">
                                                                        <i class="far fa-edit"></i> Edit
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                        class="btn btn-sm bg-danger-light">
                                                                        <i class="far fa-trash-alt"></i> Delete
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
                                <!-- /Upcoming Appointment Tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->
</div>
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
					<form>					
						<div class="modal-body">
							<div class="form-group">
								<label>title ar</label>
								<input type="text" class="form-control datetimepicker" value="">
							</div>
                            <div class="form-group">
								<label>title en</label>
								<input type="text" class="form-control datetimepicker" value="">
							</div>
							<div class="form-group">
								<label>Description ar </label>
								<textarea class="form-control" name="description_ar"></textarea>
							</div>
                            <div class="form-group">
								<label>Description en</label>
								<textarea class="form-control" name="description_en"></textarea>
							</div>
							<div class="form-group">
								<label>Upload image</label> 
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
		<!-- /Appointment Details Modal -->
@endsection