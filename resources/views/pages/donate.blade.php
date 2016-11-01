@extends('app')

@section ('title')Donate @endsection

@section('content')
@if (isset($error) || $error=session('error'))
  <div class="alert alert-danger">
    {{ $error }}
  </div>
@endif

@if(isset($message) || $message=session('message'))
  <div class="alert alert-success">
    {{ $message }}
  </div>
@endif
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
  <strong>Looking to close the donation goal for this month?</strong> If you're donating via Stripe, remember they take fees. If you want to close the donation gap via Stripe, donate <strong><?=sprintf("$%1.2f",
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
      <img src="/img/donate/stripe.svg" />
      <div class="caption">
        <h3>Stripe</h3>
        <p>
          Donate with your credit / debit card using Stripe. Your card data is never sent to or stored on cock.li.
        </p>
        <form method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token()  }}">
          <div class="input-group">
            <div class="input-group-addon">$</div>
            <input name="amount" class="text" class="form-control" id="stripeAmount" placeholder="69" style="width:100px;" />
            <span class="input-group-btn" style="width:100%;">
              <button class="btn btn-block btn-success" id="stripeSubmit" >Donate with Stripe</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
window.onload = function(){
  var handler = StripeCheckout.configure({
    key: '{{ env('STRIPE_PUBLIC') }}',
    locale: 'auto',
    token: function(token) {
      $('<input>').attr({
        type: 'hidden',
        name: 'stripeToken',
        value: token.id
      }).appendTo('form');
      $('form').submit();
    }
  });

  $("#stripeSubmit").on("click", function(e) {
    handler.open({
      name: 'Cock.li Donation',
      description: ':3',
      amount: $('#stripeAmount').val() * 100
    });
    e.preventDefault();
  });
}
</script>

<h2>Perks</h2>

<p>
  There are a few small perks for donating to cock.li. To claim your testimonial, drawing, or sticker, send an E-mail to me, <a href="mailto:vc@cock.li">vc@cock.li</a>, confirming the details of your donation and what you would like. Bitcoin donators, please E-mail this information <em>before</em> you submit your donation.
</p>

<h3>$5.00+</h3>
<div class="media-body">
  <p>
    Donations starting at $5.00 are eligible to receive a testimonial that displays on the front page. The testimonials are picked at random from the existing testimonials, and do not expire.
  </p>
</div>

<h3>$25.00+</h3>
<p>
  Donations starting at $25.00 are eligible to receive one of either a drawing or a sticker, as well as a testimonial. International shipping anywhere Romania ships to.
</p>
<h4>Drawings</h4>
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
        Available to you is a custom drawing of your choice drawn on the finest paper Auchan has to offer with either smelly permenant markers that will probably stain the other side of the paper, or this gay blue pen which was the only 0.5mm pen I could find. I am terrible at drawing and can just short of guarantee your disappointment with your drawing. No, really. Don't get your hopes up.
      </p>
    </div>
  </div>
</div>

<h4>Stickers</h4>
<p>
  There are 3 styles of stickers:
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

<h3>$40.00+</h3>
<p>
  Donations starting at $40.00 are eligible for a sticker, drawing, and testimonial.
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
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-07.txt">July</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-08.txt">August</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-09.txt">September</a>
  <a class='col-xs-4 col-sm-2 col-lg-1' href="/donations/2016-10.txt">October</a>
</strong></div>

@endsection
