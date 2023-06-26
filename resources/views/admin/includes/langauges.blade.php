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
              <li class="breadcrumb-item active"><a href="{{route('admin.langauge')}}">Languages</a></li>
              <li class="breadcrumb-item active"><a href="{{route('admin.langauge.create')}}">Add Languages</a></li>

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
                <h3 class="card-title">Languages Table</h3>
              </div>
              <!-- /.card-header -->
            @include('admin.includes.alerts.success')
            @include('admin.includes.alerts.errors')
              <div class="card-body">
                <table class="table table-bordered">

                  <thead>
                    <tr>
                      <th >Name</th>
                      <th >Abbr</th>
                      <th>Direction</th>
                      <th >Statu</th>
                      <th >Editting</th>
                    </tr>
                  </thead>

                  <tbody>
                    @isset($languages)
                    @foreach ($languages as $lang)
                    <tr>
                      <td>{{$lang->name}}</td>
                      <td>{{$lang->abbr}}</td>
                      <td>{{$lang->direction}}</td>
                      {{-- <td>{{$lang->active}}</td> --}}
                      <td>{{$lang->getActive()}}</td>
                      <td>
                        <div class="btn-group" role="group">
                       <a href="{{route('admin.langauge.edit',$lang->id)}}"
                          class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Edit</a>
                       <a href="{{route('admin.langauge.delete',$lang->id)}}"
                          class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">Delete</a>
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
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
