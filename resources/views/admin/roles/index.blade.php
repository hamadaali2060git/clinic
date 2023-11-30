@extends('layout.admin_main')
@section('content') 
     <!-- KeyTable integration table -->

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">المستخدمين</h3><br>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                
                <li class="breadcrumb-item active">المستخدمين
                </li>
              </ol> 
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="dropdown float-md-right">
            @can('اضافة صلاحية')
                <a href="{{ route('roles.create') }}" class="btn btn-primary float-right mt-2">أضافة صلاحية</a>
            @endcan
          </div>
        </div>
        @if (session()->has('Add'))
                                <script>
                                    window.onload = function() {
                                        notif({
                                            msg: " تم اضافة الصلاحية بنجاح",
                                            type: "success"
                                        });
                                    }

                                </script>
                            @endif

                            @if (session()->has('edit'))
                                <script>
                                    window.onload = function() {
                                        notif({
                                            msg: " تم تحديث بيانات الصلاحية بنجاح",
                                            type: "success"
                                        });
                                    }

                                </script>
                            @endif

                            @if (session()->has('delete'))
                                <script>
                                    window.onload = function() {
                                        notif({
                                            msg: " تم حذف الصلاحية بنجاح",
                                            type: "error"
                                        });
                                    }

                                </script>
                            @endif
    </div>

        <section id="keytable">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">KeyTable integration</h4>
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
                    <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                    <table class="table table-striped table-bordered keytable-integration">    
                        <thead>
                            <tr>
                                                    <th>#</th>
                                                    <th>الاسم</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $key => $role)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $role->name }}</td>
                                                        <td>
                                                            @can('عرض صلاحية')
                                                                <a class="btn btn-success btn-sm"
                                                                    href="{{ route('roles.show', $role->id) }}">عرض</a>
                                                            @endcan
                                                            
                                                            @can('تعديل صلاحية')
                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ route('roles.edit', $role->id) }}">تعديل</a>
                                                            @endcan

                                                            @if ($role->name !== 'owner')
                                                                @can('حذف صلاحية')
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy',
                                                                    $role->id], 'style' => 'display:inline']) !!}
                                                                    {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                                                                    {!! Form::close() !!}
                                                                @endcan
                                                            @endif
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


          

        </section>
       
     <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
  


@endsection