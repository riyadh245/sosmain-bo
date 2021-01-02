
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Sosmain | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('img/sosmain.png')}}" alt="SosMain Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SosMain</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                <a href="{{ route('admin.dashboard')}}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link active">
                  <i class="fas fa-tasks"></i>
                  <p>
                    Gestion des Utilisateurs
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('admin.management.user')}}" class="nav-link">
                      <i class="fas fa-users"></i>
                      <p>
                        Gestion des Users

                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.management.expert')}}" class="nav-link">
                      <i class="fas fa-user-md"></i>
                      <p>
                        Gestion des Experts

                      </p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.management.center')}}" class="nav-link">
                <i class="fas fa-hospital"></i>
                    <p>
                   Gestion des centres
                    </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-digital-tachograph"></i>
                    <p>
                   Gestion donn�es patients
                    </p>
                </a>
              </li>

          <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-power-off red"></i>
                <p> {{ __('Logout') }}</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </li>
        </ul>
      </nav>

    </div>
  </aside>

  <div class="content-wrapper">

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <p>Gestion des Experts</p>
    </div>
  </aside>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    <!--  Anything you want -->
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">SOSMAIN</a>.</strong> Tous droits reservés.
  </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
