@extends('app')

@section ('title')Privacy Policy @endsection

@section('content')

<h4>Information stored via web servers</h4>
<p>
  When you visit a page on cock.li, your IP address, user agent, and referer are saved forever. I do this for historical analytics and other cool graph stuff. Some day I'd like to anonymize this data automatically while keeping geoip info, but for now that is not the case.
</p>
<p>
  Logs for mail.cock.li (webmail) is completely disabled.
</p>
<p>
  I anonymize any data calculated using the HTTP access logs before publishing them. Promise.
</p>

<h4>Information stored via xmpp servers</h4 
<p>
  Only the bare info is stored, meaning your roster list and any info like mood or whatever you provide to the server. All logging is disabled.
</p>

<h4>Information stored via mail servers</h4>
<p>
  Here's the juicy stuff. There are 3 classes of information here: Public, confidential, and private. They are listed and explained below.</p>

<ul>
  <li>Public (May be made public at any time)</li>
  <ul>
    <li>Your e-mail address (existence of your email address can be checked during registration and password changing)</li>
    <li>Anonymized data including the time you registered, GeoIP maps, etc.</li>
    <li>Anything posted to any lists.cock.li mailing lists</li>
    <li>Anything E-mailed to me</li>
  </ul>
  <li>Confidential (Used in abuse investigations and when complying with legal orders for user information)</li>
  <ul>
    <li>User-specific disk space statistics</li>
    <li>Sieve rules</li>
    <li>Data stored permenantly:</li>
    <ul>
      <li>Registering IP address</li>
      <li>Time registered</li>
    </ul>
    <li>Data stored for 2 days:</li>
    <ul>
      <li>IMAP logs are <strong>disabled</strong></li>
      <li>SMTP logs, including who you send E-mail to and at what time, and who you receive E-mail from and at what time. IPs are logged with these.</li>
    </ul>
  </ul>
  <li>Private (Only looked at when complying with legal orders for user information)</li>
  <ul>
    <li>IMAP folder names and structure</li>
    <li>E-mail content</li>
    <li>E-mail headers</li>
  </ul>
</ul>

@endsection
