<!DOCTYPE html>
<html>
  <head>
      <title>Date Range Fiter Data in Laravel using Ajax</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
      <style type="text/css">
        .panel-default {
            border-color: #ddd;
            direction: rtl !important;
        }

        
        .container {
            width: 1170px;
            direction: rtl !important;
        }
        .btn-sm {
            padding: 5px 66px !important;
            margin-top: 26px !important;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 3px;
        }
        
        
      </style>
  </head>
  <body >
    <br />
    <div class="container box">
        <div class="panel ">
            <div class="">
                <div class="row"> 
                    <div class="col-md-3">
                       <button type="button" name="filter" id="filter" class="btn btn-info btn-sm">بحث</button>
                       <!-- <button type="button" name="printpdf" id="printpdf" class="btn btn-warning btn-sm">Refresh</button> -->
                    </div>
                    
                    
                    <div class="col-md-3">
                        <div class=" input-daterange">
                          <label>إلى تاريخ</label>
                           <input type="text"  name="to_date" id="to_date" placeholder="{{ date('Y-m-d ') }}" class="form-control" />
                        </div>
                    </div>
                   
                    <div class="col-md-3">
                        <div class="input-group input-daterange">
                          <label>من تاريخ</label>                          
                           <input type="text" name="from_date" id="from_date" placeholder="{{ date('Y-m-d ') }}" class="form-control" />
                           <!-- <div class="input-group-addon">to</div> -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group ">
                          <label>اسم المريض</label>
                          <input type="text" name="name" id="first_name_ar"  class="form-control" />
                        </div>
                    </div>
                    
                </div>


                <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2" style="float: right;">
                       <h3></h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    
                      <thead>
                        <tr>
                           
                           <th class="text-center">اسم المريض</th>
                           <th class="text-center">تاريخ الموعد</th>
                           <th class="text-center">طباعة</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        
                      
                      </tbody>
                  </table>
                  {{ csrf_field() }}
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

<script>
  $(document).ready(function(){
     var date = new Date();
     $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: 'yyyy-mm-dd',
        autoclose: true
     });
     var _token = $('input[name="_token"]').val();
     fetch_data();
     function fetch_data(name = '', from_date = '', to_date = '')
     {
        $.ajax({
           url:"{{ route('patientsearch') }}",
           method:"POST",
           data:{name:name, from_date:from_date, to_date:to_date, _token:_token},
           dataType:"json",
           success:function(data)
           {
              var output = '';

              for(var i = 0; i < data.length; i++)
              {
                 var outputt = '<button style=" padding: 6px 68px !important;" type="button" class="btn btn-outline-success" ><a href='+'patientpdf/'+data[i].id+'>طباعة </a></button>';
              	for(var r = 0; r < data[i].patientapointment.length; r++)
              	{
              	  output += '<tr>';
                  output += '<td class="text-center">' + data[i].first_name_ar + '</td>'; 
                 	output += '<td class="text-center">' + data[i].patientapointment[r].date + '</td>';
                  output += '<td class="text-center"><a href="patientpdf/'+data[i].id+'"><i class="bi bi-printer"></i>print</a></td></tr>';
              	}
              }
              
              
              $('tbody').html(output);
              $('h3').html(outputt);
           }
        })
     }

     $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var name = $('#first_name_ar').val();
        var to_date = $('#to_date').val();
        if(name != '' && from_date != '' &&  to_date != '')
        {
           fetch_data(name, from_date, to_date);
        }
        else
        {
           alert('Both Date is required');
        }
     });


  });
  
</script>
