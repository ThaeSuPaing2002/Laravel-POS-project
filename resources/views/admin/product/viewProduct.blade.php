@extends('admin.layouts.master')
@section('title','Product Create Page')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card mb-3" style="">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{asset('storage/'.$details->image)}}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><span class="bg-danger text-white py-1">{{$details->name}}</span></h5>
                      <div class="mb-3 mt-2">
                        <small><span class="bg-secondary text-white p-1"><i class="fa-solid fa-money-bill px-1 pe-2"></i>{{$details->price}} Kyats</span></small>
                        <small><span class="bg-secondary text-white p-1"><i class="fa-solid fa-clock px-1 pe-2"></i>{{$details->waitingTime}} mins</span></small>
                        <small><span class="bg-secondary text-white p-1"><i class="fa-solid fa-eye px-1 pe-3"></i>{{$details->viewCount}} views</span></small>
                        <small><span class="bg-secondary text-white p-1">{{$details->created_at}} </span></small>
                      </div>
                      <p class="card-text">{{$details->description}}</p>
                    </div>
                  </div>
                  <div class="col-2 offset-1 my-3">
                  <a href="{{route('product#edit',$details->id)}}"><button class="btn btn-success px-5 me-5">Edit</button></a>
                </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
