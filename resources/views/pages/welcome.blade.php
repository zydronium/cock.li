@extends('app')

@section ('title')Home @endsection

@section('content')
  <blockquote>
    {!! $testimonial->content !!}
    <footer>{{ $testimonial->name }}</footer>
  </blockquote>
  <p>
  Cock.li is your go-to solution for professional E-mail addresses and XMPP addresses. Since 2013 cock.li has provided stable E-mail services to an ever-increasing number of users. Cock.li allows registration and usage using Tor and other privacy services (proxies, VPNs) and is run by "some dude", not a business. I use this E-mail service personally so I have a vested interest in keeping it up, stable, and secure.
  </p>

  <div class="alert alert-warning">
    <h2 style='margin-top: 0'>Notice Regarding Der Fritz</h2>
    <p>
      The German procesution office in the city of Zwickau has seized two of cock.li's hard drives, about 3 weeks apart, resulting in the total loss of mail storage and everything else stored on the server. I've restored the service from a backup of the user database, but since there was no database replication I cannot enable registration on the existing domains without risking account impersonation by those that register someone else's missing account before the actual owner does. Due to this fact and my commitment to protect my users from impersonation, registration will only be open for <i>new</i> domains until I get the HDDs back.
    </p>
    <p>
      Cock.li is now colocated with <a href='https://flokinet.is/'>FlokiNET</a>, in Bucharest, Romania, a privacy-conscious host that has proved it will advocate for the privacy of its customers.
    </p>
    <h3>Frequently Asked Guestions</h2>
    <dl>
      <dt>Is this why all my mails are gone / why my account disappeared?</dt>
      <dd>Yes.</dd>

      <dt>When will things be back to normal?</dt>
      <dd>When I get the HDD back</dd>

      <dt>Can you recover my account / mails anyway?</dt>
      <dd>No wtf, pls stop asking</dd>
    </dl>
  </div>

  <h2>Contact</h2>
  <p>
    Cock.li is owned and operated by <a href="http://vc.gg/">Vincent Canfield &lt;vc@cock.li&gt;</a>. Anyone else claiming to be staff is lying and if you believe them you deserve anything that happens to you. I can be reached via E-mail or by phone at <a href="tel:+12062036677">+1.206 203 6677</a>. This phone number reaches my cell phone and will wake me up, so please only call after 1AM UTC if the server is down.
  </p>

  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <h2>User Count</h2>
      <table class='table table-striped table-bordered'>
        <tr>
          <th>Domain</th>
          <th># Users</th>
          <th>Registration Open</th>
        </tr>
        @foreach ($domains as $domain)
        <tr>
          <td>{{ $domain->domain }}</td>
          <td>{{ $domain->count }}</td>
          <td>@if ($domain->open) <strong style="color:#090;">YES</strong> @else <strong style="color:#900;">NO</strong> @endif</td>
        </tr>
        @endforeach
        <tr>
          <th>Total</th>
          <th>{{ $total }}</th>
        </tr>
      </table>
    </div>
    <div class="col-xs-12 col-sm-6">
      <h2>Donations</h2>
      <h3>This Month</h3>
      <?php
        $goal = $donations["this"]["expenses"] - $donations["this"]["balance"];
        $_donations = $donations["this"]["donations"];

        $balance_operator = ( $donations["this"]["balance"] >= 0 ? '-' : '+' );
        $balance_verbage = ( $donations["this"]["balance"] >= 0 ? 'surplus' : 'deficit' );
        $progress_bar_class = ( $_donations >= $goal ? 'success' : 'info');

        if($_donations > $goal)
          $progress_bar_width = 100.00;
        else
          $progress_bar_width = (float) ($_donations / $goal) * 100;
      ?>
      <div class="progress">
        <div class="progress-bar progress-bar-{{ $progress_bar_class }} progress-bar-striped" style="width: <?=sprintf("%1.2f",$progress_bar_width)?>%;"></div>
      </div>
      <p><strong>Donations</strong>: $<?=sprintf("%1.2f",$_donations)?></p>
      <p><strong>Goal</strong>: $<?=sprintf("%1.2f",$goal)?> ($<?=sprintf("%1.2f",$donations["this"]["expenses"])?> {{ $balance_operator }} $<?=sprintf("%1.2f",abs($donations["this"]["balance"]))?> {{ $balance_verbage }})</p>
      <h3>Last Month</h3>
      <?php
        $goal = $donations["last"]["expenses"] - $donations["last"]["balance"];
        $_donations = $donations["last"]["donations"];

        $balance_operator = ( $donations["last"]["balance"] >= 0 ? '-' : '+' );
        $balance_verbage = ( $donations["last"]["balance"] >= 0 ? 'surplus' : 'deficit' );
        $progress_bar_class = ( $_donations >= $goal ? 'success' : 'danger');

        if($_donations > $goal)
          $progress_bar_width = 100.00;
        else
          $progress_bar_width = (float) ($_donations / $goal) * 100;
      ?>
      <div class="progress">
        <div class="progress-bar progress-bar-{{ $progress_bar_class }} progress-bar-striped" style="width: <?=sprintf("%1.2f",$progress_bar_width)?>%;"></div>
      </div>
      <p><strong>Donations</strong>: $<?=sprintf("%1.2f",$_donations)?></p>
      <p><strong>Goal</strong>: $<?=sprintf("%1.2f",$goal)?> ($<?=sprintf("%1.2f",$donations["last"]["expenses"])?> {{ $balance_operator }} $<?=sprintf("%1.2f",abs($donations["last"]["balance"]))?> {{ $balance_verbage }})</p>
      <p>
        Donations are calculated such that any surplus or deficit is carried to the next month. This ensures that cock.li operates not-for-profit. You can read more details and financial reports on the <a href="/donate">Donate</a> page.
      </p>

      <h2>Transparency</h2>
      <p>
        It is my intention to operate cock.li as transparent as possible. To accomplish this I publish all communication I have with law enforcement including or regarding a demand or order for user information. All of this information is published on the <a href="/transparency">transparency</a> page.
    </div>
  </div>
  <h2>How can I trust you?</h2>
  <p>
    You can't. Cock.li doesn't parse your E-mail to provide you with targeted ads, nor do I read E-mail contents unless it's for a legal court order. However, it is 100% possible for me to read E-mail, and IMAP/SMTP doesn't provide user-side/client-side encryption, so you're just going to have to take my word for it. Any encryption implementation would still technically allow me to read E-mail, too. This was true for Lavabit, too -- while your E-mail was stored encrypted (only if you were a paid member, which most people forget), E-mail could still technically be intercepted while being received / sent (SMTP), or while being read by your mail client (IMAP). For privacy, I would recommend encrypting your E-mails using <a href="https://en.wikipedia.org/wiki/Pretty_Good_Privacy">PGP</a> using a mail client add-on like <a href="https://enigmail.net/home/index.php">Enigmail</a>.
@endsection
