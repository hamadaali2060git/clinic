@extends('layout.admin_main')
@section('content')

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">المناطق</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="index.html">Home</a>
			                </li>

			                <li class="breadcrumb-item active">المناطق
			                </li>
			              </ol>
			            </div>
			          </div>
			        </div>
			        <div class="content-header-right col-md-6 col-12">
			          <div class="dropdown float-md-right">
			               <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة مدينة</a>

			          </div>
			        </div>

			        @if(session()->has('message'))
                        @include('admin.includes.alerts.success')
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
		<section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <div class="card-body">
									<div class="table-responsive">
		                <table class="table table-striped table-bordered keytable-integration">
		                  <thead>
												<tr>
													<th class="text-center">#</th>
													<th class="text-center">المنطقة </th>
													<th class="text-center">العمليات</th>
												</tr>
												</thead>
											<tbody>
												@foreach ($states as $_item)
												<tr>
													<td class="text-center">
														{{$_item->id}}
													</td>
													<td class="text-center">
														{{$_item->name}}
													</td>


													<td class="text-center">
														<div class="actions">
																<a class="btn btn-sm bg-success-light" href="{{ route('states.edit', $_item->id) }}">
																		<button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
																</a>
																<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
																	<button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
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
          </div>




			<!-- Add Modal -->
			<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">اضافة منطقة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('states.store')}}" method="POST"
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">

									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>المنطقة</label>
											<input type="text" name="name" class="form-control" value="{{old('name')}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>المدينة </label>
											<select class="form-control select" name="city_id">
												<option>اختر المدينة</option>
												@foreach ($cities as $_item)
												   <option value="{{$_item->id}}" >{{$_item->name}}</option>
												@endforeach
											</select>
										</div>
									</div>



								</div>
								<button type="submit" class="btn btn-primary btn-block">أضافة مدينة </button>
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
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('states.destroy','test')}}">
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
        </section>



<!-- <script src="{{asset('js/app.js')}}"></script> -->

<script>


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget)

      var cat_id = button.data('catid')
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>

@endsection
