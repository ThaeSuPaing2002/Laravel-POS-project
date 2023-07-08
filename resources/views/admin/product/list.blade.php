@extends('admin.layouts.master')
@section('title','Product List Page')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Product List</h2>

                        </div>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="{{route('product#createPage')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Create new product
                            </button>
                        </a>
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h4>Total - </h4>
                    </div>
                    <div class="col-3">
                        <h4>Search Key - </h4>
                    </div>
                    <div class="col-6">
                        <nav class="navbar bg-body-tertiary">
                            <div class="container-fluid">
                              <form class="d-flex" role="search" method="get">
                                <input name="searchKey" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
                                <button class="btn btn-outline-success" type="submit">Search</button>
                              </form>
                            </div>
                          </nav>
                    </div>
                </div>
                {{-- to show alert part --}}
                <div class="row">
                    @if(session('deleteSuccess'))
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('deleteSuccess')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>price</th>
                                <th>Waiting Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($products)!=0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="col-lg-3"><img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="..."></td>
                                        <td>{{$product->name}}</td>
                                        <td>Category</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->waitingTime}} mins</td>
                                        <td>
                                            <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                                <button type="button" class="btn btn-primary">View</button>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <a href="{{route('product#delete',$product->id)}}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <h1>No Product Yet!</h1>
                            @endif
                        </tbody>

                    </table>
                    {{$products->links()}}
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>

</div>
@endsection
