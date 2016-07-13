@extends('app')

@section ('title')Donate @endsection

@section('content')
<p>
  Maintaining cock.li requires a decent amount of money to run. I'm committed to keeping these expenses as low as possible, but as the site continues to expand, the site relies on donations to pay the bills.
</p>

<p>
  Cock.li operates with a rolling budget. This means that if expenses are <i>x</i> and donations are <i>x+$5.00</i>, next month's goal is </i>x-$5.00</i>. Likewise if there are <i>x-$5.00</i> donations, the next month's goal is <i>x+$5.00</i>. This ensures that cock.li operates not-for-profit, and any money donated goes directly to the service.
</p>

<p>
  Full disclosure: I also operate a website "Cockbox" which is on the cock.li domain (<a href="https://box.cock.li">box.cock.li</a>). It is a VPS hosting company that provides virtual servers for a modest profit. Cockbox is a for-profit venture, while the cock.li mail server operates wholly not-for-profit.
</p>

<p>
  I have no interest in monetizing any aspect of the mail server. All parts of the service are provided for free for everyone, and because of that I ask you to consider donating to cover the cost of hosting and domain registration.
</p>

<h2>Payment Methods</h2>
@if($donations["this"]["expenses"] - $donations["this"]["balance"] - $donations["this"]["donations"] > 0)
<div class="alert alert-warning">
  <strong>Looking to close the donation goal for this month?</strong> If you're donating via PayPal, remember they take fees. If you want to close the donation gap via PayPal, donate <strong><?=sprintf("$%1.2f",
    ceil(((100/971) * (10 * (($donations["this"]["expenses"] - $donations["this"]["balance"] - $donations["this"]["donations"])) + 3))*100)/100)
  ?></strong> to bring the gap to $0.00.
</div>
@endif
<div class="row">
  <div class="col-sm-6">
    <div class="thumbnail">
      <img src="/img/donate/bitcoin.svg" />
      <div class="caption">
        <h3>Bitcoin</h3>
        <p>
          Bitcoin is the currency of the future. Are you from the future?
        </p>
        <p>
          <i><u>1Hwu59kNc2pGE9LKjMxdNThvWjKSyEfWbk</u></i>
        </p>
        <a class="btn btn-block btn-success" href="bitcoin:1Hwu59kNc2pGE9LKjMxdNThvWjKSyEfWbk">Donate with Bitcoin</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="thumbnail">
      <img src="/img/donate/paypal.svg" />
      <div class="caption">
        <h3>PayPal</h3>
        <p>
          Donate fees to your jewish overlords.
        </p>
        <p>
        <br /> 
        </p>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
						">
        		<input type="submit" class="btn btn-block btn-success" value="Donate with PayPal" />
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
      </div>
    </div>
  </div>
</div>

<h2>Perks</h2>

<div class="alert alert-danger">
<strong>I am not currently mailing out stickers or drawings since I don't really know how to send international mail here in Romania. I'll start sending them once I get that figured out. Sorry.</strong>
</div>

<p>
  There are a few small perks for donating to cock.li. To claim your testimonial, drawing, or sticker, send an E-mail to me, <a href="mailto:vc@cock.li">vc@cock.li</a>, confirming the details of your donation and what you would like. PayPal donators can put this in the instructions field. Bitcoin donators, please E-mail this information <em>before</em> you submit your donation.
</p>

<h3>$1.00+</h3>
<div class="media-body">
  <p>
    Donations starting at $1.00 are eligible to receive a testimonial that displays on the front page. The testimonials are picked at random from the existing testimonials, and do not expire.
  </p>
</div>

<h3>$10.00+</h3>
<div class="media-body">
  <div class="media">
    <div class="media-left media-top">
      <div class="thumbnail">
        <a href="//cock.li/img/drawing-example-large.jpg"><img src="//cock.li/img/drawing-example.jpg" alt="A goat surfing on a cock"></a>
        <div class="caption">
          An example drawing: A goat surfing on a cock
        </div>
      </div>
    </div>
    <div class="media-body">
      <p>
        Donations starting at $10.00 are eligible to receive a custom drawing of their choice. I am terrible at drawing and can just short of guarantee your disappointment with your drawing. Testimonial included at no additional charge.
      </p>
    </div>
  </div>
</div>

<h3>$20.00+</h3>
<p>
  Donations starting at $20.00 are elgiible to receive a cock.li sticker. There are 3 styles of stickers:
</p>
<div class="row">
  <div class="col-sm-4">
    <div class="thumbnail">
      <a href="/img/stickers/circle-chen-large.png">
        <img src="/img/stickers/circle-chen.png" alt="" />
      </a>
      <div class="caption">
        <p>
          Sticker 1A: 3" circular sticker with Cock-chen
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="thumbnail">
      <a href="/img/stickers/circle-chen-label-large.png">
        <img src="/img/stickers/circle-chen-label.png" alt="" />
      </a>
      <div class="caption">
        <p>
          Sticker 1B: 3" circular sticker with Cock-chen, the cock.li slogan, and the cock.li address
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="thumbnail">
      <a href="/img/stickers/duke-large.png">
        <img src="/img/stickers/duke.png" alt="" />
      </a>
      <div class="caption">
        <p>
          Sticker 2: 2.5"x2" "40KB" sticker with cock.li address and slogan
        </p>
      </div>
    </div>
  </div>
</div>

<h3>$25.00+</h3>
<p>
  Donations starting at $25.00 are eligible for a sticker, drawing, and testimonial.
</p>

<h2>Donation History</h2>

<p>
  Cock.li's donation history is completely transparent. You can view a history of cock.li's finances here:
</p>

<h3>2013</h3>
<div class='row text-center'><strong>
  <a class='col-xs-offset-4 col-sm-offset-8 col-lg-offset-10 col-xs-4 col-sm-2 col-lg-1' href="/donations/2013-11.txt">November</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2013-12.txt">December</a>
</strong></div>
<h3>2014</h3>
<div class='row text-center'><strong>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-01.txt">January</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-02.txt">February</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-03.txt">March</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-04.txt">April</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-05.txt">May</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-06.txt">June</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-07.txt">July</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-08.txt">August</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-09.txt">September</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-10.txt">October</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-11.txt">November</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2014-12.txt">December</a>
</strong></div>
<h3>2015</h3>
<div class='row text-center'><strong>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-01.txt">January</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-02.txt">February</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-03.txt">March</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-04.txt">April</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-05.txt">May</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-06.txt">June</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-07.txt">July</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-08.txt">August</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-09.txt">September</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-10.txt">October</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-11.txt">November</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2015-12.txt">December</a>
</strong></div>
<h3>2016</h3>
<div class='row text-center'><strong>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-01.txt">January</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-02.txt">February</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-03.txt">March</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-04.txt">April</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-05.txt">May</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-06.txt">June</a>
</strong></div>

@endsection
