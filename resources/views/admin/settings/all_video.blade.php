

@extends('layout.admin_main')
@section('content') 

        <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                      <h3 class="content-header-title mb-0 d-inline-block">فيديوهات ارشادية</h3><br>
                      <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
                            </li>
                            
                            <li class="breadcrumb-item active">فيديوهات
                            </li>
                          </ol> 
                        </div>
                      </div>
                    </div>
                    <div class="content-header-right col-md-6 col-12">
                      <div class="dropdown float-md-right">
                           <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">اضافة فيديو</a>
                      </div>
                    </div>
                    
                    @if (session('message'))
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
                                                    <th>#</th>
                                                    <th>العنوان</th>
                                                    <th> الفيديو</th>
                                                    <th class="text-center">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            @foreach ($admin_videos as $key=>$_item)
                                                <tr>                                                    
                                                    <td class="text-center">
                                                        {{$_item->id}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$_item->title}}
                                                    </td>
                                                    <td class="text-center">
                                                        <!--<video controls="controls" width="100">-->
                                                        <!--    <source src="{{$_item->url}}" type="video/mp4">-->
                                                        <!--</video>-->
                                                        <iframe width="320" height="245" class="gallery-thumbnail card-img-top" src="{{$_item->url}}?rel=0&amp;controls=0&amp;showinfo=0"></iframe>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="actions">
                                                            <a class="btn btn-sm bg-success-light edit-course" data-toggle="modal" data-target="#view{{$_item->id}}">
                                                                <button type="button" class="btn btn-outline-success "><i class="la la-eye"></i></button>
                                                            </a>
                                                            <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
                                                           <button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
                                                           
                                                        </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="view{{$_item->id}}" aria-hidden="true" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content" style="background-color: #ffffff00 !important;border: 0px solid rgba(0, 0, 0, 0.2)!important;">
                                                            <div class="modal-header">
                                                                <style type="text/css">
                                                                    .close {   
                                                                        color: #fff;
                                                                        font-size: 2.2rem !important;
                                                                        font-weight: 100 !important;
                                                                        text-shadow: 0 1px 0 #ffffff !important;
                                                                        opacity: 0.9 !important;
                                                                    }
                                                                    /*.modal-content {*/
                                                                    /*   border: 0px solid rgba(0, 0, 0, 0.2)!important;*/
                                                                    /*   background-color: #ffffff00 !important;*/
                                                                    /*}*/
                                                                </style>
                                                                <button onclick = "closevideo('myvideo{{$key}}','large{{$key}}')" class="close" data-dismiss="modal" aria-label="Close">
                                                                    X
                                                                </button>
                                                            </div>
                                                                <!--<video id="myvideo{{$key}}" controls="controls" width="500">-->
                                                                <!--    <source src="{{asset('assets_admin/img/settings/video/'.$_item->url) }}" type="video/mp4">-->
                                                                <!--</video>-->
                                                                <iframe width="420" height="345" class="gallery-thumbnail card-img-top" src="{{$_item->url}}?rel=0&amp;controls=0&amp;showinfo=0""></iframe>
                                                        </div>
                                                    </div>
                                                </div>
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



            <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">اضافة تخصص</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('all-admin-video-add')}}" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
                                <div class="row form-row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>عنوان الفيديو</label>
                                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label> ارفق الفيديو</label>
                                            <input type="text" name="url" class="form-control" >
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"> حفظ  </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /ADD Modal -->
            
            <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-content p-2">
                                <h4 class="modal-title">حذف</h4>
                                <p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
                                <div class="row text-center">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-2">
                                        <form method="post" action="{{route('deleteadminvideo')}}">
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

@endsection

