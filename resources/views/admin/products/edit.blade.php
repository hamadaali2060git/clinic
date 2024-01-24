@extends('layout.admin_main')
@section('content') 
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  

  <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
                      <h3 class="content-header-title mb-0 d-inline-block">إضافة كورس مباشر جديد</h3><br>
                        <div class="row breadcrumbs-top d-inline-block">
	                        <div class="breadcrumb-wrapper col-12">
	                       	<ol class="breadcrumb">
		                        <li class="breadcrumb-item"><a href="{{url('instructor/dashboard')}}">الرئيسية</a>	</li>
		            	       	<li class="breadcrumb-item active">كورسات مباشرة (اونلاين)</li>
	                        </ol> 
                        </div>
                      	</div>
                    </div> 
       @if(session()->has('message'))
            @include('admin.includes.alerts.success')
          @endif
  </div>



  <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                    <form action="{{route('products.update',$product->id)}}" method="POST" name="le_form"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                      <div class="row form-row">
                            <div class="form-group col-md-4 col-sm-6">
                                <label>البائع  </label>
                                <select class="form-control select" name="user_id">
                                    <option>اختر </option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" {{($user->id==$product->user_id) ? 'selected' : '' }}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label>نوع العقار </label>
                                <select class="form-control select" name="category_id">
                                    <option>اختر نوع العقار</option>
                                    @foreach ($categories as $_item)
                                        <option value="{{$_item->id}}" {{($_item->id==$product->category_id) ? 'selected' : '' }}>{{$_item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label>المدينة </label>
                                <select class="form-control select" name="city_id">
                                    <option>اختر المدينة</option>
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}" {{($city->id==$product->city_id) ? 'selected' : '' }}>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label>المنطقة </label>
                                <select class="form-control select" name="state_id">
                                    <option>اختر المنطقة</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}" {{($state->id==$product->state_id) ? 'selected' : '' }}>{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label>عنوان / اسم العقار</label>
                                <input type="text" name="title" class="form-control" value="{{$product->title}}" id="titlearid">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <span id="titlearError" style="color: red;"></span>
                            </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label>سعر العقار</label>
                            <input type="text" name="price" class="form-control" value="{{$product->price}}" id="titlearid">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label>نوع الاعلان اجار/بيع</label>
                            <input type="text" name="type" class="form-control" value="{{$product->type}}" id="titlearid">
                            @error('type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>مكان أو عنوان العقار</label>
                            <input type="text" name="address" class="form-control" value="{{$product->address}}" id="titlearid">
                            @error('address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label> موقع أو لوكشن العقار علي الخريطه  </label>
                            <input type="text" name="location" class="form-control" value="{{$product->location}}" id="titlearid">
                            @error('location')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>عرض العقار كام متر</label>
                            <input type="text" name="width" class="form-control" value="{{$product->state_id}}" id="titlearid">
                            @error('width')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>طول العقار كام متر </label>
                            <input type="text" name="height" class="form-control" value="{{$product->height}}" id="titlearid">
                            @error('height')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>اجمالي مساحة العاقر</label>
                            <input type="text" name="total_area" class="form-control" value="{{$product->total_area}}" id="titlearid">
                            @error('total_area')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                         <div class="form-group col-md-3 col-sm-6">
                            <label>سنة البناء</label>
                            <input type="text" name="year" class="form-control" value="{{$product->year}}" id="titlearid">
                            @error('year')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label> عدد الحمامات</label>
                            <input type="text" name="bathrooms" class="form-control" value="{{$product->bathrooms}}" id="titlearid">
                            @error('bathrooms')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label>عدد الغرف</label>
                            <input type="text" name="rooms" class="form-control" value="{{$product->rooms}}" id="titlearid">
                            @error('rooms')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label>عدد الادوار</label>
                            <input type="text" name="role" class="form-control" value="{{$product->role}}" id="titlearid">
                            @error('role')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-6">
                            <label>وصف العقار</label>
                            <textarea name="description"  cols="30" rows="3"  class="form-control" id="target_groupid">{{$product->description}}</textarea>
                            <!--<input type="text" name="detailid" class="form-control" value="{{old('detailid')}}" id="detailid">-->
                            @error('target_group')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="target_groupError" style="color: red;"></span>
                        </div>
                            
                        <div class="form-group col-md-6 col-sm-6">
                            <label>صور العقار </label>
                            <input type="file" name="image[]" class="form-control" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF" id="imageid" multiple>
                            <span id="imageError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>اسم الشخص المعلن</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}" id="titlearid">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>اميل الشخص المعلن</label>
                            <input type="text" name="email" class="form-control" value="{{$product->email}}" id="titlearid">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>هاتف الشخص المعلن</label>
                            <input type="text" name="phone" class="form-control" value="{{$product->phone}}" id="titlearid">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titlearError" style="color: red;"></span>
                        </div>

                      </div>
                      <!--<div class="col-md-12"><hr/></div>-->
                    
                       

                    <div class="col-12 col-md-12">
                        <div class="form-group col-12 col-md-4">
                          <button type="submit" class="btn btn-primary btn-block" onclick="">حفظ </button>
                        </div> 
                        <div class="loader-wrapper col-md-4">
                            <div class="loader-container">
                              <div class="ball-spin-fade-loader loader-blue">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                              </div>
                            </div>
                        </div>

                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </section>
<?php 
   $videos=session()->get('videos_sessions');
?>

@endsection
             
<!-- 200 مقدم
400 عند الانتهاد من  التطبيق اندرويد و ios
100  عند الانتهاد من لوحة التحكم
100 بعد رفع التطبيق --> 