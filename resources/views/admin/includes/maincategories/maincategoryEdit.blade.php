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
              <li class="breadcrumb-item active"><a href="{{route('admin.maincategory')}}">Categories Section</a></li>
              <li class="breadcrumb-item active">Edit-{{$main_category->name}}</li>

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
          <h3 class="card-title">Edit </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')

        <form action="{{route('admin.maincategory.update',$main_category->id)}}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{$main_category -> id}}" type="hidden">
            <div class = "form-group">
                <div class="text-center">
                    <img
                        src="{{$main_category ->photo}}"
                        class="rounded-circle  height-50" width="50px" alt="category image">
                </div>
            </div>

          <div class="card-body">
            <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Edit Category Name {{__('messages.'.$main_category ->translation_lang)}}</label>
                         <input type="text" class="form-control"
                          id="name" placeholder="Enter Category Name"
                          name="category[0][name]"
                          value="{{$main_category->name}}">
                          @error('category.0.name')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                    </div>
                </div>

                 <div class="col-md-6" hidden>
                    <div class="form-group">
                     <label for="exampleInputPassword1">Language Code {{__('messages.'.$main_category ->translation_lang)}}</label>
                     <input type="text" class="form-control"
                      id="abbr" placeholder=""
                      name="category[0][abbr]"
                      value="{{$main_category->translation_lang}}">
                      @error('category.0.abbr')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                     </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Direction</label>
                        <select name="direction" class="form-control select2" style="width: 100%;">
                        <option value="ltr" @if($language->direction=='ltr') selected @endif>Left-To-Right</option>
                        <option value="rtl" @if($language->direction=='rtl') selected @endif>Right-To-Left</option>
                        </select>
                        @error('direction')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div> --}}

             <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input value="1" name="category[0][active]" type="checkbox"
                       class="custom-control-input" id="customSwitch1"
                       @if($main_category ->active == 1)checked @endif/>
                      @error('category.0.active')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                      <label class="custom-control-label" for="customSwitch1">Status {{__('messages.'.$main_category ->translation_lang)}}</label>
                    </div>
            </div>

          </div>

          <div class="form-group">
            <input name="photo" type="file" class="" id="file">
            @error('photo')
            <span class="text-danger">{{$message}}</span>
          @enderror
            {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
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
