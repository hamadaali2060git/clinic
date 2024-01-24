@extends('layout.admin_main')
@section('content')	

		<div class="content-header row">
			<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		        <h3 class="content-header-title mb-0 d-inline-block">المنتجات</h3><br>
	   	        <div class="row breadcrumbs-top d-inline-block">
			        <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('vendors/dashboard')}}">الرئيسية</a>
			                </li>
			                <li class="breadcrumb-item active">المنتجات
			                </li>
		                </ol> 
			        </div>
		        </div>
			</div>
		    <div class="content-header-right col-md-6 col-12">
	        <div class="dropdown float-md-right">
		        <a href="{{route('products.create')}}"  class="btn btn-primary float-right mt-2">إضافة منتج جديد</a>
		    </div>
		</div>
			        
        @if(session('message'))
	        <div class="alert alert-success">
		        {{ session('message') }}
	        </div>
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
	                <div class="card-header">
	                    <h4 class="card-title"></h4>
	                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
	                    <div class="heading-elements">
	                        <ul class="list-inline mb-0">
	                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
	                          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                          <li><a data-action="close"><i class="ft-x"></i></a></li>
	                        </ul>
	                    </div>
	                </div>
	                <div class="card-content collapse show">
	                    <div class="card-body card-dashboard">
	                        <div class="card-body">
	                            <div class="table-responsive">
	                                <table class="table table-striped table-bordered keytable-integration">
	                                    <thead>
											<tr>	
												<th class="text-center">الصورة</th>
												<th class="text-center">الاسم</th>
												<th class="text-center">عدد الزيارات</th>
												<th class="text-center">السعر</th>
												<th class="text-center">الكمية</th>
												<th class="text-center">تعديل الصور</th>
												<th class="text-center">العمليات</th>
											</tr>
				 						</thead>
										<tbody>
											@foreach ($products as $_item)
												<tr>
													
													<td>
														@if($_item->image)
														<a href="profile" class="avatar avatar-sm mr-2">
					                                        <img class="avatar-img" src="{{asset('img/product/'.$_item->image->image) }}" alt="Speciality">
					                                    </a>
														@endif
													</td>
													
													<td class="text-center">
														{{$_item->title}}
													</td>
													<td class="text-center">
													    @if($_item->visitViewer)
													        {{$_item->visitViewer->viewer}}
													    @else 
													        0
													    @endif
													</td>
													<td class="text-center">
														{{$_item->price}}
													</td>
													<td class="text-center">
														{{$_item->bathrooms}}
													</td>
													<td>
													    <!-- <a href="{{url('vendors/product-image',$_item->id)}}" class="btn btn-sm bg-success-light" >
																<button type="button" class="btn btn-outline-success ">تعديل الصور</i></button>
															</a> -->
													</td>
													<td class="text-center">
														<div class="actions">
															<!-- <a href="{{url('vendors/alloffers',$_item->id)}}" class="add-video" >
					                                            <button type="button" class="btn btn-outline-info ">
					                                            	<i class="la la-plus-circle"></i>
					                                            </button>
					                                            <span class="addvideo">العروض</span>
					                                        </a> -->
					                                       
															<!-- <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#imagemodal{{ $_item->id }}" class="delete-course">
				                                           		<button type="button" class=" btn btn-outline-warning">
				                                           			<i class="la la-image"></i>
				                                           		</button>
				                                        	</a> -->
				                                        	
															<a href="{{route('products.edit',$_item->id)}}" class="btn btn-sm bg-success-light" >
																<button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
															</a>
															<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
				                                           		<button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
				                                        	</a>
														</div>
													</td>
												</tr>
							            
												<!-- Edit imagemodal Modal -->
                                    			<div class="modal fade" id="imagemodal{{$_item->id}}" aria-hidden="true" role="dialog">
                                    				<div class="modal-dialog modal-dialog-centered" role="document" >
	                                    				<div class="modal-content">
								                        <div class="col-md-12 ">
											              <div class="card">
											                <div class="card-content">
											                  <div class="card-body">
											                    <div id="carousel-keyboard" class="carousel slide" data-ride="carousel" data-keyboard="false">
											                      
											                      <div class="carousel-inner" role="listbox">
											                      	@foreach ($_item->images as $key =>$image)
												                      	@if($key==0)
													                        <div class="carousel-item active">
													                          	<img src="{{asset('img/product/'.$image->image) }}" alt="First slide"  height="350px" width="450">
													                        </div>
												                        @else
												                        	<div class="carousel-item ">
													                          	<img src="{{asset('img/product//'.$image->image) }}" alt="Second slide"  height="350px" width="450">
													                        </div>
												                        @endif
											                        @endforeach
											                      </div>
											                      <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
											                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											                        <span class="sr-only">Previous</span>
											                      </a>
											                      <a class="carousel-control-next"  href="#carousel-keyboard" role="button" data-slide="next">
											                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
											                        <span class="sr-only">Next</span>
											                      </a>
											                    </div>
											                  </div>
											                </div>
											              </div>
											            </div>
	                                    				</div>
                                    				</div>
                                    			</div>
                                    			<!-- image modal Modal -->
                                    			
                                    			
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
										<form method="post" action="{{route('products.destroy','test')}}">
	                                   		 @csrf
	                                         @method('delete')
	                                         <input type="hidden" name="id" id="cat_id">
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
        </section>



<script src="{{asset('js/app.js')}}"></script>

<script>
    


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>
<style>
    .add-video {
      position: relative;
      display: inline-block;
    }

    .add-video .addvideo {
      visibility: hidden;
      width: 76px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .add-video:hover .addvideo {
      visibility: visible;
    }
    /*//////////////*/

    .all-video {
      position: relative;
      display: inline-block;
    }

    .all-video .allvideo {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .all-video:hover .allvideo {
      visibility: visible;
    }

    /*//////////////*/

    .edit-course {
      position: relative;
      display: inline-block;
    }

    .edit-course .editcourse {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .edit-course:hover .editcourse {
      visibility: visible;
    }

    /*//////////////*/

    .delete-course {
      position: relative;
      display: inline-block;
    }

    .delete-course .deletecourse {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .delete-course:hover .deletecourse {
      visibility: visible;
    }
</style>
@endsection

