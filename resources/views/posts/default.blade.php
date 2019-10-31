@extends('layouts.main')
@section('title', 'Handle Inbound App')


@section('content')
<section class="row align-items-center">
<div class="col-md-7 col-12">
  <h1>{{$post->title}}</h1>
</div>
</section>


<section class="row">
  <div class="col-12">
<!-- https://github.com/andreasindal/laravel-markdown -->
{!! $post->body !!}
  </div>
</section>




@endsection
