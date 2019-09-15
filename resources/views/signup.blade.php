@extends('layouts.main')

@section('title', 'Handle Inbound App Pricing')
@section('content')


  <section class="row">

    <div class="col-md-5 signup-head">
      <h1>We are currently developing this project and are accepting a limited number of companies to work with us.</h1>
      <h3>To apply to be one of the companies to help us develop this product fill out the form.</h3>
    </div>
    <div class="col-md-7">

      <form>


        <div class="row">
          <div class="col">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" placeholder="Last name">
          </div>
        </div>
        <div class="form-group">
           <label for="exampleInputEmail1">Email address</label>
           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
         </div>



          <input type="text" class="d-none" name="plan" value="none">


        <button type="submit" class="btn btn-primary">Sign up</button>
      </form>


    </div>




  </section>



<section>
  <div class="">
    <div class="col-12">
      <img src="/imgs/svg/undraw_subscriber_vabu.svg" class="img-fluid" alt="...">
    </div>
  </div>

</section>


@endsection
