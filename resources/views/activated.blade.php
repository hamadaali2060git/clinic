@extends('layout.admin_main')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
           <strong>حسناً</strong> {{ session()->get('message') }}, الذهاب للتطبيق 
        </div>
    @endif

    @if(Session::has('errorss'))                                
        <span class="text-danger">{{Session::get('errorss')}}</span>
    @endif         
@endsection
