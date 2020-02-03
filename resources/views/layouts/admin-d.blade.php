<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="/css/admin/admin.css" rel="stylesheet">

<!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>@yield('title')</title>
  </head>
<body>

  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
      <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="/">
          <img src="https://via.placeholder.com/150" class="navbar-brand-img" alt="">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
          <li class="nav-item dropdown">
            <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-bell-55"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg
  ">
                </span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="./index.html">
                  <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item  active ">
              <a class="nav-link  active " href="/admin">
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-tv-2 text-primary"></i>Contacts</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="nav-link" href="/admin/leads">
                    <i class="ni ni-tv-2 text-primary"></i>Leads
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="nav-link" href="/admin/contacts">
                    <i class="ni ni-tv-2 text-primary"></i>Messages
                  </a>
                </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/admin/files">
                <i class="ni ni-planet text-blue"></i>Files
              </a>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-tv-2 text-primary"></i>Posts</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="nav-link" href="/admin/posts">
                    <i class="ni ni-tv-2 text-primary"></i>Edit
                  </a>
                  <div class="dropdown-divider"></div>

                  <a class="nav-link" href="/admin/categories">
                    <i class="ni ni-tv-2 text-primary"></i>Categories
                  </a>
                    <div class="dropdown-divider"></div>

                  <a class="nav-link" href="/admin/tags">
                    <i class="ni ni-tv-2 text-primary"></i>Tags
                  </a>
                </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/admin/settings">
                <i class="ni ni-single-02 text-yellow"></i>Settings
              </a>
            </li>
          </ul>

        </div>
      </div>
    </nav>


<!-- End Navbar -->
<!-- main conten block -->
<!-- <div id="app" class="main col-lg-8 offset-lg-3"> -->
<div id="app" class="main-content">
  <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
      
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="./assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
          <div class="container-fluid">
            <div class="header-body">
            </div>
          </div>
        </div>

        <div class="container-fluid mt--7">
              <div class="row">
 @yield('content')
              </div>

        </div>
</div>
  <!-- end main conten block -->
  <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="/js/app.js"></script>

      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
      <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>



      <script type="text/javascript">

      </script>
    </body>
  </html>
