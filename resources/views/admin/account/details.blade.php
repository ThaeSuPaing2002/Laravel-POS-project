@extends('admin.layouts.master')
@section('title','Account Profile')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h1>Account Details</h1>
            <div class="row">
                <div class="col-lg-9 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Your Profile</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    @if(Auth::user()->image == null)
                                        <img src="{{asset('admin/images/default-user.png')}}" class="img-thumbnail" />
                                        @else
                                        <img src="{{asset('storage/'.Auth::user()->image)}}"  />
                                    @endif
                                        <div class="text-center mt-3">
                                            <a href="{{route('admin#editPage')}}">
                                            <button class="btn btn-success">Edit Profile</button>
                                        </a>
                                        </div>
                                </div>
                                <div class="col-6 offset-1">
                                    <i class="fa-solid fa-user"></i>{{Auth::user()->name}}<hr>
                                    <i class="fa-solid fa-envelope"></i>{{Auth::user()->email}}<hr>
                                    <i class="fa-solid fa-phone"></i>{{Auth::user()->phone}}<hr>
                                    <i class="fa-solid fa-location-dot"></i>{{Auth::user()->address}}<hr>
                                   Join at {{Auth::user()->created_at}}<hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
