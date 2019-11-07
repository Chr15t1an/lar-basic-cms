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

  <form action="/admin/files" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlFile1">Example file input</label>
      <input type="file" class="form-control-file" name="file">
    </div>
    <input type="submit" value="Upload Image" name="submit">
</form>







@endsection
