@extends('layouts.admin')

@section('title', 'Create Post')
@section('content')


<!-- section 1 -->
<section class="row">
<div class="container">
<h1>Create a post.</h1>
  <div class="card col-6">
    <div class="card-body">
      <create-post-component></create-post-component>
    </div>
  </div>
</div>
</section>



@endsection
