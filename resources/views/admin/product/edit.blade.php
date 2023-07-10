@extends('admin.layouts.master')
@section('title','Product Edit Page')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h1>Edit Product Page</h1>
            <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{route('product#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div>
            <div class="col-lg-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Product Edit Form</h3>
                        </div>
                        <hr>
                        <form action="{{route('product#update')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <input name="updateId" type="hidden" value="{{$data->id}}">
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                <input id="cc-pament" name="productName" type="text" class="form-control " aria-required="true" value="{{$data->name}}" aria-invalid="false">
                                <small class="text-danger">@error('productName'){{$message}}@enderror</small>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" name="productDescription" id="exampleFormControlTextarea1" rows="3">{{$data->description}} </textarea>
                                <small class="text-danger">@error('productDescription'){{$message}}@enderror</small>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Current Image</label>
                                <img src="{{asset('storage/'.$data->image)}}" class="img-thumbnail" alt="...">
                            </div>


                            <div class="mb-3">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input class="form-control" type="file" name="productImage" value="{{$data->image}}" id="formFile">
                                <small class="text-danger">@error('productImage'){{$message}}@enderror</small>
                              </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Price</label>
                                <input id="cc-pament" name="productPrice" type="number" class="form-control" value="{{$data->price}}" aria-required="true" aria-invalid="false">
                                <small class="text-danger">@error('productPrice'){{$message}}@enderror</small>
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Waiting Time in minutes</label>
                                <input id="cc-pament" name="waitingTime" type="number" class="form-control" value="{{$data->waitingTime}}" aria-required="true" aria-invalid="false">
                                <small class="text-danger">@error('waitingTime'){{$message}}@enderror</small>
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Create</span>
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
