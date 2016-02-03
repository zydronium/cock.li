@extends('app')

@section ('title')XMPP @endsection

@section('content')
  <p>yeah it's XMPP with cocks</p>
  <p>Your cock.li account functions as both an E-mail and XMPP account. To use cock.li's XMPP server, simply specify your username for the username field, and your domain for the domain field. And they say jabber is complicated!!!</p>
  <h2>What the fuck is XMPP and how do I use it</h2>
  <p>
    Okay so you know how E-mail is decentralized in that anyone can start their own server and communicate with other E-mail servers? XMPP is like that for instant messaging. It's like an AIM or MSN Messenger that communicates with other servers. So in that sense it respects your Freedoms&#8482; and it's cool and you should use it.
  </p>
  <p>
    To connect to an XMPP server, you'll need a client. For Windows and Linux <a href="https://pidgin.im">Pidgin</a> is pretty good, for OS X stop sucking a dick for 5 seconds and install <a href="https://adium.im">Adium</a>.
  </p>
  <p>
    OTR (Off-The-Record) Messaging is an amazing plugin that allows client-side encryption with people you communicate with over XMPP (as well as other protocols). It's awesome and if you're going to use XMPP, <strong>you should use OTR too!</strong> Downloads and stuff are available <a href="https://otr.cypherpunks.ca/">here</a>. I think Adium comes with OTR and if you use Linux then you can probably install the <strong>pidgin-otr</strong> package in your package manager.
  </p>
  <p>
    To enable the plugin, go to <strong>Tools &rarr; Plugins &rarr; Off-the-Record Messaging</strong> and check the check box.
  </p>
  <h2>I'm scared what settings do I put in?</h2>
  <p>
    Jesus Christ you're a fucking pussy. Here's a couple images just for you. You only need to specify the "connect server" if it doesn't work for you without it. It should work for most domains.
  </p>
  <img src='/img/xmpp-1.png' />
  <img src='/img/xmpp-2.png' />
@endsection
