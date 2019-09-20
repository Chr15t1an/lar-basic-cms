<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Google Tag Manager -->
<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W5PBLZD');</script> -->
<!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5PBLZD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->

    <div id="app">
      <!doctype html>
      <html lang="en">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <meta name="csrf-token" content="{{ csrf_token() }}">

          <!-- Fonts -->
          <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Comfortaa|Roboto&display=swap" rel="stylesheet"> -->
          <!-- <link href="https://fonts.googleapis.com/css?family=Comfortaa|Roboto&display=swap" rel="stylesheet"> -->
          <!-- Bootstrap CSS -->
          <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       -->

          <!-- Styles -->
          <link href="css/app.css" rel="stylesheet">

          <title>@yield('title') | Handle Inbound App</title>
        </head>
      <body>
      <!-- Navbar -->
      <nav id="mainnav" class="col-lg-8 navbar navbar-expand-lg navbar-light offset-lg-2">
      <a class="navbar-brand d-flex navbar-brand" href="/">
          <!-- icon -->
          <i class="material-icons">
        chat_bubble_outline
      </i><h6>Handle Inbound</h6>

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
        <li class="nav-item">
          <a class="nav-link" href="login"><button type="button" class="btn btn-outline-dark">Log in</button>
      </a>
        </li>
      </ul>

      </div>
      </nav>
      <!-- End Navbar -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
