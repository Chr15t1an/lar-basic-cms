@extends('layouts.admin')

@section('title', 'SEO')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">

<h1>SEO Settings</h1>


@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

(Generate Sitemap )<br/>
<a href="/admin/settings/seo/gen-sitemap"><button>Generate Sitemap</button></a><br/>




  </section>



@endsection
