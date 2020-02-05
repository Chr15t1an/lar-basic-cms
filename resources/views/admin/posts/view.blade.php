@extends('layouts.admin')

@section('title', 'All Posts')
@section('content')


<!-- Leads -->

<section class="row">
<div class="container">
<h1>Blog Posts</h1>
<div class="card">
<div class="card-body">
  <view-posts-component></view-posts-component>
</div>
</div>
</div>
</section>

@endsection
