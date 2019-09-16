@extends('layouts.main')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">

<a href="/admin/contacts"><button>Massages</button></a>
<a href="/admin/leads"><button>Leads</button></a>
<ul>
@foreach ($contacts as $contact)
    <a href="contacts/{{$contact->id}}"><li>{{$contact->first_name}} {{$contact->last_name}} |   {{ str_limit($contact->msg, $limit = 150, $end = '...') }}</li></a>
@endforeach
</ul>
<pre>
  <?php //print_r($contact); ?>
</pre>

  </section>



@endsection
