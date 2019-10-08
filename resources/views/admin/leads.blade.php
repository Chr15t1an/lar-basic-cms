@extends('layouts.admin')

@section('title', 'Leads')
@section('content')


<!-- section 1 -->
  <section class="row ">


<leads-component></leads-component>


<hr/>
<a href="/admin/leads/export"><button>Export leads</button></a>



  </section>



@endsection
