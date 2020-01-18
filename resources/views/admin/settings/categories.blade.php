@extends('layouts.admin')
@section('title', 'Categories')
@section('content')

<h1>Categories</h1>
<!-- User Registration -->
<section class="row align-items-center">
    <div class="container">
    <h3>Categories</h3>
    <categories-component></categories-component>
    </div>
</section>

<!-- Site Map -->
<!-- <section class="row align-items-center">
    <div class="container">
      <h3>Site Map</h3>
      <createsitemap-component></createsitemap-component>
    </div>
</section> -->

@endsection
