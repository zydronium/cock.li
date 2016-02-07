@extends('app')

@section ('title')Server Info @endsection

@section('content')
<p>
  Cock.li's settings should be detected automatically by your mail client. If they aren't, the table below should help you out. Cock.li requires encryption, so if your mail client doesn't support that you will have to use <a href='https://mail.cock.li/'>web mail</a>.
</p>

<h2>Mail Settings</h2>
<table class='table table-striped table-bordered'>
  <tr>
    <td></td>
    <th>IMAP</th>
    <th>POP</th>
    <th>SMTP</th>
  </tr>
  <tr>
    <td>Server</td>
    <td>mail.cock.li</td>
    <td>mail.cock.li</td>
    <td>mail.cock.li</td>
  </tr>
  <tr>
    <td>Port</td>
    <td>143 or 993</td>
    <td>110 or 995</td>
    <td>25, 465, 587, or 55555</td>
  </tr>
  <tr>
    <td>Encryption</td>
    <td>STARTTLS</td>
    <td>STARTTLS</td>
    <td>STARTTLS</td>
  </tr>
  <tr>
    <td>Username</td>
    <td><i>username</i>@<i>domain.tld</i></td>
    <td><i>username</i>@<i>domain.tld</i></td>
    <td><i>username</i>@<i>domain.tld</i></td>
  </tr>
</table>

<h2>E-mail Troubleshooting</h2>
<dl>
  <dt>I forgot my password!</dt>
  <dd>
    Remember it. I don't reset passwords.
  </dd>

  <dt>I can't log in</dt>
  <dd>
    Either your password is incorrect, or your username is wrong (the username needs the domain portion, e.g. "vc@cock.li", not "vc")
  </dd>

  <dt>I can't send E-mail through my mail client</dt>
  <dd>
    If you're able to receive E-mail fine, chances are your SMTP port is blocked by your ISP. Try an alternate port.
  </dd>

  <dt>ur gay</dt>
  <dd>
    no u
  </dd>
</dl>
@endsection
