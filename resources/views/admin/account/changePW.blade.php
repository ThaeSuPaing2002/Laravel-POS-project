@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h1>Change password</h1>
            <div class="row">
                <div class="col-12">
                    @if(session('notMatch'))
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('notMatch')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Change Password Form</h3>
                        </div>
                        <hr>
                        <form action="{{route('admin#changePassword')}}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <small class="text-danger">
                                    @error('oldPw')
                                    {{$message}}
                                    @enderror
                                </small>
                                <label for="cc-payment" class="control-label mb-1">Current Password</label>
                                <input id="cc-pament" name="oldPw" value=""type="password" class="form-control @error('categoryName') is-invalid @enderror" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="form-group">
                                <small class="text-danger">
                                    @error('newPw')
                                    {{$message}}
                                    @enderror
                                </small>
                                <label for="cc-payment" class="control-label mb-1">New Password</label>
                                <input id="cc-pament" name="newPw" value=""type="password" class="form-control @error('categoryName') is-invalid @enderror" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="form-group">
                                <small class="text-danger">
                                    @error('confirmPw')
                                    {{$message}}
                                    @enderror
                                </small>
                                <label for="cc-payment" class="control-label mb-1">Confirm New Password</label>
                                <input id="cc-pament" name="confirmPw" value=""type="password" class="form-control @error('categoryName') is-invalid @enderror" aria-required="true" aria-invalid="false">
                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Update</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    <i class="fa-solid fa-circle-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
