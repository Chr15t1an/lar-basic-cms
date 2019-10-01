@extends('layouts.admin')

@section('title', 'Settings')
@section('content')


<!-- section 1 -->
<section class="row align-items-center">
<div class="container">
<h1>Api Keys</h1>
</div>



<passport-clients></passport-clients>
<passport-authorized-clients></passport-authorized-clients>
<passport-personal-access-tokens></passport-personal-access-tokens>




</section>







@endsection
