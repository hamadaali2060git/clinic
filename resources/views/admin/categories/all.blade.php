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
                @include('layout.front.sidebar')
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar1">
                                                <div class="circle-graph1" data-percent="75">
                                                    <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Total Patient</h6>
                                                <h3>1500</h3>
                                                <p class="text-muted">Till Today</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget dct-border-rht">
                                            <div class="circle-bar circle-bar2">
                                                <div class="circle-graph2" data-percent="65">
                                                    <img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Today Patient</h6>
                                                <h3>160</h3>
                                                <p class="text-muted">06, Nov 2019</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-4">
                                        <div class="dash-widget">
                                            <div class="circle-bar circle-bar3">
                                                <div class="circle-graph3" data-percent="50">
                                                    <img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                                </div>
                                            </div>
                                            <div class="dash-widget-info">
                                                <h6>Appoinments</h6>
                                                <h3>85</h3>
                                                <p class="text-muted">06, Apr 2019</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Patient Appoinment</h4>

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
                                    <a class="nav-link active" href="#" data-toggle="modal" data-target="#add_new">Add
                                        Category</a>
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
                                                        @foreach ($categories as $_item)
                                                        <tr>
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <img class="avatar-img rounded-circle"
                                                                        src="{{asset('img/categories/'.$_item->icon) }}"
                                                                        alt="User Image"
                                                                        style="background:#15558d;margin: 11px;width: 36px;height: 36px;"></a>
                                                                    {{ $_item->title_ar }}
                                                                </h2>
                                                            </td>
                                                            <td>
                                                                {{$_item->title_en}}
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="table-action">
                                                                    <a class="btn btn-sm bg-success-light" data-toggle="modal"
                                                                      data-title_ar ="{{$_item->title_ar}}"
                                                                      data-title_en="{{ $_item->title_en }}"
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
<!-- Appointment Details Modal -->
<div class="modal fade custom-modal" id="add_new">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('categories.store')}}" method="POST"
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>title ar</label>
                        <input type="text" name="title_ar" class="form-control " value="{{old('title_ar')}}">
                    </div>
                    <div class="form-group">
                        <label>title en</label>
                        <input type="text" name="title_en" class="form-control " value="{{old('title_en')}}">
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
            <form  method="post" action="{{route('categories.update','test')}}" enctype="multipart/form-data">
    					@csrf
    					@method('put')
                <div class="modal-body">
                    <input type="hidden" name="id" id="cat_id" >
                    <div class="form-group">
                        <label>title Ar</label>
                        <input type="text" name="title_ar" class="form-control" value="" id="titleAr">
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
										<form method="post" action="{{route('categories.destroy','test')}}">
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
	var titleAr = button.data('title_ar')
  var titleEn = button.data('title_en')
	var cat_id = button.data('catid')
	var modal = $(this)
	modal.find('.modal-body #titleAr').val(titleAr);
	modal.find('.modal-body #titleEn').val(titleEn);
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
