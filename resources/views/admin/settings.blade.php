@extends('layouts.admin')

@section('title', 'Settings')
@section('content')


<!-- section 1 -->
<section class="row align-items-center">
<div class="container">
<h1>Settings</h1>
</div>

<div class="row">
<div class="container">
<gtm-component></gtm-component>
</div>
</div>
<hr/>

  </section>


<section >

  <div class="row">
  <div class="container">

  <sitechecklist-component></sitechecklist-component>
  </div>
  </div>
  <hr/>

</section>







@endsection
