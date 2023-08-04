 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <li class="dropdown"><a href="#" data-toggle="dropdown"
                 class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                 <img class="rounded-circle header-profile-user" style="height: 30px"
                     src="{{ Auth::user()->foto == null ? asset('dist/img/avatar-1.png') : Storage::url(Auth::user()->foto) }}">
                 <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
             </a>
             <div class="dropdown-menu dropdown-menu-right">
                 <a href="" class="dropdown-item has-icon">
                     <i class="far fa-user"></i> Profile
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal"
                     data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt"></i> Logout
                 </a>
             </div>
         </li>
     </ul>
 </nav>
