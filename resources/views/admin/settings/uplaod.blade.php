@extends('layout.admin_main')
@section('content')	


 <div class="container" style="height: 454px !important;
    padding-top: 125px;">
    <div class="row align-items-center">

    	<div class="row col-md-12">
    			<input type="file" name="video_car" id="video_car" accept="video/*" capture="environment">
    			<div class="col-md-12 ">
                                            <div class="form-group">
                                              <div class="progress prog">
                                                <div class="progress-bar progress-bar1 prog-bar1 progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                              </div>
                                            </div>
                                        </div>
    	</div>
    	<div class="row col-md-12">
    		<br>
    	</div>
    	
		
	</div>
</div>

<script  type="module">



</script>
	<script type="module">

		


async function uploadFile() {
    	

			  	

   $(function () {
        $.ajaxSetup({
          headers: {'X-CSRF-Token': '{{csrf_token()}}'}
        });
         let uploadInput = document.getElementById('video_car');
         // let prog = document.getElementsByClassName("progress-bar1");

        var video = $(uploadInput)[0].files[0];
        var formData = new FormData();
        formData.append('file', video);

        $.ajax({
            xhr: function() {
              var xhr = new window.XMLHttpRequest();
              xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                  var percentComplete = evt.loaded / evt.total;
                  percentComplete = parseInt(percentComplete * 100);

                  $('.progress-bar1').width(percentComplete+'%');
                  $('.progress-bar1').html(percentComplete+'%');

                }
              }, false);
              return xhr;
            },

            url: "{{route('savevides')}}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log('ffffffsaid');
               console.log(data);
               // await addtomyacount('11111');
               
            }
        });
        
    }); 

   
}



document.getElementById('video_car').addEventListener('change', uploadFile);

</script>
   

@endsection
