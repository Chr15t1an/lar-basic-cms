<!doctype html>
<html lang="en">
  <head>

    <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ App\Http\Controllers\MetavalueController::get_metadata('gtm') }}');</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <title>@yield('title') | {{ Config::get('app.name')}}</title>
    <meta name="description" content="@yield('metadescription')">


  </head>
<body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5PBLZD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Navbar -->
<nav id="mainnav" class="col-lg-8 navbar navbar-expand-lg navbar-light offset-lg-2">
<a class="navbar-brand d-flex navbar-brand" href="/">
    <!-- icon -->
    <i class="material-icons">
  chat_bubble_outline
</i><h6>{{ Config::get('app.name')}}</h6>

    <!-- icon -->
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pricing">Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signup">Sign up</a>
    </li>


  </ul>

<ul class="navbar-nav">



    @guest
    <li class="nav-item">
    <a class="nav-link" href="login"><button type="button" class="btn btn-outline-dark">Log in</button></a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
    @else

    <li class="nav-item">
      <a class="nav-link" href="/admin">Admin</a>
    </li>

    <li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

      </li>



    @endguest


</ul>

</div>
</nav>
<!-- End Navbar -->


<!-- main conten block -->
<div id="app" class="main col-lg-8 offset-lg-2">




 @yield('content')


   <footer class="col-lg-8 offset-lg-2">
     <hr/>
   <nav class="navbar navbar-expand-lg navbar-light">
     <a class="navbar-brand" href="/">
         <!-- icon -->
         <i class="material-icons">
       chat_bubble_outline
       </i>
         <!-- icon -->
     </a>
       <ul class="navbar-nav">
         <li class="nav-item active">
           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="pricing">Pricing</a>
         </li>
       </ul>
       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link" href="signup">Sign up</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="login">Log in</a>
         </li>
       </ul>
       <ul class="navbar-nav">

         <li class="nav-item">
           <a class="nav-link" href="privacy-policy">Privacy Policy</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="terms-&-conditions">Terms & Conditions</a>
         </li>
       </ul>
         <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link" data-toggle="modal" data-target="#contactModal">Contact</a>
         </li>
       </ul>
     </nav>
   </footer>

<contact-component></contact-component>
</div>
  <!-- end main conten block -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="/js/app.js"></script>

    </body>
  </html>
