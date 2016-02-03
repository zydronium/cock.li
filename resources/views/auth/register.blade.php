@extends('app')

@section ('title')Register @endsection

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

<script type='text/javascript'>
<?php
$parsed_domains = [];
foreach($domains as $domain)
  if($domain->owner)
    $parsed_domains[$domain->domain] = ['owner' => $domain->owner, 'owner_email' => $domain->owner_email];

$parsed_domains = json_encode($parsed_domains);
?>
domains = <?=$parsed_domains?>;

window.onload = function(){
  domainSelect = document.getElementById('domain');
  domainDisclaimer = document.getElementById('disclaimer');
  
  domainSelect.onchange = function() {
    if(domains[domainSelect.value]) {
      domain = domains[domainSelect.value];

      domainDisclaimer.style.display = 'block';
      domainDisclaimer.innerHTML = '<strong>' + domainSelect.value + '</strong> is owned by <strong>' + domain.owner + '</strong>. E-mail is completely managed by cock.li, but they alone are responsible for keeping DNS up to date and renewing the domain. They can be contacted at <strong><a href="mailto:'+domain.owner_email+'">'+domain.owner_email+'</a></strong>. If they disappear one day there is nothing I can do to save their domain.';
    } else {
      domainDisclaimer.style.display = 'none';
    }
  }

  domainSelect.onchange();
}
</script>

<div class='alert alert-warning' id='disclaimer' style='display:none;'>
</div>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
    <label class="col-md-4 control-label">E-Mail Address</label>
    <div class="col-md-6">
      <div class="input-group">
        <input type="text" class="form-control" name="username" value="{{ old('email') }}">
        <span class="input-group-addon">@</span>
        <select id='domain' name="domain" class="form-control" >
        @foreach ($domains as $domain)
          <option<?=$domain->domain === "cock.lu" ? " selected" : ""?>>{{ $domain->domain }}</option>
        @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-4 control-label">Password</label>
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
    <div class="col-md-4 text-right">
      <?php echo captcha_img(); ?>
    </div>
    <div class="col-md-6">
      <input type="text" class="form-control" name="captcha">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <input type="checkbox"  name="news_subscription" checked> This button doesn't do anything yet.
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <button type="submit" class="btn btn-primary">
        Register
      </button>
    </div>
  </div>
</form>
@endsection
