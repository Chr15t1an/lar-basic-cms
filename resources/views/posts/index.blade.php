@extends('layouts.main')
@section('title', 'Handle Inbound App')


@section('content')
<section class="row align-items-center">
  @foreach ($posts as $post)
      <a href="posts/{{$post->slug}}"><p>{{ $post->title }}</p></a>
  @endforeach
</section>




@endsection
