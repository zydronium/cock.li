@extends('app')

@section ('title')You just registered! @endsection

@section('content')
<h1>WOW!</h1>
<p>
  You are now the proud owner of a cock.li E-mail address. I hope you're fucking happy.
</p>
<p>
  You can now access your E-mail directly using <a href="{{ $_SERVER['SERVER_NAME'] == 'wwwcocklicdexedh.onion' ? url('http://cockmailwwfvrtqj.onion') : url('https://mail.cock.li/')  }}">Webmail</a>, or set up your own mail client using settings you can find on the <a href="/server">Server Info</a> page.
</p>
<p>
  <strong style="color:#C00;">REMEMBER</strong>: Passwords are NOT reset for ANY reason, so don't ask.
</p>
@endsection
