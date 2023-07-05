@extends('admin.layouts.master')
@section('title','Profile Edit Page')
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
                                <form action="{{route('admin#update',Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="col-12">
                                    @if(Auth::user()->image == null)
                                        <img src="{{asset('admin/images/default-user.png')}}" class="img-thumbnail" />
                                        @else
                                        <img src="{{asset('storage/'.Auth::user()->image)}}"  />
                                    @endif
                                    <div class="mb-3">
                                         <input class="form-control form-control-sm" id="formFileSm" name="image" type="file">
                                      </div>
                                </div>
                                <div class="col-8 ">

                                        <div class="mb-3">
                                          <label for="" class="form-label">Name</label>
                                          <input type="text" class="form-control" name="uname" value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="uemail" value="{{Auth::user()->email}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="uphone" value="{{Auth::user()->phone}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="uaddress" value="{{Auth::user()->address}}">
                                        </div>
                                        <div class="mb-3">
                                          <label for="" class="form-label">Role</label>
                                          <input type="text" class="form-control" value="{{Auth::user()->role}}" disabled>
                                        </div>
                                        <button class="btn btn-success" type="submit">Update Profile</button>

                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
