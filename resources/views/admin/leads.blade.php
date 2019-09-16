@extends('layouts.main')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">

<a href="/admin/contacts"><button>Massages</button></a>
<a href="/admin/leads"><button>Leads</button></a>
<ul>
@foreach ($leads as $l)
    <li>{{$l->first_name}} {{$l->last_name}} | {{$l->email}} </li>
@endforeach
</ul>

<a href="/admin/leads/export"><button>Export leads</button></a>



  </section>



@endsection
