<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="stylesheet" href="{{asset('/css/app.css')}}">

  <script src="https://use.fontawesome.com/56a59804e3.js"></script>

  <!-- CKEDITOR -->
   <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> 
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
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
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{asset('/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('/img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>      
          <div class="info">    
            <a href="{{url('/users/user/edit/'.Auth::user()->id)}}" class="d-block">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>           
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview">
                       <a href="{{url('/home')}}" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <i class="fa fa-home" aria-hidden="true"></i>
                           <p>
                               Home
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                 </li>                 

                  <li class="nav-item has-treeview">
                       <a href="{{url('/news')}}" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <i class="fa fa-buysellads" aria-hidden="true"></i>
                           <p>
                               News
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                 </li>

                 <li class="nav-item has-treeview">
                       <a href="{{url('/comentaries')}}" class="nav-link">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <i class="fa fa-check-circle" aria-hidden="true"></i>
                           <p>
                               Comentaries
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                 </li>
                
              </ul>
            </li>
            
           </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    

      <!-- Main content -->
      <div class="content">
         <main class="py-4">
                @yield('content')
          </main>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{asset('/js/app.js')}}"></script>
  
</body>

</html>