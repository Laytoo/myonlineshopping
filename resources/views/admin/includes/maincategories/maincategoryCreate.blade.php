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
              <li class="breadcrumb-item active"><a href="{{route('admin.maincategory')}}">MainCategory</a></li>
              <li class="breadcrumb-item active">Add Category</li>

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
          <h3 class="card-title">Category Table</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')


          <div class="card-body">
            <form class="form" action="{{route('admin.maincategory.store')}}" method="POST"
            enctype="multipart/form-data">
                @csrf

            @if (get_languages()->count()>0)
                @foreach (get_languages() as $index=> $lang)

                <div class="form-body">
            <div class="row">
                 <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category Name {{__('messages.'.$lang -> abbr)}}</label>
                         <input type="text" value="" class="form-control"
                          id="name" placeholder=""
                          name="category[{{$index}}][name]">
                        @error("category.$index.name")
                          <span class="text-danger">This Field is Required</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Category Name</label>
                         <input type="text" class="form-control"
                          id="name" placeholder="Ex:Clothes-Mobiles-..."
                          name="category[1][name]">
                          @error('name')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                    </div>
                </div> --}}
                 <div class="col-md-6" hidden>
                    <div class="form-group">
                     <label for="exampleInputPassword1">Language Code {{__('messages.'.$lang -> abbr)}}</label>
                     <input type="text" class="form-control"
                      id="abbr" placeholder=" "
                      value="{{$lang->abbr}}"
                      name="category[{{$index}}][abbr]">
                      @error("category.$index.abbr")
                      <span class="text-danger">This Field is Required</span>
                      @enderror
                     </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
             <div class="form-group">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                    value="1" name="category[{{$index}}][active]" checked>
                    <label class="form-check-label">Status {{__('messages.'.$lang -> abbr)}}</label>
                  </div>


                    {{-- <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                         value="1" name="category[{{$index}}][active]" checked>
                        <label for="customCheckbox1" class="custom-control-label">Status {{__('messages.'.$lang -> abbr)}}</label>
                      </div> --}}

                      {{-- <input value="1" name="category[{{$index}}][active]" type="checkbox"
                       class="switchery" id="switcheryColor4"
                        checked > --}}
                      {{-- <label class="control-label" for="switcheryColor4">Status {{__('messages.'.$lang -> abbr)}}</label> --}}

                      @error("category.$index.active")
                      <span class="text-danger">rrr</span>
                    @enderror


            </div>
                </div>

            </div>
            @endforeach
            @endif
                </div>

                <div class="form-group">
                    <input name="photo" type="file" class="" id="file">
                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                    {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                  </div>

          </div>
          <!-- /.card-body -->

          <div class="form-actions">
            <button type="button" class="btn btn-warning mr-1"
                    onclick="history.back();">
                <i class="ft-x"></i> تراجع
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="la la-check-square-o"></i> حفظ
            </button>
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
