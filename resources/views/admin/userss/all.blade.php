@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">المستخدمين</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">المستخدمين</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة مستخدم جديد</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
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
													<th>#</th>
													<th>الاسم</th>
													<th>البريد الإلكتروني </th>
													<th>حالة المستخدم </th>
													<th class="text-right">أكشن</th>
												</tr>
											</thead>
											<tbody>
												
											@foreach ($users as $_item)
												<tr>
													<td>{{ $_item->id }}</td>
													<td>
														<h2 class="table-avatar">
															<a href="profile" class="avatar avatar-sm mr-2">
																<img class="avatar-img" src="{{asset('assets_admin/img/users/'.$_item->photo) }}" alt="Speciality">
															</a>
															<a href="profile">{{ $_item->name }}</a>
														</h2>
													</td>
													<td>
														{{ $_item->email }}
													</td>
													<td>
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                        @if(Auth::user()->id == $_item->id   )        
                                                        @else
               	                                        <a href="#" > <span data-toggle="modal" data-target="#exampleModall" class=""> 
               	                                        إعدادات المستخدم  <i class="material-icons">more_vert</i> </span>  </a>   
                                                            @endif                                  
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
                                                                <form   action="{{url('users/status/'.$_item->id)}}" method="post">
                                                                {{ csrf_field() }}       
                                                                 <input type="hidden" name="userId" value="{{ $_item->id }}" >   
                                                                     <div class="row clearfix">                                       
                                                                        <div class="col-sm-12 row"><label>حالة المستخدم</label></div>
                                                                            <div class="row">                                             
                                                                                <div class="col-sm-12 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                    <label>
                                                                                        <input name="status" type="radio" value="1" {{ ($_item->status=='1')? 'checked' : '' }}/>
                                                                                        <span>مفعل</span>
                                                                                    	</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-6">
                                                                                    <div class="form-check form-check-radio">
                                                                                        <label>
                                                                            		    <input name="status" type="radio" value="0" {{ ($_item->status=='0')? 'checked' : '' }} />
                                                                                            <span>غير مفعل</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                               						
                                                    <div class="form-group col-md-12 row">
														<label class="col-form-label col-md-3">نوع المستخدم</label>
														<div class="col-md-9">
															<select class="form-control" name="type">
																<!-- <option  disabled selected>نوع المستخدم</option> -->
                                                                <option value="admin" {{($_item->type=='admin') ? 'selected' : '' }}> ادمن </option>
                                                                <option value="employee" {{($_item->
                                                                	type=='employee') ? 'selected' : '' }}>
                                                                      	موظف
                                                                </option>
                                                                       
															</select>
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
														<div class="actions">
														@if(Auth::user()->id == $_item->id   )        
                                                        @else															
															<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> حذف
															</a>
														@endif	
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
			
			<!-- /Page Wrapper -->
			
			
			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضاف مستخدم</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('users.store')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
										<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الاسم</label>
											<input type="text" name="name" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>البريد الالكتروني</label>
											<input type="text" name="email" class="form-control">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>كلمة المرور</label>
											<input type="password" name="password" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label>الصورة</label>
										<input type="file" name="photo" class="form-control">
										<!-- <small class="text-secondary">Recommended image size is <b>150px x 150px</b></small> -->
										</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /ADD Modal -->
			
			
						
			<!-- Delete Modal -->
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
								<p class="mb-4">هل متأكد من الحذف ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('users.destroy','test')}}">
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
			<!-- /Delete Modal -->
			<!-- /Delete Modal -->
</div>


        <script src="{{asset('js/app.js')}}"></script>

<script>

  
    // $('#edit').on('show.bs.modal', function (event) {

    //   var button = $(event.relatedTarget) 
    //   var name_ar = button.data('name_ar') 
    //   var name_en = button.data('name_en') 
    //   // var description = button.data('mydescription') 
    //   var cat_id = button.data('catid') 
    //   var modal = $(this)

    //   modal.find('.modal-body #namear').val(name_ar);
    //   modal.find('.modal-body #nameen').val(name_en);
    //   // modal.find('.modal-body #des').val(description);
    //   modal.find('.modal-body #cat_id').val(cat_id);
    // })


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>


		<!-- /Main Wrapper -->
@endsection