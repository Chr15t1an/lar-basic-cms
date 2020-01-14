@extends('layouts.admin')
@section('title', 'Settings')
@section('content')

<h1>Settings</h1>
<!-- Google Tag Manager -->
<section class="row">
  <div class="container">
    <h3>Google Tag Manager</h3>
    <gtm-component></gtm-component>
  </div>
</section>

<!-- Api Keys -->
<section class="row align-items-center">
    <div class="container">
      <h3>Api Keys</h3>
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
</section>

<!-- User Registration -->
<section class="row align-items-center">
    <div class="container">
    <h3>User Registration</h3>
    <user-reg-component></user-reg-component>
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
