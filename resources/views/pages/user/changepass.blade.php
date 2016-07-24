@extends('app')

@section ('title')Change Password @endsection

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @if(is_object($errors))
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      @else
        @foreach ($errors as $error)
          <li>{{ $error }}</li>
        @endforeach
      @endif
    </ul>
  </div>
@endif

@if (session()->has('message'))
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
@endif

<form class="form-horizontal" role="form" method="POST" action="{{ url('/user/changepass') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label class="col-md-4 control-label">Old Password</label>
    <div class="col-md-6">
      <input type="password" class="form-control" name="old_password">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">New Password</label>
    <div class="col-md-6">
      <input type="password" class="form-control" name="password">
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">Confirm Password</label>
    <div class="col-md-6">
      <input type="password" class="form-control" name="password_confirmation">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <button type="submit" class="btn btn-primary">
        Change Password
      </button>
    </div>
  </div>

</form>
@endsection
