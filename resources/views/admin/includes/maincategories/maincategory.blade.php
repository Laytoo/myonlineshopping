@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('admin.langauge')}}">MainCategory</a></li>
              <li class="breadcrumb-item active"><a href="{{route('admin.langauge.create')}}">Add Category</a></li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories Table</h3>
              </div>
              <!-- /.card-header -->
            @include('admin.includes.alerts.success')
            @include('admin.includes.alerts.errors')
              <div class="card-body">
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th >Name</th>
                      <th >Language</th>
                      <th>Status</th>
                      {{-- <th >Photo</th> --}}
                      <th >Photo</th>
                      <th >Editting</th>
                    </tr>
                  </thead>

                  <tbody>
                    @isset($categories)
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{$category->name}}</td>
                      <td>{{get_default_language()}}</td>
                      <td>{{$category->getActive()}}</td>
                      <td> <img style="width: 150px; height: 100px;" src="{{$category ->photo}}"></td>
                      {{-- <td>{{$category->photo}}</td> --}}
                      {{-- <td>{{$lang->active}}</td> --}}

                      <td>
                        <div class="btn-group" role="group">
                       <a href="{{route('admin.maincategory.edit',$category->id)}}"
                          class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                       <a href="{{route('admin.maincategory.delete',$category->id)}}"
                          class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
                          <a href="{{route('admin.maincategory.delete',$category->id)}}"
                            class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">Active</a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                    @endisset

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection
