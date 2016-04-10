@extends('app')

@section ('title')Reserve Old Username @endsection

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (session()->has('message'))
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
@endif

<div class='alert alert-warning'>
  <h2>Alright motherfucker</h2>
  <p>Here's where you reserve your old cock.li username if you had one you lost in the raid. Here are the rules:</p>
  <ul>
    <li>You can reverve one username per account.</li>
    <li><strong>TYPE THE FULL E-MAIL ADDRESS MOTHERFUCKER</strong></li>
    <li>Attempts to script your reservations or in any other way bulk-reserve usernames will result in forfeiture of all reservations. This isn't my first rodeo, homie.</li>
    <li>Reservation period lasts 60 days.</li>
    <li>In the case where two users reserve the same account, a process will be installed at the end of the reservation period that will ensure a fake owner does not become the owner.</li>
    <li>Your reserved account will have the same password as the account you made the registration on.</li>
    <li><strong>YOU CANNOT CHANGE YOUR RESERVATION ONCE IT HAS BEEN MADE. NO EXCEPTIONS.</strong></li>
  </ul>
</div>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/user/reserve') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label class="col-md-4 control-label">Reserved Username</label>
    <div class="col-md-6">
      <input type="text" class="form-control" name="reserved_username" value="{{ $reserved }}" @if($reserved) disabled @endif>
    </div>
  </div>

  @if(!$reserved)
  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <button type="submit" class="btn btn-primary">
        reserve ur og cocc
      </button>
    </div>
  </div>
  @endif

</form>
@endsection
