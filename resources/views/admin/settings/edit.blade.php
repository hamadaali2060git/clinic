@extends('layout.front.main')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-md-12 col-12">
        <nav aria-label="breadcrumb" class="page-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
          </ol>
        </nav>
        <h2 class="breadcrumb-title">Profile Settings</h2>
      </div>
    </div>
  </div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

        <!-- Profile Sidebar -->
        @include('layout.front.sidebar')
        <!-- /Profile Sidebar -->

      </div>
      <div class="col-md-7 col-lg-8 col-xl-9">

        <!-- Basic Information -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Basic Information</h4>
            <!--  -->
            <form method="post" action="{{url('profile/update')}}" enctype="multipart/form-data">
                @csrf
              <input type="hidden" name="id" value="{{$doctor->id}}">
              <div class="row form-row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="change-avatar">
                      <div class="profile-img">
                        <img src="{{asset('img/profiles/'.$doctor->photo) }}" alt="User Image">
                      </div>
                      <div class="upload-img">
                        <div class="change-photo-btn">
                          <span><i class="fa fa-upload"></i> Upload Photo</span>
                          <input type="file" class="upload" name="photo">
                        </div>
                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>First Name </label>
                    <input type="text" name="first_name" class="form-control" value="{{$doctor->first_name}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Last Name </label>
                    <input type="text" name="last_name" class="form-control" value="{{$doctor->last_name}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email </label>
                    <input type="email" name="email" class="form-control" value="{{$doctor->email}}" readonly>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="mobile" class="form-control" value="{{$doctor->mobile}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label>experience</label>
                    <input type="text" name="experience" class="form-control" value="{{$doctor->experience}}">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>bio</label>
                    <input type="text" name="bio" class="form-control" value="{{$doctor->bio}}">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>detail</label>
                    <input type="text" name="detail" class="form-control" value="{{$doctor->detail}}">
                  </div>
                </div>
              </div>
              <div class="submit-section">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
              </div>
            </form>
            <!--  -->

          </div>

        </div>
        <!-- /Basic Information -->

        <!-- About Me -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">settings app</h4>
            <form method="post" action="{{url('settings/update')}}" enctype="multipart/form-data">
                @csrf
              <div class="row form-row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Clinic domain name</label>
                    <input type="text" name="name" class="form-control" value="{{$settings->name}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>title ar</label>
                    <input type="text" name="title_ar" class="form-control" value="{{$settings->title_ar}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>title ar</label>
                    <input type="text" name="title_en" class="form-control" value="{{$settings->title_en}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Clinic phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$settings->phone}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Clinic mail</label>
                    <input type="text" name="mail" class="form-control" value="{{$settings->mail}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label>Clinic desc ar</label>
                    <textarea name="desc_ar" class="form-control" rows="5">{{$settings->desc_ar}}</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label>desc en</label>
                    <textarea name="desc_en" class="form-control" rows="5">{{$settings->desc_en}}</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label>privacy ar</label>
                    <textarea name="privacy_ar" class="form-control" rows="5">{{$settings->privacy_ar}}</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0">
                    <label>privacy en</label>
                    <textarea name="privacy_en" class="form-control" rows="5">{{$settings->privacy_en}}</textarea>
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label>Clinic logo</label>
                    <input type="file" class="form-control">
                  </div>
                </div> -->
                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label>Clinic image</label>
                    <input type="file" class="form-control">
                  </div>
                </div> -->
                <div class="col-md-12"><br>
                  <div class="form-group">
                    <div class="change-avatar">
                      <div class="profile-img">
                        <img src="{{asset('img/settings/'.$settings->logo) }}" alt="User Image">
                      </div>
                      <div class="upload-img">
                        <div class="change-photo-btn">
                          <span><i class="fa fa-upload"></i> Upload logo</span>
                          <input type="file" class="upload" name="logo">
                        </div>
                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="change-avatar">
                      <div class="profile-img">
                        <img src="{{asset('img/settings/'.$settings->image) }}" alt="User Image">
                      </div>
                      <div class="upload-img">
                        <div class="change-photo-btn">
                          <span><i class="fa fa-upload"></i> Upload Photo</span>
                          <input type="file" class="upload" name="image">
                        </div>
                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="change-avatar">
                      <div class="profile-img">
                        <img src="{{asset('img/settings/'.$settings->favicon) }}" alt="User Image">
                      </div>
                      <div class="upload-img">
                        <div class="change-photo-btn">
                          <span><i class="fa fa-upload"></i> Upload favicon </span>
                          <input type="file" class="upload" name="favicon">
                        </div>
                        <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label>Clinic favicon</label>
                    <input type="file" class="form-control">
                  </div>
                </div> -->
              </div>
              <div class="submit-section">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /About Me -->
        <!-- Pricing -->
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Detection price</h4>
            <form method="post" action="{{url('settings/price/update')}}">
                @csrf
              <!-- <div class="form-group ">
                <div id="pricing_select">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input" checked>
                    <label class="custom-control-label" for="price_custom">Custom Price </label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="price_free" >
                    <label class="custom-control-label" for="price_free">Free</label>
                  </div>

                </div>
              </div> -->
              <!-- style="display: none;" -->
              <div class="row custom_price_cont" id="custom_price_cont" >
                <div class="col-md-4">
                  <input type="number" class="form-control" id="custom_rating_input" name="price" value="{{$settings->price}}" >
                  <!-- <small class="form-text text-muted">Custom price you can add</small> -->
                </div>
              </div>
              <br>
              <div class="submit-section">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Pricing -->



        <!-- <div class="submit-section submit-btn-bottom">
          <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
        </div> -->

      </div>
    </div>

  </div>

</div>
      <!-- /Page Content -->
@endsection
