@extends('layouts.admin')

@section('title', 'Leads')
@section('content')


<!-- Leads -->

<section class="row">
<div class="container">
<h1>Leads</h1>
<div class="card">
<h5 style="background-color: #fff;" class="card-header">Leads</h5>
<div class="card-body">
  <leads-component></leads-component>
</div>
</div>
</div>
</section>


@endsection
