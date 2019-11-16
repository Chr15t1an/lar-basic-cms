@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')

<!-- Dashboard -->
  <section class="row">
<div class="container">
  <h1>Dashboard</h1>
  <div class="card">
  <h5 style="background-color: #fff;" class="card-header">Checklist</h5>
  <div class="card-body">
    <sitechecklist-component></sitechecklist-component>
  </div>
</div>
</div>
  </section>
@endsection
