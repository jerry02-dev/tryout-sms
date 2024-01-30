<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  @if (Auth::check()) 
      <meta name="user" content="{{ Auth::user()->id }}">
    @endif 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 3 | Starter</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
      </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-image img-circle elevation-3 mt-1"> <i class="fa fa-eye"></i></span>
      <!-- <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" class="me-2" height="20"
        alt="MDB Logo" loading="lazy" /> -->
      <span class="brand-text font-weight-light">TRYOUT SMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
              {{ Auth::user()->name }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <!-- <li class="nav-item">
        <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer"></i>
                <p>
                Dashboard
                </p>
            </router-link>
        </li> -->

        <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Users</p>
                </router-link>
              </li>
          <li class="nav-item">
        <router-link to="/events" class="nav-link">
            <i class="nav-icon fas fa-calendar"></i>
            <p>
            Events
            </p>
        </router-link>
        </li>
        <li class="nav-item">
        <router-link to="/courses" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
            Courses
            </p>
        </router-link>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="nav-icon fa fa-power-off"></i>
                <p>
                  {{ __('Logout') }}
                </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <router-view></router-view>
  </div><!-- /.container-fluid -->
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
     SMS
    </div>
    <!-- Default to the left -->
    <strong>SMS TRYOUT</strong>
  </footer>
</div>
    <script src="/js/app.js"></script>

</body>
</html>