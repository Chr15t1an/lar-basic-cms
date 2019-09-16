@extends('layouts.main')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">

<a href="/admin/contacts"><button>Massages</button></a>
<a href="/admin/leads"><button>Leads</button></a>

<div class="container">

    {{$email->first_name}}
    {{$email->last_name}}<br/>
    {{$email->email}}<br/>
    {{$email->msg}}

    {{$email->read}}
    {{$email->archived}}

    @if ($email->read === 1)
    <p>EMail Has been read</p>
    @else
    <p>EMail is been UnRead</p>
    @endif


    @if ($email->archived === 1)
    <p>EMail Has been archived</p>
    @else
    <p>EMail is been Unarchived</p>
    @endif


<hr>

    <email-component></email-component>


</div>



<pre><?php // print_r($email); ?></pre>



  </section>



@endsection
