@extends('layouts.admin')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">


<ul>
@foreach ($leads as $l)
    <li>{{$l->first_name}} {{$l->last_name}} | {{$l->email}} </li>
@endforeach
</ul>

<a href="/admin/leads/export"><button>Export leads</button></a>



  </section>



@endsection
