@extends('layouts.main')

@section('title', 'Handle Inbound App')
@section('content')



<section class="row align-items-center">
<div class="col-md-7 col-12">
  <h1>Capture, track, and simplify all email and phone conversations from your customers and leads. </h1>
</div>
<div class="col-md-5 col-12 p-5 cta-section">
<a href="/signup"><button type="button" class="btn btn-primary btn-lg">Sign Up</button></a>
    <a href="/pricing"><button type="button" class="btn btn-outline-dark btn-lg">Pricing</button></a>
</div>

</section>


<section class="home-section-2 row align-items-center">
  <div class="col-md-4 col-12">
    <img src="imgs/svg/undraw_manage_chats_ylx0.svg" class="img-fluid" alt="...">
  </div>
  <div class="col-md-8 col-12">

<ul>
  <li>Know how many calls and emails your business gets. </li>

  <li>Have a single source of truth for everyone on your team to understanding the customer’s relationship.</li>

  <li>When someone contacts your business route the call, or email, where it should go with the customers profile</li>
</ul>
  </div>


</section>

<section class="justify-content-around row">
  <div class="cta-section">
    <button type="button" class="btn btn-primary btn-lg">Sign Up</button>
    <a href="/pricing"><button type="button" class="btn btn-outline-dark btn-lg">Pricing</button></a>
  </div>

</section>



@endsection
