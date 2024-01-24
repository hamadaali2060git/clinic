@extends('layout.admin_main')
@section('content')	




  <script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>

<!--  <section id="basic">
          <div class="row">
            <div class="col-12">
              <div class="card">
             
                <div class="card-content collapse show">
                  <div class="card-body">
                    
                    <div class="form-group">
                      <textarea name="ckeditor" id="ckeditor" cols="30" rows="15" class="ckeditor">
								<h1><img alt="Saturn V carrying Apollo 11" class="right" src="../../../app-assets/images/elements/01.png" height="250" /> Apollo 11</h1>
								<p><strong>Apollo 11</strong> was the spaceflight that landed the first humans, Americans <a href="http://en.wikipedia.org/wiki/Neil_Armstrong">Neil Armstrong</a> and <a href="http://en.wikipedia.org/wiki/Buzz_Aldrin">Buzz Aldrin</a>, on the Moon on July 20, 1969, at 20:18 UTC. Armstrong became the first to step onto the lunar surface 6 hours later on July 21 at 02:56 UTC.</p>
								<p>Armstrong spent about <s>three and a half</s> two and a half hours outside the spacecraft, Aldrin slightly less; and together they collected 47.5 pounds (21.5&nbsp;kg) of lunar material for return to Earth. A third member of the mission, <a href="http://en.wikipedia.org/wiki/Michael_Collins_(astronaut)">Michael Collins</a>, piloted the <a href="http://en.wikipedia.org/wiki/Apollo_Command/Service_Module">command</a> spacecraft alone in lunar orbit until Armstrong and Aldrin returned to it for the trip back to Earth.</p>
								<h2>Broadcasting and <em>quotes</em> <a id="quotes" name="quotes"></a></h2>
								<p>Broadcast on live TV to a world-wide audience, Armstrong stepped onto the lunar surface and described the event as:</p>
								<blockquote>
								<p>One small step for [a] man, one giant leap for mankind.</p>
								</blockquote>
								<p>Apollo 11 effectively ended the <a href="http://en.wikipedia.org/wiki/Space_Race">Space Race</a> and fulfilled a national goal proposed in 1961 by the late U.S. President <a href="http://en.wikipedia.org/wiki/John_F._Kennedy">John F. Kennedy</a> in a speech before the United States Congress:</p>
								<blockquote>
								<p>[...] before this decade is out, of landing a man on the Moon and returning him safely to the Earth.</p>
								</blockquote>
								<h2>Technical details <a id="tech-details" name="tech-details"></a></h2>
								<table align="right" border="1" bordercolor="#ccc" cellpadding="5" cellspacing="0" style="border-collapse:collapse">
									<caption><strong>Mission crew</strong></caption>
									<thead>
										<tr>
											<th scope="col">Position</th>
											<th scope="col">Astronaut</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Commander</td>
											<td>Neil A. Armstrong</td>
										</tr>
										<tr>
											<td>Command Module Pilot</td>
											<td>Michael Collins</td>
										</tr>
										<tr>
											<td>Lunar Module Pilot</td>
											<td>Edwin &quot;Buzz&quot; E. Aldrin, Jr.</td>
										</tr>
									</tbody>
								</table>
								<p>Launched by a <strong>Saturn V</strong> rocket from <a href="http://en.wikipedia.org/wiki/Kennedy_Space_Center">Kennedy Space Center</a> in Merritt Island, Florida on July 16, Apollo 11 was the fifth manned mission of <a href="http://en.wikipedia.org/wiki/NASA">NASA</a>&#39;s Apollo program. The Apollo spacecraft had three parts:</p>
								<ol>
									<li><strong>Command Module</strong> with a cabin for the three astronauts which was the only part which landed back on Earth</li>
									<li><strong>Service Module</strong> which supported the Command Module with propulsion, electrical power, oxygen and water</li>
									<li><strong>Lunar Module</strong> for landing on the Moon.</li>
								</ol>
								<p>After being sent to the Moon by the Saturn V&#39;s upper stage, the astronauts separated the spacecraft from it and travelled for three days until they entered into lunar orbit. Armstrong and Aldrin then moved into the Lunar Module and landed in the <a href="http://en.wikipedia.org/wiki/Mare_Tranquillitatis">Sea of Tranquility</a>. They stayed a total of about 21 and a half hours on the lunar surface. After lifting off in the upper part of the Lunar Module and rejoining Collins in the Command Module, they returned to Earth and landed in the <a href="http://en.wikipedia.org/wiki/Pacific_Ocean">Pacific Ocean</a> on July 24.</p>
								<hr />
								<p><small>Source: <a href="http://en.wikipedia.org/wiki/Apollo_11">Wikipedia.org</a></small></p>
							</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> -->



		<div class="content-header row">
			        <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">الاعدادات</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">الاعدادات
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>
			        
			        @if (session('success'))
			            <div class="alert alert-success">
			                {{ session('success') }}
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
               
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                   	<div class="card-body">
										<form action="{{url('admin/settings/update')}}" method="POST" 
								                name="le_form"  enctype="multipart/form-data">
								                                @csrf
											<input type="hidden" name="id" value="{{Auth::user()->id}}">
											
											
											
							
	<!--<form id="form1" runat="server">-->
 <!--       <input type="file" accept="image/*" capture>-->
 <!--       <input type="file" accept="image/*" capture="camera">-->
 <!--       <input type="file" accept="video/*" capture="environment"  id="videoFile" />-->
 <!--       <img id="blah" src="#" alt="your image" />-->
 <!--   </form>-->

    
    <!--<script type="text/javascript">-->
    <!--    function readURL(input) {-->
    <!--        if (input.files && input.files[0]) {-->
    <!--            var reader = new FileReader();-->

    <!--            reader.onload = function (e) {-->
    <!--                $('#blah').attr('src', e.target.result);-->
    <!--            }-->

    <!--            reader.readAsDataURL(input.files[0]);-->
    <!--        }-->
    <!--    }-->

    <!--    $("#imgInp").change(function(){-->
    <!--        readURL(this);-->
    <!--    });-->
    <!--</script>-->

											
											
											
											
											
											
											<div class="form-group">
												<label>العنوان العربي</label>
												<input type="text" name="title" class="form-control" value="{{$settings->title}}">
											</div>
											<div class="form-group">
												<label>رقم الهاتف</label>
												<input type="text" name="phone" class="form-control" value="{{$settings->phone}}">
											</div>
											
											<div class="form-group">
												<label>الوصف </label>
												<!-- <input type="text" name="privacy" class="form-control" value="{{$settings->privacy}}"> -->
												<textarea name="desc" id="ckeditor" cols="30" rows="15"  class="form-control ckeditor">{{$settings->desc}}</textarea>
											</div>
											
											<!-- <div class="form-group">
												<label>الوصف انجليزي</label>
												<input type="text" name="description_en" class="form-control" value="{{$settings->description_en}}">
											</div>	 -->										
																							
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$settings->image) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>صورة التى سوف يتم عرضها في صفحة من حنح</label>
													<input type="file" name="image" class="form-control">						
													<!-- <input type="hidden" name="url" value="{{$settings->image}}">	 -->
												</div>												
											</div>
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$settings->logo) }}" alt="Speciality" width="120" height="100">
												</div>
												<div class="col-md-10">
													<label>الشعار</label>
													<input type="file" name="logo" class="form-control">						
													<!-- <input type="hidden" name="url" value="{{$settings->logo}}">	 -->
												</div>												
											</div>
											<div class="form-group row">
												<div class="col-md-2">
													<img class="avatar-img" src="{{asset('img/settings/'.$settings->favicon) }}" alt="Speciality" width="120" height="100">
												</div>	
												<div class="col-md-10">
													<label>Favicon</label>
													<input type="file" name="favicon" class="form-control">	
													<!-- <input type="hidden" name="url2" value="{{$settings->favicon}}">	 -->
												</div>	
												
											</div>
											<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
											
										</form>
									</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>


@endsection


