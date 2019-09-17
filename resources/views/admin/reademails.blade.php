@extends('layouts.admin')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">

<a href="/admin/contacts"><button>Massages</button></a>
<a href="/admin/leads"><button>Leads</button></a>

<div class="container">



<hr>

    <email-component></email-component>


</div>



<pre><?php // print_r($email); ?></pre>



  </section>



@endsection
