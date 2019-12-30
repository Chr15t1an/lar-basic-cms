@extends('layouts.main')
@section('title',$post->title)
@section('metadescription',$post->meta_description)


@section('content')
<section class="row align-items-center">
<div class="col-md-7 col-12">
  <h1>{{$post->title}}</h1>
  <h6>Category : {{ $post->category->name or 'blank'  }}</h6>
  <h6>Category : {{ $post->tags->name or 'blank'  }}</h6>
</div>
</section>


<section class="row">
  <div class="col-12 post">
<!-- https://github.com/andreasindal/laravel-markdown -->
 @markdown($post->body)
  </div>
</section>




@endsection
