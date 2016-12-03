@extends('app')

@section ('title')Privacy Policy @endsection

@section('content')

<p>This page was last modified on: 2016-12-03. View changes <a href="https://gitgud.io/vc/cock.li/commits/master/resources/views/pages/privacy.blade.php">here</a>.</p>

<h4>Information stored via web servers</h4>
<p>
  HTTP access logs for cock.li are retained for 2 days. Anonymized analytics information is collected by the self-hosted libre software <a href="https://piwik.org/">Piwik</a> and is periodically anonymized and scrubbed. Information compiled from this non-identifying information may be made public at any time. Visitors who have the <a href="http://donottrack.us/">Do Not Track</a> header set are not tracked by Piwik.
</p>
<p>
  HTTP access logs for mail.cock.li (webmail) are completely disabled.
</p>

<h4>Information stored via xmpp servers</h4>
<p>
  Only the bare info is stored, meaning your roster list and any info like mood or whatever you provide to the server. All logging is disabled.
</p>

<h4>Information stored via mail servers</h4>
<p>
  Here's the juicy stuff. There are 3 classes of information here: Public, confidential, and private. They are listed and explained below.
</p>

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
      <li>Password changes (only user ID and time are recorded)</li>
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
