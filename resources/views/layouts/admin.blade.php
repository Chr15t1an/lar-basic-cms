<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <title>@yield('title')</title>
  </head>
<body>
<!-- Navbar -->
<nav id="mainnav" class="col-lg-8 navbar navbar-expand-lg navbar-light offset-lg-2">
<a class="navbar-brand d-flex navbar-brand" href="/admin/">
    <!-- icon -->
  Admin
    <!-- icon -->
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">

    <li class="nav-item">
      <a class="nav-link" href="/admin/contacts">Messages</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/leads">Leads</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/settings">Website Settings</a>

          <a class="dropdown-item" href="/admin/settings/seo">SEO</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/apiKeys">Api Keys</a>
        </div>
    </li>
<li class="nav-item">|</li>
    <li class="nav-item active">
      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
  </ul>
</div>
</nav>
<!-- End Navbar -->
<!-- main conten block -->
<div id="app" class="main col-lg-8 offset-lg-2">
 @yield('content')
</div>
  <!-- end main conten block -->
  <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="/js/app.js"></script>
    </body>
  </html>
