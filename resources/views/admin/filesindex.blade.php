@extends('layouts.admin')

@section('title', 'Files')
@section('content')


<!-- section 1 -->
<section class="row align-items-center">
<div class="container">
<h1>Files</h1>
</div>

<hr/>

  </section>


  <uploadfiles-component></uploadfiles-component>

  <hr/>

  <displayfiles-component></displayfiles-component>


@endsection
