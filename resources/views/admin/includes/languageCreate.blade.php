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
              <li class="breadcrumb-item active">Add Languages</li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
    <!-- Main content -->
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Languages</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')

        <form action="{{route('admin.langauge.store')}}" method="post">
            @csrf
          <div class="card-body">
            <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Language Name</label>
                         <input type="text" class="form-control"
                          id="name" placeholder="Enter Language Name"
                          name="name">
                          @error('name')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                    </div>
                </div>

                 <div class="col-md-6">
                    <div class="form-group">
                     <label for="exampleInputPassword1">Language Code</label>
                     <input type="text" class="form-control"
                      id="abbr" placeholder="Enter Language Code "
                      name="abbr">
                      @error('abbr')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                     </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Direction</label>
                        <select name="direction" class="form-control select2" style="width: 100%;">
                        <option value="ltr" selected="selected">Left-To-Right</option>
                        <option value="rtl">Right-To-Left</option>
                        </select>
                        @error('direction')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

             <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input value="1" name="active" type="checkbox"
                       class="custom-control-input" id="customSwitch1"
                        checked >

                      @error('active')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                      <label class="custom-control-label" for="customSwitch1">Status</label>
                    </div>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
            <button onclick="history.back();" type="button" class="btn btn-danger">Cancel</button>
          </div>
        </form>
      </div>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection
