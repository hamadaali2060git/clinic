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
                        <h4 class="mb-4">Sidebars </h4>
                        @if(session()->has('message'))
                                                @include('admin.includes.alerts.success')
                                            @endif
                                            @if(session()->has('error'))
                                                @include('admin.includes.alerts.error')
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
                        <div class="appointment-tab">

                            <!-- Appointment Tab -->
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded" style="direction: rtl;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" data-toggle="modal" data-target="#appt_details">Add
                                    Slider</a>
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
                                                            <th>image</th>
                                                            <!-- <th>Title Ar</th>
                                                            <th>Title En</th> -->
                                                            <!-- <th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th> -->
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($sliders as $_item)
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <img class="avatar-img "
                                                                        src="{{asset('img/sliders/'.$_item->image) }}"
                                                                        alt="User Image"  style="width: 80px;height: 31px;"></a>
                                                                </h2>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                  <a class="btn btn-sm bg-success-light" data-toggle="modal"

                                                                    data-catid="{{ $_item->id }}"
                                                                    data-target="#edit_element">
                                                                    <i class="far fa-edit"></i> Edit
                                                                  </a>
                                                                  <!-- <a href="javascript:void(0);"
                                                                      class="btn btn-sm bg-success-light">
                                                                      <i class="far fa-edit"></i> Edit
                                                                  </a> -->
                                                                  <a href="javascript:void(0);" data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete"
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
						<h5 class="modal-title">Add slider</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
          <form action="{{route('sliders.store')}}" method="POST"
                              name="le_form"  enctype="multipart/form-data">
                              @csrf
						<div class="modal-body">

							<div class="form-group">
								<label>Upload image</label>
								<input type="file" name="image" class="form-control">
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
                <form  method="post" action="{{route('sliders.update','test')}}" enctype="multipart/form-data">
        					@csrf
        					@method('put')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="cat_id" >

                        <div class="form-group">
                            <label>Upload image</label>
                            <input type="file" name="image" class="form-control">
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
    <!-- Delete Modal -->
    <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
    				<div class="modal-dialog modal-dialog-centered" role="document" >
    					<div class="modal-content">
    						<div class="modal-header">
    							<h5 class="modal-title">Delete</h5>
    							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    								<span aria-hidden="true">&times;</span>
    							</button>
    						</div>
    						<div class="modal-body">
    							<div class="form-content p-2">
    								<!-- <h4 class="modal-title">حذف</h4> -->
    								<p class="mb-4">Are you sure to delete this item?</p>
    								<div class="row text-center">
    									<div class="col-sm-3">
    									</div>
    									<div class="col-sm-2">
    										<form method="post" action="{{route('sliders.destroy','test')}}">
    	                        @csrf
    	                        @method('delete')
    	                        <input type="hidden" name="id" id="cat_id" >
    	                       	<button type="submit" class="btn btn-primary">Delete</button>
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
    <!-- /Delete Modal -->
    <script src="{{asset('js/app.js')}}"></script>
    <script>
    $('#edit_element').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      // var titleAr = button.data('title_ar')

      var cat_id = button.data('catid')
      var modal = $(this)
      // modal.find('.modal-body #titleAr').val(titleAr);

      modal.find('.modal-body #cat_id').val(cat_id);
    })
    $('#delete').on('show.bs.modal', function (event) {
    console.log('ddvvvv');
          var button = $(event.relatedTarget)
          var cat_id = button.data('catid')
          var modal = $(this)
          modal.find('.modal-body #cat_id').val(cat_id);
      })
    </script>
@endsection
