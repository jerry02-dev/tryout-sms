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
                <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 256 256"><path fill="currentColor" d="M164.47 195.63a8 8 0 0 1-6.7 12.37H10.23a8 8 0 0 1-6.7-12.37a95.83 95.83 0 0 1 47.22-37.71a60 60 0 1 1 66.5 0a95.83 95.83 0 0 1 47.22 37.71m87.91-.15a95.87 95.87 0 0 0-47.13-37.56A60 60 0 0 0 144.7 54.59a4 4 0 0 0-1.33 6a75.83 75.83 0 0 1 3.63 89.94a4 4 0 0 0 1.07 5.53a112.32 112.32 0 0 1 29.85 30.83a23.92 23.92 0 0 1 3.65 16.47a4 4 0 0 0 3.95 4.64h60.3a8 8 0 0 0 7.73-5.93a8.22 8.22 0 0 0-1.17-6.59"/></svg>&nbsp;
                  <p>Users</p>
                </router-link>
              </li>
          <li class="nav-item">
        <router-link to="/events" class="nav-link">
        <svg class="text-warning" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="M21 17V8H7v9zm0-14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h1V1h2v2h8V1h2v2zM3 21h14v2H3a2 2 0 0 1-2-2V9h2zm16-6h-4v-4h4z"/></svg>&nbsp;
            <p>
            Events
            </p>
        </router-link>
        </li>
        <li class="nav-item">
        <router-link to="/courses" class="nav-link">
        <svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048"><path fill="currentColor" d="M1760 1590q66 33 119 81t90 107t58 128t21 142h-128q0-79-30-149t-82-122t-123-83t-149-30q-80 0-149 30t-122 82t-83 123t-30 149h-128q0-73 20-142t58-128t91-107t119-81q-75-54-117-135t-43-175q0-79 30-149t82-122t122-83t150-30q79 0 149 30t122 82t83 123t30 149q0 94-42 175t-118 135m-224-54q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m-512 80q-32 37-58 77t-46 86q-53-55-128-85t-152-30H256V384H128v1408h787q-14 31-23 63t-15 65H0V256h256V128h384q88 0 169 27t151 81q69-54 150-81t170-27h384v128h256v640q-58-57-128-95V384h-128v369q-32-9-64-13t-64-4V256h-256q-70 0-136 24t-120 71zm-128-13V351q-54-46-120-70t-136-25H384v1280h256q67 0 132 17t124 50"/></svg> &nbsp;
            <p>
            Courses
            </p>
        </router-link>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
              <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"><path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z"/></svg>&nbsp;
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