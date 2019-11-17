@extends('layouts.admin')

@section('title', 'Contacts')
@section('content')


<!-- section 1 -->
<section class="row">
<div class="container">
<h1>Contact Messages</h1>
<div class="card">
<h5 style="background-color: #fff;" class="card-header">Inbox</h5>
<div class="card-body">
  <inbox-component></inbox-component>
</div>
</div>
</div>
</section>


@endsection
