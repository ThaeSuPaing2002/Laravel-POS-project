@extends('admin.layouts.master')
@section('title')
Category List Page
@endsection
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
                        <a href="{{route('category#createPage')}}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>Create new category
                            </button>
                        </a>
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <h4>Total - {{$categories->count()}}</h4>
                    </div>
                    <div class="col-3">
                        <h4>Search Key - {{request('searchKey')}}</h4>
                    </div>
                    <div class="col-6">
                        <nav class="navbar bg-body-tertiary">
                            <div class="container-fluid">
                              <form class="d-flex" role="search" action="{{route('category#list')}}" method="get">
                                <input name="searchKey" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{request('searchKey')}}">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                              </form>
                            </div>
                          </nav>
                    </div>
                </div>
                <div class="row">
                    @if(session('deleteSuccess'))
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('deleteSuccess')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    @if(session('createSuccess'))
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('createSuccess')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    @if(session('updateSuccess'))
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('updateSuccess')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Category id</th>
                                <th>Category Name</th>
                                <th>Created at</th>
                                <th>CRUD</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($categories)!=0)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->created_at->format('j-f-Y')}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button>
                                            <a href="{{route('category#edit',$category->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('category#delete',$category->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </a>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <h1>No Category Yet.</h1>
                            @endif

                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>

</div>
@endsection
