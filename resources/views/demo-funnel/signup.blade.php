@extends('demo-funnel.demofunnel-layout')

@section('title', 'Example Sign Up Page')
@section('content')

  <section class="row">
    <div class="col-md-5 signup-head">
      <h1>We are currently developing this project and are accepting a limited number of companies to work with us.</h1>
      <h3>To apply to be one of the companies to help us develop this product fill out the form.</h3>
    </div>
    <div class="col-md-7">
        <signup-component></signup-component>
    </div>
  </section>

<section>
  <div class="">
    <div class="col-12">
      <img src="/imgs/svg/undraw_subscriber_vabu.svg" class="img-fluid" alt="...">
    </div>
  </div>

</section>


@endsection
