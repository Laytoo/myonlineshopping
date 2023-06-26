@if(Session::has('error'))
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close"
     data-dismiss="alert"id="type-error"
      aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> </h5>
    {{session::get('error')}}
  </div>
@endif
