<?php $page="my-patients";?>
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
                        <li class="breadcrumb-item active" aria-current="page">My Patients</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">My Patients</h2>
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

                <div class="row row-grid">
                    @foreach ($patients as $item)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card widget-profile pat-widget-profile">
                            <div class="card-body">
                                <div class="pro-widget-content">
                                    <div class="profile-info-widget">
                                        <a href="{{url('patient-profile/'.$item->id)}}" class="booking-doc-img">
                                            <img src="{{asset('img/profiles/'.$item->photo) }}" alt="User Image">
                                        </a>
                                        <div class="profile-det-info">
                                            <h3><a href="patient-profile"></a></h3>

                                            <div class="patient-details">
                                            <h5 class="mb-0"> {{$item->first_name}} {{$item->last_name}}</h5>
                                                <h5><b>{{$item->email}}</b> </h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="patient-info">
                                    <ul>
                                        <li>Phone <span>{{$item->mobile}}</span></li>
                                        <li>dateOfBirth
                                            <span>
                                            @if($item->dateOfBirth)
                                              {{\Carbon\Carbon::parse($item->dateOfBirth)->age}}
                                            @endif
                                            @if($item->gender)
                                              , {{$item->gender}}
                                            @endif

                                            </span>
                                        </li>
                                        <li>Blood Group <span> {{$item->bloode_group}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
<hr>{{ $patients->links('admin.custom') }}
            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->
@endsection
