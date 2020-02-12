@extends('documentation.doc-main-layout')

@section('title', 'Market Test Template Documentation')
@section('content')
<section class="row align-items-center">
<div class="col-12">
<h1 class="text-center">Market Test Template</h1>
  <hr/>
    <div class="d-flex justify-content-around">
      <a href="/demo"><button class="btn btn-dark btn-lg btn-default">Demo</button></a>
      <a href="https://github.com/Chr15t1an/lar-basic-cms"><button class="btn btn-dark btn-lg btn-default">GitHub</button></a>
      <a href="/components"><button class="btn btn-dark btn-lg btn-default">Components</button></a>
      <a href="/installation"><button class="btn btn-dark btn-lg btn-default">Installation</button></a>

    </div>
  <hr/>

  <div class="container pt-4">
    <h2>What it is?</h2>
    <p class="lead">
      This Laravel based template serves as a starting point to test website ideas. This was inspired by The Lean Startup by Eric Ries and is a part of a market test process I am developing here <a href="https://myofficeitperson.com/posts/test-a-business-idea-process">https://myofficeitperson.com/posts/test-a-business-idea-process</a>.
    </p>
    <h2>What you can do with it?
    </h2>
    <p class="lead">Install this repository and have all of the boilerplate lead acquisition stuff done. Add your analytics script, build the design and copy for a lead funnel, and start running traffic at it.
    If your goal is to test a value proposition, pricing and track everything using Google Tag Manager & Google Analytics. This install may serve you.
    </p>
    <h2>Features
    </h2>
    <p class="lead">
      This install has components in place to collect leads, calculate pricing, capture contact messages, and create blog posts.
    </p>

  </div>
</section>



<section>
<div class="container pt-4">
  <div class="text-center pt-5">
    <h3>Tech Stack</h3>
    <p class="lead">PHP, Javascript, MYSQL, HTML & CSS<br/>
  </p>
    <div class="logos d-flex justify-content-around">
      <img src="/imgs/docs/php.png">
      <img src="/imgs/docs/js.jpg">
      <img src="/imgs/docs/msql.png">
      <img src="/imgs/docs/html.png">
      <img src="/imgs/docs/css.png">
    </div>
  </div>

  <div class="text-center pt-5">
    <h3>Framework</h3>
    <p class="lead">
    Vue JS , Laravel, Bootstrap.</p>
    <div class="logos d-flex justify-content-around">
      <img src="/imgs/docs/vuejs.png">

      <img src="/imgs/docs/Laravel.png">
      <img src="/imgs/docs/bootstrap.png">

    </div>
  </div>
  <div class="text-center pt-5">
    <h3>Methodology</h3>
      <p class="lead">Test-Driven Development - PhpUnit</p>
      <div class="logos d-flex justify-content-around">
        <img src="/imgs/docs/phpunit.png">
      </div>
  </div>
</div>

</section>


@endsection
