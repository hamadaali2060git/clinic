@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<style >

.modal-dialog {
    max-width: 890px ;
}

</style>
<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">بيانات الدكتور : {{$doctors->first_name_ar }}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">الدكتور</li>
								</ul>
							</div>
						</div>
						@if(session()->has('message'))
                            @include('admin.includes.alerts.success')
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

						@if(Session::has('error'))
                               <div class="row mr-2 ml-2" >
                                    <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" id="type-error">
                                       {{Session::get('error')}}
                                    </button>
                                </div>
                            @endif 
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{asset('assets_admin/img/doctors/photo/'.$doctors->photo) }}">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"> {{$doctors->first_name_ar }}</h4>
										<h6 class="text-muted"> {{$doctors->email }}</h6>
										<div class="user-Location">
											<i class="fa fa-map-marker"></i>
											 {{$doctors->address_ar }}
											</div>
										<div class="about-text"> {{$doctors->address_en }}</div>
									</div>
									<!-- <div class="col-auto profile-btn">
										
										<a href="" class="btn btn-primary">
											Edit
										</a>
									</div> -->
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" data-target="#Workingـhours_tab" href="#">اوقات الدوام </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" data-target="#services_tab" href="#">الخدمات </a>
									</li>
									<li class="nav-item">
										<a class="nav-link " data-toggle="tab" data-target="#offers_tab" href="#">العروض </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#per_details_tab">من انا </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#appointments_tab">حجوزاتي </a>
									</li>
									<li class="nav-item">
										<a class="nav-link " data-toggle="tab" href="#reviews_tab">التقييمات </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#payments_tab">المدفوعات </a>
									</li>
									<li class="nav-item">
										<a class="nav-link " data-toggle="tab" href="#article_tab">المقالات </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab"
										data-target="#password_tab" href="#">كلمة المرور</a>
									</li>
																								
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont" >
								<div class="tab-pane fade " id="article_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">المقالات  </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_article"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة مقال جديدة</a>
													</div>
												</div>
										</div>
										<div class="row">
										<div class="col-sm-12">
											
											<div class="card">
												<div class="card-body">
													<div class="table-responsive">
						                                <table
						                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
						                                    <thead>
																<tr>													
																	<th>صورة المقال</th>
																	<th>عنوان المقال عربي</th>
																	<th>عنوان المقال انجليزي</th>
																	<th>الوصف عربي</th>
																	<th>الوصف انجليزي</th>
																	<th class="text-right">أكشن</th>
																</tr>
															</thead>
															<tbody>
																
															@foreach ($articles as $_item)
																<tr>	
																    <td class="text-center">
																		<img class="avatar-img" src="{{asset('assets_admin/img/article/'.$_item->image) }}" alt="Speciality" width="50" height="50">
																	</td>												
																	<td>
																		{{ $_item->title_ar }}
																	</td>
																	<td>
																		{{ $_item->title_en }}
																	</td>
																	<td>
																		{{ mb_strimwidth($_item->description_ar,0,30) }}
																	</td>
																	<td>
																		{{ mb_strimwidth($_item->description_en,0,30) }}
																	</td>
																
																	<td class="text-right">
																		<div class="actions">
																			<a class="btn btn-sm bg-success-light" data-toggle="modal" 
																			data-specialityId="{{ $_item->specialityId }}"
																			data-title_ar ="{{ $_item->title_ar }}" 
																			data-title_en ="{{ $_item->title_en }}" 
																			data-description_ar ="{{ $_item->description_ar }}" 
																			data-description_en ="{{ $_item->description_en }}"
																			data-image ="{{ $_item->image }}" 
																			data-catid="{{ $_item->id }}" 
																			data-target="#edit_article">
																				<i class="fe fe-pencil"></i> تعديل
																			</a>
																			<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_article" class="btn btn-sm bg-danger-light">
																				<i class="fe fe-trash"></i> Delete
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
								<div class="tab-pane fade " id="payments_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">التقييمات  </h3>
													</div>
													<!-- <div class="col-sm-5 col">
														<a data-target="#Add_services_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
													</div> -->
												</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="card">
													<div class="card-body">
														<div class="table-responsive">
							                                <table
							                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
							                                    <thead>
																	<tr>
																		<th>اسم المريض</th>

																		<th>سبب الدفع</th>
																		<th>التاريخ</th>
																		<th>المبلغ</th>
																		
																		
																		<th class="text-center">أكشن</th>
																	</tr>
																</thead>

																<tbody>
																	@foreach ($payment as $_item)
																
																	
																	<tr role="row" class="odd">
																		<td class="sorting_1">
																			<h2 class="table-avatar">
																				<a href="profile.html" class="avatar avatar-sm mr-2">
<img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/patients/'.$_item->patient->photo) }}" alt="User Image" width="60px" height="60px">

																				<a href="profile.html"> {{$_item->patient['first_name_ar']}}</a>
																			</h2>
																		</td>
																		<td class="sorting_1">
																			{{$_item->type}}
																		</td>
																	
																		<td class="sorting_1">
																			<!-- {{$_item->date}}  - 
																			{{ mb_strimwidth($_item->time,0,5) }} -->
																			{{ \Carbon\Carbon::parse($_item->created_at)->format('H:i Y-m-d')}}
																		</td>
																		
																		<td class="sorting_1">
																			{{$_item->amount}}
																		</td>
																		
																		<td class="text-center">
																			<div class="actions">
																				
																				<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_payment" class="btn btn-sm bg-danger-light">
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

								<div class="tab-pane fade " id="reviews_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">التقييمات  </h3>
													</div>
													<!-- <div class="col-sm-5 col">
														<a data-target="#Add_services_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
													</div> -->
												</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="card">
													<div class="card-body">
														

														<div class="table-responsive">
							                                <table
							                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
							                                    <thead>
																	<tr>
																		<th>اسم المريض</th>

																		<th>التقييم</th>
																		<th>الوصف</th>
																		<th>التاريخ</th>
																		
																		
																		<th class="text-right">أكشن</th>
																	</tr>
																</thead>

																<tbody>
																	@foreach ($reviews as $_item)
																
																	
																	<tr role="row" class="odd">
																		<td class="sorting_1">
																			<h2 class="table-avatar">
																				<a href="profile.html" class="avatar avatar-sm mr-2">
																					<img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/patients/'.$_item->patient['photo']) }}" alt="User Image" width="60px" height="60px">
																				<a href="profile.html"> {{$_item->patient['first_name_ar']}}</a>
																			</h2>
																		</td>
																	
																		<td>
																			@for ($i = 0; $i < $_item->rate; $i++)
																				<i class="fe fe-star text-warning"></i>
																		    @endfor							        
																		</td>
																		<td>
																			{{$_item->comment}}
																		<td>{{ mb_strimwidth($_item->created_at,0,10) }} <br>
																			<small>{{ substr($_item->created_at,10,11) }}</small></</td>
																		<td class="text-right">
																			<div class="actions">

																				<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_review" class="btn btn-sm bg-danger-light">
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

								<div class="tab-pane fade show active" id="Workingـhours_tab" >								
									<!-- <div  style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;background-color: white;"> -->
										<!-- Page Header -->
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">اوقات الدوام </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_apointment_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">اضافة جديد</a>
													</div>
												</div>
										</div>
										<div class="row">
												<div class="col-sm-12">
													
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
								                                <table
								                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
								                                    <thead>
																		<tr>
																			<th>اليوم</th>
																			<th>بداية الفترج الأولى</th>
																			<th>نهاية الفترة الاوى</th>
																			<th>بداية الفترة الثانية</th>
																			<th>نهاية الفترة الثانية</th>
																			<th>بداية الفترة الثالثة</th>
																			<th>نهاية الفترة الثالثة</th>
																			<th>مدة الفحص</th>
																			<th class="text-right">أكشن</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach ($workday as $_item)
																			<tr>	
																				<td class="text-center">
																					{{ $_item->day }}
																				</td>
																				<td class="text-center">
																					{{ $_item->from_morning }}
																				</td>
																				<td class="text-center">
																					{{ $_item->to_morning }}
																				</td>
																				<td class="text-center">
																					{{ $_item->from_afternoon }}
																				</td>
																				<td class="text-center">
																					{{ $_item->to_afternoon }}
																				</td>
																				<td class="text-center">
																					{{ $_item->from_evening }}
																				</td>
																				<td class="text-center">
																					{{ $_item->to_evening }}
																				</td>
																				<td class="text-center">
																					{{ $_item->duration }}
																				</td>														
																				<td class="text-center">
																					<div class="actions">
																						<a class="btn btn-sm bg-success-light" data-toggle="modal" 
																						data-day ="{{$_item->day}}" 
																						data-from_morning ="{{ $_item->from_morning }}"
																						data-to_morning ="{{ $_item->to_morning }}"
																						data-from_afternoon ="{{ $_item->from_afternoon }}"
																						data-to_afternoon ="{{ $_item->to_afternoon }}"
																						data-from_evening ="{{ $_item->from_evening }}"
																						data-to_morning ="{{ $_item->to_morning }}"
																						data-to_evening ="{{ $_item->to_evening }}"
																						data-catid="{{ $_item->id }}" 
																						data-target="#edit">
																							<i class="fe fe-pencil"></i> تعديل
																						</a>
																						<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="btn btn-sm bg-danger-light">
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
								<div class="tab-pane fade " id="services_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">الخدمات  </h3>
													</div>
													<!-- <div class="col-sm-5 col">
														<a data-target="#Add_services_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة خدمة جديدة</a>
													</div> -->
												</div>
										</div>
										<div class="row">
												<div class="col-sm-12">
													
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
								                                <table
								                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
								                                    <thead>
																		<tr>
																			<th>عنوان الخدمة عربي</th>
																			<th>عنوان الخدمة انجليزي</th>
																			<th>السعر</th>	
																			<th>النوع </th>	
																			<th>الحالة </th>	
																			<th class="text-center">أكشن</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach ($services as $_item)
																			<tr>
																				<td class="text-center">
																					{{ $_item->services_name_ar }}
																				</td>
																				<td class="text-center">
																					{{ $_item->services_name_en }}
																				</td>
																				<td class="text-center">
																					{{ $_item->price }}
																				</td>
																				<td class="text-center">
																					{{ $_item->type }}
																				</td>
																				<td class="text-center">
																					@if($_item->status==1)
																						مفعل
																					@else
																						غير مفعل
																					@endif
																					
																				</td>														
																				<td class="text-center">
																					<div class="actions">
																						<a class="btn btn-sm bg-success-light" href="{{ url('service/'.$_item->id).'/edit' }}"><i class="fe fe-pencil"></i> تعديل</a>

																						<!-- <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_service" class="btn btn-sm bg-danger-light">
																							<i class="fe fe-trash"></i> حذف
																						</a> -->
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

								<div class="tab-pane fade " id="offers_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">العروض  </h3>
													</div>
													<div class="col-sm-5 col">
														<a data-target="#Add_offers_details"  data-toggle="modal" class="btn btn-primary float-right mt-2">إضافة عرض</a>
													</div>
												</div>
										</div>
										<div class="row">
												<div class="col-sm-12">
													
													<div class="card">
														<div class="card-body">
															<div class="table-responsive">
								                                <table
								                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
								                                    <thead>
																		<tr>
																			<th>عنوان العرض عربي </th>
																			<th>عنوان العرض انجليزي </th>
																			<th>الوصف عربي</th>	
																			<th>الوصف انجليزي</th>	
																			<th>السعر القديم</th>	
																			<th>السعر الجديد</th>
																			<th>نوع العرض</th>	
																			<th>صورة العرض</th>	
																			<th class="text-center">أكشن</th>
																		</tr>
																	</thead>
																	<tbody>
																		@foreach ($offers as $_item)
																			<tr>
																				<td class="text-center">
																					{{ $_item->offer_name_ar }}
																				</td>
																				<td class="text-center">
																					{{ $_item->offer_name_en}}
																				</td>
																				<td class="text-center">
																					{{ $_item->description_ar }}
																				</td>
																				<td class="text-center">
																					{{ $_item->description_en }}
																				</td>
																				<td class="text-center">
																					{{ $_item->old_price }}
																				</td>
																				<td class="text-center">
																					{{ $_item->new_price }}
																				</td>
																				<td class="text-center">
																					{{ $_item->type }}
																				</td>	
																				<td>
																					<a href="{{url('doctor-profile/'.$_item->id) }}"> 
																						<img class="avatar-img rounded-circle" 
																							src="{{asset('assets_admin/img/offers/'.$_item->image) }}" alt="offer Image" width="60px" height="60px">
																					</a>
																				</td>													
																				<td class="text-center">
																					<div class="actions">								
																						<a class="btn btn-sm bg-success-light" href="{{ url('offer/'.$_item->id).'/edit' }}"><i class="fe fe-pencil"></i> تعديل</a>
																						<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete_offers" class="btn btn-sm bg-danger-light">
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
								<div class="tab-pane fade" id="appointments_tab" >										
										<div class="page-header">
												<div class="row">
													<div class="col-sm-7 col-auto">
														<h3 class="page-title">حجوزاتي  </h3>
													</div>
													
												</div>
										</div>
										<div class="row">
												<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<div class="table-responsive">
				                                <table
				                                    class="table table-bordered table-striped table-hover js-basic-example dataTable">
				                                    <thead>
														<tr>
															<th>صورة الدكتور </th>
															<th>أسم الدكتور</th>
															<th>التخصص</th>
															<th>صورة المريض</th>
															<th>أسم المريض</th>
															<th>وقت الموعد</th>
															<th>حالة الموعد</th>
															<th>اكشن</th>
														</tr>
													</thead>
													<tbody>
													@foreach ($appointments as $_item)
														<tr>
															<td>
																<a href="{{url('doctor-profile/'.$_item->doctor['id']) }}">
																<img class="avatar-img rounded-circle" 
																		src="{{asset('assets_admin/img/doctors/photo/'.$doctors->photo) }}" alt="User Image" width="60px" height="60px"></a>
															</td>
															<td>
																<a href="{{url('doctor-profile/'.$_item->doctor['id']) }}">{{$_item->doctor['first_name_ar']}}</a>
																
															</td>
															<td>
																@foreach ($_item->category as $_appoin)
																	@if($_appoin->id == $_item->doctor['specialityId'])
																	   {{$_appoin->name_ar}}
																	   
																	@endif
																@endforeach
																
															</td>
															<td class="text-center">
																<h2 class="table-avatar">
																	<a href="{{url('patient-profile/') }}">
																	    <img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/patients/'.$_item->patient['photo']) }}" alt="User Image" width="60px" height="60px">
																	</a>
																</h2>
															</td>
															<td>
																<a href="{{url('patient-profile/') }}">{{$_item->patient['first_name']}} </a>
															</td>
															<td> {{$_item->date}}
																<span class="text-primary d-block">{{$_item->time}}</span></td>
															<td>
																
															<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		               	                                        <a href="#" > <span data-toggle="modal" data-target="#exampleModall" class=""> 
		               	                                        	@if($_item->status=='confirmed')
		               	                                        		<span class="badge badge-pill bg-success-light">تم الموافقة</span> 
		               	                                        	@elseif($_item->status=='cancelled')
		               	                                        		<span class="badge badge-pill bg-danger-light">تم الرفض</span> 
		               	                                        	@elseif($_item->status=='pending')
		               	                                        		<span class="badge badge-pill bg-warning-light">قيد الانتظار</span>
		               	                                        				<img class="avatar-img rounded-circle" 
																		src="{{asset('assets_admin/img/wait.png') }}" alt="User Image" width="60px" height="60px">
		               	                                        	@elseif($_item->status=='combledted')
		               	                                        		<span class="badge badge-pill bg-primary-light">أكتمل</span>
		               	                                        	@elseif($_item->status=='absent')
		               	                                        		<span class="badge badge-pill  btn-secondary">لم يأتي</span>	
		               	                                        
		               	                                        	@endif
		               	                                        </a>   
		                                                                                       
		                                                        <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog"
		                                                                           aria-labelledby="formModal" aria-hidden="true">
		                                                        <div class="modal-dialog" role="document" >
		                                                            <div class="modal-content">
		                                                                <div class="modal-header">
		                                                                    <h5 class="modal-title" id="formModal">صلاحية المستخدم</h5>
		                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                                                        <span aria-hidden="true">&times;</span>
		                                                                    </button>
		                                                                </div>
		                                                                <div class="modal-body" style="margin: 20px">
		                                                                <form   action="{{url('appointments/update/status')}}" method="post">
		                                                                 @csrf
		                               										 <!-- @method('put') -->
		                                    
		                                                                <input type="hidden" name="appointmentId" value="{{ $_item->id }}" >   
		                                                                     <div class="row clearfix">                                       
		                                                                        <div class="col-sm-12 row"><label>حالة المستخدم</label></div>
		                                                                            <div class="row">                                             
		                                                                                <div class="col-sm-12 col-lg-6">
		                                                                                    <div class="form-check form-check-radio">
		                                                                                    <label>
		                                 													<input name="status" type="radio" value="confirmed" {{ ($_item->status=='confirmed')? 'checked' : '' }}/>
		                                                                                        <span>موافقة</span>
		                                                                                    	</label>
		                                                                                    </div>
		                                                                                </div>
		                                                                                <div class="col-sm-6 col-lg-6">
		                                                                                    <div class="form-check form-check-radio">
		                                                                                        <label>
		                                   												<input name="status" type="radio" value="cancelled" {{ ($_item->status=='cancelled')? 'checked' : '' }} />
		                                                                                            <span>تم الرفض</span>
		                                                                                        </label>
		                                                                                    </div>
		                                                                                </div>
		                                                                                <div class="col-sm-6 col-lg-6">
		                                                                                    <div class="form-check form-check-radio">
		                                                                                        <label>
		                               	 											    <input name="status" type="radio" value="pending" {{ ($_item->status=='pending')? 'checked' : '' }} />
		                                                                                            <span>قيد الانتظار</span>
		                                                                                        </label>
		                                                                                    </div>
		                                                                                </div>
		                                                                                <div class="col-sm-6 col-lg-6">
		                                                                                    <div class="form-check form-check-radio">
		                                                                                        <label>
		                           												        <input name="status" type="radio" value="combledted" {{ ($_item->status=='combledted')? 'checked' : '' }} />
		                                                                                            <span>اكتمل</span>
		                                                                                        </label>
		                                                                                    </div>
		                                                                                </div>
		                                                                                <div class="col-sm-6 col-lg-6">
		                                                                                    <div class="form-check form-check-radio">
		                                                                                        <label>
		                               												    <input name="status" type="radio" value="absent" {{ ($_item->status=='absent')? 'checked' : '' }} />
		                                                                                            <span>لم يأتي</span>
		                                                                                        </label>
		                                                                                    </div>
		                                                                                </div>
		                                                                            </div>
		                                                    
																        <button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>     
		                                                                </form>
		                                                                </div>
		                                                                </div>
		                                                                </div>
		                                                            </div>
		                                                        </div>
															</td>
															<td>
																<!-- <button type="button" class="btn btn-danger">Danger</button> -->
																 <form method="post" action="
																   {{route('appointments.destroy',$_item->id) }}">
		                                                            @csrf
		                                                            @method('delete')
		                                                            <button type="submit" class="btn" style="    border: navajowhite;">
		                                                                 <a  href="# "  onclick="return confirm('هل انت متأكد من حذف هذا العنصر ?')">
		                                                                 	<i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
		                                                                 </a>
		                                                            </button>
		                                                        </form>
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

								<div class="tab-pane fade " id="per_details_tab">
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<!-- <h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5> -->
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">الامس</p>
														<p class="col-sm-10">{{$doctors->first_name_ar }} {{$doctors->last_name_ar }}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-10">24 Jul 1983</p>
													</div> -->
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">البريد الإلكتروني</p>
														<p class="col-sm-10">{{$doctors->email }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0 mb-sm-3">رقم الهاتف</p>
														<p class="col-sm-10">{{$doctors->mobile }}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">العنوان</p>
														<p class="col-sm-10">{{$doctors->address_ar}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">عدد سنوات الخبرة</p>
														<p class="col-sm-10">{{$doctors->experience}}</p>
													</div>
													
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">النوع</p>
														<p class="col-sm-10">{{$doctors->gender}}</p>
													</div><br>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">وصف التخصص</p>
														<p class="col-sm-10">{{$doctors->specialityDesc_ar}}</p>
													</div><br>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">جهة العمل</p>
														<p class="col-sm-10">{{$doctors->authority_ar}}</p>
													</div><br>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">الدرجة العلمية	</p>
														<p class="col-sm-10">{{$doctors->degree_ar	}}</p>
													</div><br>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">سنة التسجيل	</p>
														<p class="col-sm-10">{{$doctors->yearOfRegistration	}}</p>
													</div><br>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">صورة الدكتور</p>
														<p class="col-sm-10">
															<img class="avatar-img rounded-circle" 
																				src="{{asset('assets_admin/img/doctors/photo/'.$doctors->photo) }}" alt="User Image" width="60px" height="60px">
														</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">الشهادة الجامعية</p>
														<p class="col-sm-10">
															<!-- <a href="{{asset('assets_admin/img/doctors/degree/'.$doctors->university_degree) }}" target="_black">
																<embed src="{{asset('assets_admin/img/doctors/degree/'.$doctors->university_degree) }}"  style="width:90px; height:50px;" frameborder="1">
															</a> -->

															@if($doctors->university_degree!=null)
				                                                <a href="{{asset('assets_admin/img/doctors/degree/'.$doctors->university_degree) }}" target="_black">
														    	<label>عرض </label></a>    
															@else
															   <!-- <label>الشهادة الجامعية </label> -->
															@endif
														</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">شهادة مزاولة المهنة</p>
														<p class="col-sm-10">
															<!-- <embed src="{{asset('assets_admin/img/doctors/certificate/'.$doctors->practice_certificate) }}"  style="width:90px; height:90px;" frameborder="1"> -->
															@if($doctors->practice_certificate!=null)
				                                                <a href="{{asset('assets_admin/img/doctors/certificate/'.$doctors->practice_certificate) }}" target="_black">
														    	<label>عرض </label></a>    
															@else

															    <!-- <label>شهادة مزاولة المهنة </label> -->
															@endif	
														</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted  mb-0">مؤهلات أخرى</p>
														<p class="col-sm-10">
															<!-- <embed src="{{asset('assets_admin/img/doctors/certificate/'.$doctors->other_qualification) }}"  style="width:90px; height:90px;" frameborder="1"> -->
															@if($doctors->other_qualification!=null)
				                                                <a href="{{asset('assets_admin/img/doctors/qualification/'.$doctors->other_qualification) }}" target="_black">
														    	<label>عرض </label></a>    
															@else

															    <!-- <label>مؤهلات أخرى </label></a> -->
															@endif
															

														</p>
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
								</div>
								<div  class="tab-pane fade " id="password_tab">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">تغيير كلمة المرور</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="{{route('doctors.changepassword')}}" method="POST" 
	                                					name="le_form"  enctype="multipart/form-data">
	                                					@csrf
	                                					<input type="hidden" name="doctorId" value="{{$doctors->id}}">
														<!-- <div class="form-group">
															<label>كلمة المرور الحالية</label>
															<input type="password" name="current-password" class="form-control">
														</div> -->
														<div class="form-group">
															<label>كلمة المرور الجديدة</label>
															<input type="password" name="new-password" class="form-control">
														</div>
														<!-- <div class="form-group">
															<label>Confirm Password</label>
															<input type="password" class="form-control">
														</div> -->
														<button class="btn btn-primary" type="submit">حفظ التغيير</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			
			<!-- /Page Wrapper -->


		<!-- start apointment -->	
			<div class="modal fade" id="Add_apointment_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog " role="document"   >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة موعد</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<form action="{{route('doctors/addapointment')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
                                
                                
                                
								<div class="row form-row">
									<input type="hidden" name="doctorId" value="{{$doctors->id}}">
									<div class="col-md-6 col-sm-6">
										<label>من تاريخ</label>
										<div class="">
											<input type="date" name="from_date" class="form-control" >
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>إلى تاريخ</label>
										<div class="">
											<input type="date" name="to_date" class="form-control" >
										</div>
									</div>
									</div>
									<br/>
									<br/>
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="sat" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												السبت
											</label>	
											<input  name="day_number[]" type="hidden" value="6" >

										</div>
									</div>	
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="sun" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الاحد
											</label>									
											<input  name="day_number[]" type="hidden" value="0" >		
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="mon" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الاثنين
											</label>						
											<input  name="day_number[]" type="hidden" value="1" >					
										</div>
									</div>
									<div class="col-md-3 col-sm-6">
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="tus" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الثلاثاء
											</label>											
											<input  name="day_number[]" type="hidden" value="2" >
										</div>
									</div>
									<div class="col-md-3 col-sm-6">	
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="wed" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الاربعاء
											</label>							
											<input  name="day_number[]" type="hidden" value="3" >				
										</div>
									</div>
									<div class="col-md-3 col-sm-6">	
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="thu" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الخميس
											</label>			
											<input  name="day_number[]" type="hidden" value="4" >								
										</div>
									</div>
									<div class="col-md-4 col-sm-6">	
										<div class="form-check">
											<input class="form-check-input" name="day[]" type="checkbox" value="fri" id="invalidCheck" >
												<label class="form-check-label" for="invalidCheck">
												الجمعة
											</label>											
											<input  name="day_number[]" type="hidden" value="5" >
										</div>
									</div>	
									<br/>
									<br/>
									<div class="col-md-6 row" 
										style="
											/*box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;*/
											
											margin-right: -2px !important;
											">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الأول</h6>
											<label>من </label>
											<div class="">
												<input type="time" name="from_morning" class="form-control" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" name="to_morning" class="form-control" >
											</div>
										</div>
									</div>
									<div class="col-md-6 row" 
										style="
										/*box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;*/
											margin-right: 19px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الثاني</h6>
											<label>من </label>
											<div class="">
												<input type="time" class="form-control" name="from_afternoon" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" class="form-control" name="to_afternoon" >
											</div>
										</div>
									</div>
									
									<div class="col-md-12 row" >
										<br>
									</div>
									<div class="col-md-6 row" 
										style="
											/*box-shadow: rgba(0, 0, 0, 0.20) 0px 2px 5px;*/
											
											margin-right: -2px !important;
											">
										&nbsp;
										<div class="form-group">
											<h6>الدوام المسائي</h6>
											<label>من</label>
											<div class="">
												<input type="time" class="form-control" name="from_evening" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="time" class="form-control" name="to_evening">
											</div>
										</div>
									</div>
									<br/>
									
									<div class="col-md-6 row" 
										style="
											margin-right: 19px !important;">
										&nbsp;
										<div class="form-group">
											<label>مدة الكشف</label>
											<div class="">
												<input type="text" name="duration" class="form-control" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<!-- <div class="form-group">
											<label>إلي تاريخ</label>
											<div class="cal-icon">
												<input type="time" class="form-control" value="24-07-1983">
											</div>
										</div> -->
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
			<!-- Edit apointment Modal -->
			<div class="modal fade" id="edit" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تعديل الموعد</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							 <form  method="post" action="{{route('doctors.update.apointment')}}" enctype="multipart/form-data">
                                @csrf
                               
								<div class="row form-row">
									<input type="hidden" name="id" id="cat_id">
									<!-- <div class="col-md-12 col-sm-12">
										<label>اليوم</label>
										<div class="">
											<input type="text" name="day"  class="form-control" id="day">
										</div>
									</div> -->
									
								
									<br/>
									<br/>
									<div class="col-md-4 row" 
										style="	margin-right: -2px !important;margin-top: 19px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الأول</h6>
											<label>من </label>
											<div class="">
												<input type="text" name="from_morning" class="form-control" id="from_morning" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="text" name="to_morning" class="form-control"id="tomorning">
											</div>
										</div>
									</div>
									<div class="col-md-4 row" 
										style="margin-right: 19px !important;margin-top: 19px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام الثاني</h6>
											<label>من </label>
											<div class="">
												<input type="text" class="form-control" name="from_afternoon" id="fromafternoon" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="text" class="form-control" name="to_afternoon" id="toafternoon" >
											</div>
										</div>
									</div>
									
									<!-- <div class="col-md-12 row" >
										<br>
									</div> -->
									<div class="col-md-4 row" 
										style="margin-top: 19px !important;margin-right: -2px !important;">
										&nbsp;
										<div class="form-group">
											<h6>الدوام المسائي</h6>
											<label>من</label>
											<div class="">
												<input type="text" class="form-control" name="from_evening" id="fromevening" >
											</div>
										</div>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<div class="form-group">
											<br/>
											<label>الى</label>
											<div class="">
												<input type="text" class="form-control" name="to_evening" id="toevening" >
											</div>
										</div>
									</div>
									<br/>
									
									
								</div><br/><br/>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			
			<!-- Delete apointment Modal -->
			<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('doctors.delete.apointment')}}">
	                                   		 @csrf
	                                         
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
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
		<!-- end apointment -->	

		<!-- start Services -->
			<div class="modal fade" id="Add_services_details" aria-hidden="true" role="dialog">
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
								<div class="row form-row">
									<input type="hidden" name="doctorId" value="{{$doctors->id}}">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة عربي</label>
											<input type="text" name="services_name_ar" class="form-control" value="{{old('services_name_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>اسم الخدمة انجليزي</label>
											<input type="text" name="services_name_en" class="form-control" value="{{old('services_name_en')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر</label>
											<input type="text" name="price" class="form-control" value="{{old('price')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>نوع الخدمة</label>
											<input type="text" name="type" class="form-control" value="{{old('type')}}">
											
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>نوع الخدمة</label>
											<select class="form-control select" name="status" >
												<option value="1" {{(old('status')=='1')? 'selected':''}}>مفعل</option>
												<option value="0" {{(old('status')=='0')? 'selected':''}}>غير مفعل</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>ايكون الخمدة </label>
											<input type="file" name="icon" class="form-control">
											<!-- <input type="hidden" name="url" value="profile_image.png"> -->
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
			
			<div class="modal fade" id="delete_service" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('doctors.delete.service')}}">
	                                   		 @csrf
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
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
		<!-- end Services -->	

		<!-- start offers -->
			<div class="modal fade" id="Add_offers_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog " role="document"   >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">إضافة خدمة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('doctors/addoffers')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<input type="hidden" name="id" value="{{$doctors->id}}">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض عربي</label>
											<input type="text" name="offer_name_ar" class="form-control" value="{{old('offer_name_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>عنوان العرض انجليزي</label>
											<input type="text" name="offer_name_en" class="form-control" value="{{old('offer_name_en')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف عربي</label>
											<input type="text" name="description_ar" class="form-control" value="{{old('description_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الوصف انجليزي</label>
											<input type="text" name="description_en" class="form-control" value="{{old('description_en')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر القديم</label>
											<input type="text" name="old_price" class="form-control" value="{{old('old_price')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>السعر الجدد</label>
											<input type="text" name="new_price" class="form-control" value="{{old('new_price')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>نوع العرض</label>
											<select class="form-control select" name="type" >
												<option selected disabled>اختر نوع العرض</option>
												<option value="خدمة واحدة" {{(old('type')=="خدمة واحدة")? 'selected':''}}>خدمة واحدة</option>
												<option value="باقة خدمات" {{(old('type')=="باقة خدمات")? 'selected':''}}>باقة خدمات</option>
											</select>
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>صورة العرض </label>
											<input type="file" name="image" class="form-control" >
											<input type="hidden" name="url" value="profile_image.png">
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
			
			<div class="modal fade" id="delete_offers" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					    <!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('doctors.delete.offers')}}">
	                                   		 @csrf
	                                   		 <!-- hidden -->
	                                        <input type="text" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
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

			<div class="modal fade" id="delete_review" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					    <!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('reviews.destroy','test')}}">
	                                   		 @csrf
	                                         @method('delete')
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
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

			<div class="modal fade" id="delete_payment" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					    <!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('doctors.delete.payment')}}">
	                                   		 @csrf
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
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
			
		<!-- end offers -->	



		<!-- add article -->
			<div class="modal fade" id="Add_article" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة مقال جديد</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('articles.store')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<input type="hidden" name="doctorId" value="{{$doctors->id}}">
									<div class="col-12 col-sm-4">
										<div class="form-group">
											<label>العنوان عربي</label>
											<input type="text" name="title_ar" class="form-control" value="{{old('title_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="form-group">
											<label>العنوان انجليزي</label>
											<input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>التخصص </label> 
											<select class="form-control select" name="specialityId">
												<option>اختر التخصص</option>
												@foreach ($specialities as $_item)
												   <option value="{{$_item->id}}" {{(old('specialityId')==$_item->id)? 'selected':''}} >{{$_item->name_ar}}</option>
												@endforeach
											</select>
										</div>
									</div>
									
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label >الوصف عربي</label>											
												<textarea rows="5" cols="5" name="description_ar" class="form-control" placeholder="أدخل النص فقط">{{old('description_ar')}}</textarea>
											
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label >الوصف انجليزي</label>
											
												<textarea rows="5" cols="5" name="description_en" class="form-control" placeholder="أدخل النص فقط">{{old('description_en')}}</textarea>
											
										</div>
									</div>
									
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="image" class="form-control">
										</div>
									</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			<div class="modal fade" id="edit_article" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تعديل المقال</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							 <form  method="post" action="{{route('articles.update','test')}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                               
								<div class="row form-row">
									<input type="hidden" name="id" id="cat_id" >
									<input type="hidden" name="author" value=" {{Auth::user()->name}}" >
									<div class="col-12 col-sm-4">
										<div class="form-group">
											<label>العنوان عربي</label>
											<input type="text" name="title_ar" class="form-control" id="titlear">
										</div>
									</div>
									<div class="col-12 col-sm-4">
										<div class="form-group">
											<label>العنوان انجليزي</label>
											<input type="text" name="title_en" class="form-control" id="titleen">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>التخصص </label> 
											<select class="form-control select" name="specialityId">
												<option selected disabled>اختر التخصص</option>
												@foreach ($specialities as $_item)
												   <option value="{{$_item->id}}" {{(old('specialityId')==$_item->id)? 'selected':''}}>{{$_item->name_ar}} - {{$_item->name_en}}</option>
												@endforeach

											</select>
										</div>
									</div>
									
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label >الوصف عربي</label>											
												<textarea rows="5" cols="5"  name="description_ar" class="form-control" id="descriptionar" placeholder="أدخل النص فقط"></textarea>
											
										</div>
									</div>
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الوصف انجليزي</label>
												<textarea rows="5" cols="5"  name="description_en" class="form-control" id="descriptionen" id="descriptionar" placeholder="أدخل النص فقط"></textarea>
											
										</div>
									</div>
									
									
									<div class="col-12 col-sm-12">
										<div class="form-group">
											<label>الصوره </label>
											<input type="file" name="image" class="form-control">
											<input type="hidden" name="url"  class="form-control" id="image">
										</div>
									</div>
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Edit Details Modal -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete_article" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">Delete</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('articles.destroy','test')}}">
	                                   		 @csrf
	                                         @method('delete')
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
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
		<!-- end article -->
        </div>

<script src="{{asset('js/app.js')}}"></script>

<script>

    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      // var day = button.data('day') 
      var from_morning = button.data('from_morning') 
      var to_morning = button.data('to_morning') 
      var from_afternoon = button.data('from_afternoon')
      var to_afternoon = button.data('to_afternoon')
      var from_evening = button.data('from_evening')
      var to_evening = button.data('to_evening') 
      var cat_id = button.data('catid') 
      var modal = $(this)

      // modal.find('.modal-body #day').val(day);
      modal.find('.modal-body #from_morning').val(from_morning);
      modal.find('.modal-body #tomorning').val(to_morning);
      modal.find('.modal-body #fromafternoon').val(from_afternoon);
      modal.find('.modal-body #toafternoon').val(to_afternoon);
      modal.find('.modal-body #fromevening').val(from_evening);
      modal.find('.modal-body #toevening').val(to_evening);
      modal.find('.modal-body #cat_id').val(cat_id);
    })


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);

	})



	 $('#delete_service').on('show.bs.modal', function (event) {

	      var button = $(event.relatedTarget) 

	      var cat_id = button.data('catid') 
	      var modal = $(this)

	      modal.find('.modal-body #cat_id').val(cat_id);

	// end Services 
	})




	$('#delete_offers').on('show.bs.modal', function (event) {

	    var button = $(event.relatedTarget) 

	    var cat_id = button.data('catid') 
        var modal = $(this)

	    modal.find('.modal-body #cat_id').val(cat_id);

	// end offer 
	})

	$('#delete_review').on('show.bs.modal', function (event) {

	    var button = $(event.relatedTarget) 

	    var cat_id = button.data('catid') 
        var modal = $(this)

	    modal.find('.modal-body #cat_id').val(cat_id);

	// end offer 
	})

	$('#delete_payment').on('show.bs.modal', function (event) {

	    var button = $(event.relatedTarget) 

	    var cat_id = button.data('catid') 
        var modal = $(this)

	    modal.find('.modal-body #cat_id').val(cat_id);

	// end offer 
	})



	$('#edit_article').on('show.bs.modal', function (event) {

			  var button = $(event.relatedTarget) 
			  var specialityId = button.data('specialityId') 
			  var title_ar = button.data('title_ar') 
			  var title_en = button.data('title_en') 
			  var description_ar = button.data('description_ar') 
			  var description_en = button.data('description_en') 
			  var image = button.data('image') 
			  var cat_id = button.data('catid') 
			  var modal = $(this)

			  modal.find('.modal-body #specialityId').val(specialityId);
			  modal.find('.modal-body #titlear').val(title_ar);
			  modal.find('.modal-body #titleen').val(title_en);
			  modal.find('.modal-body #descriptionar').val(description_ar);
			  modal.find('.modal-body #descriptionen').val(description_en);
			  modal.find('.modal-body #image').val(image);
			  modal.find('.modal-body #cat_id').val(cat_id);
	})

	$('#delete_article').on('show.bs.modal', function (event) {

		      var button = $(event.relatedTarget) 

		      var cat_id = button.data('catid') 
		      var modal = $(this)

		      modal.find('.modal-body #cat_id').val(cat_id);
	})


</script>    

		<!-- /Main Wrapper -->
@endsection