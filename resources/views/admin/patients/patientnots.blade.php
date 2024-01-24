@extends('layout.mainlayout_admin')
@section('content')
<!-- Breadcrumb -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Doctor Notifaction</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active"> Notifaction</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				<div class="card author-widget clearfix">
									<div class="card-header">
										<h4 class="card-title">About Author</h4>
										</div>
										
										@foreach ($patient_notttt as $_itemmm) 
        								    @foreach ($_itemmm->readnotifications as $_items) 
        									 <div class="card-body">
        										<div class="about-author">
        											<div class="about-author-img">
        												<div class="author-img-wrap">
        													<a href="doctor-profile">
        													<!--@if($_items->photo !=null)    -->
        													<!--    <img class="img-fluid rounded-circle" alt="" -->
        													<!--src="{{asset('assets_admin/img/patients/photo/'.$_items->photo) }}" width="50px" height="50px">-->
        													<!--@else -->
        													<!--    <img class="img-fluid rounded-circle" alt="" -->
        													<!--src="{{asset('assets_admin/img/profile_image.png') }}"  width="50px" height="50px">-->
        													<!--@endif-->
        													</a>
        												</div>
        											</div>
        											<div class="author-details">
        												<!--<a href="doctor-profile" class="blog-author-name">Dr. {{$_items->name}}</a><br>-->
        												<a  class="blog-author-name"> {{$_items->data['title']}}</a><br>
        												<!--<h6 href="doctor-profile" class="">Dr. {{$_items->title}}<h6>-->
                                                        
        												<p class="mb-0">{{$_items->data['data']}}</p>
        											</div>
        										</div>
        									</div>
        									<hr>
            								@endforeach
            							@endforeach
										
									
									<hr>
								</div>
				</div>			
			</div>

@endsection