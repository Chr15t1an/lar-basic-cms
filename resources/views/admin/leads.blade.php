@extends('layouts.admin')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row ">


<ul>
@foreach ($leads as $l)
    <li>{{$l->first_name}} {{$l->last_name}} | {{$l->email}} | <a href="">delete</a></li>
@endforeach
</ul>

<hr/>
<a href="/admin/leads/export"><button>Export leads</button></a>



  </section>



@endsection
