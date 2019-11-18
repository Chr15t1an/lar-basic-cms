@extends('layouts.admin')

@section('title', 'Edit Post')
@section('content')
<!-- include summernote css/js -->


<!-- section 1 -->
<section class="row">
<div class="container">
<h1>Edit post.</h1>
<div class="card">
<h5 style="background-color: #fff;" class="card-header">Edit post.</h5>
<div class="card-body">
  <edit-post-component></edit-post-component>
</div>
</div>
</div>
</section>





@endsection
