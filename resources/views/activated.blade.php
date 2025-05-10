@extends('layout.admin_main')
@section('content')
<section class="flexbox-container" style="text-align: left;">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-xl-10 col-md-6 col-12">
            <div class="card profile-card-with-cover">
                <div class="card-content card-deck text-center">
                    <div class="card box-shadow">
                        <!--<div class="card-header pb-0">-->
                        <!--  <h2 class="my-0 font-weight-bold">Free</h2>-->
                        <!--</div>-->
                        <div class="card-body">
                            @if(session()->has('message'))
                            <div class="alert alert-success">
                                <strong></strong> {{ session()->get('message') }}
                            </div>
                            <!--<a href="" class="btn btn-lg btn-block btn-outline-info"> الذهاب للتطبيق </a>-->
                            <a href="drehababomararapp://reset-success" onclick="setTimeout(function() {
                                          if (/android/i.test(navigator.userAgent)) {
                                            window.location.href = 'https://apps.apple.com/app/dr-ehab-abo-marar/id6744272221';
                                          } elseif (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
                                            window.location.href = 'https://apps.apple.com/app/dr-ehab-abo-marar/id6744272221';
                                          }
                                        }, 1500);">
                                <button>العودة إلى التطبيق</button>
                            </a>

                            @endif

                            @if(Session::has('errorss'))
                            <span class="text-danger">{{Session::get('errorss')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection