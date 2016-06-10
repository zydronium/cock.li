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
    <td>STARTTLS Port</td>
    <td>143</td>
    <td>110</td>
    <td>587</td>
  </tr>
  <tr>
    <td>SSL/TLS Port</td>
    <td>993</td>
    <td>995</td>
    <td>465</td>
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

<h2>Infrastructure</h2>

<div class='row'>
  <div class='col-sm-4'>
  <table class='table table-bordered table-striped'>
    <tr>
      <th colspan='2' class='text-center'>mx1.cock.li</th>
    </tr>
    <tr>
      <th>Host</th>
      <td>Flokinet</td>
    </tr>
    <tr>
      <th>Country</th>
      <td>Romania</td>
    </tr>
    <tr>
      <th>IP</th>
      <td>185.100.85.212</td>
    </tr>
    <tr>
      <th>Type</th>
      <td>Colocated</td>
    </tr>
  </table>
  </div>
  <div class='col-sm-4'>
  <table class='table table-bordered table-striped'>
    <tr>
      <th colspan='2' class='text-center'>mx2.cock.li</th>
    </tr>
    <tr>
      <th>Host</th>
      <td>"some pasta host"</td>
    </tr>
    <tr>
      <th>Country</th>
      <td>Italy</td>
    </tr>
    <tr>
      <th>IP</th>
      <td>193.234.224.104</td>
    </tr>
    <tr>
      <th>Type</th>
      <td>VPS</td>
    </tr>
  </table>
  </div>
  <div class='col-sm-4'>
  <table class='table table-bordered table-striped'>
    <tr>
      <th colspan='2' class='text-center'><a href='https://vc.gg/blog/announcing-the-iron-dong-hidden-service-backup-system/'>iron_dong</a></th>
    </tr>
    <tr>
      <th>Host</th>
      <td>?</td>
    </tr>
    <tr>
      <th>Country</th>
      <td>?</td>
    </tr>
    <tr>
      <th>IP</th>
      <td>?</td>
    </tr>
    <tr>
      <th>Type</th>
      <td>Hidden Service</td>
    </tr>
  </table>
  </div>
</div>
@endsection
