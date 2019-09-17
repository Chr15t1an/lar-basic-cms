@extends('layouts.admin')

@section('title', 'Handle Inbound App Pricing')
@section('content')


<!-- section 1 -->
  <section class="row align-items-center">

<a href="/admin/contacts"><button>Messages</button></a>
<a href="/admin/leads"><button>Leads</button></a>
<ul>
@foreach ($contacts as $contact)

          @if ($contact->archived === 1)
          <a style="text-decoration: line-through;" href="contacts/{{$contact->id}}" >
          @else
          <a href="contacts/{{$contact->id}}" >
          @endif



      @if ($contact->read === 1)
      <li>
      @else
        <li class="bg-info">
      @endif


      {{$contact->first_name}} {{$contact->last_name}} |   {{ str_limit($contact->msg, $limit = 150, $end = '...') }}</li></a>
@endforeach
</ul>
<pre>
  <?php //print_r($contact); ?>
</pre>

  </section>



@endsection
