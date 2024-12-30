<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Page')</title>

  <!-- Include CSS -->
  <link rel="stylesheet" href="{{ asset('/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/adminlte.min.css') }}">
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
  </nav>
  
  <!-- /.navbar -->
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <h1 class="display-6" style="font-weight: 500; color: #ffffff;">LERO</h1>
    </a>
    <div class="sidebar">
      <!-- Sidebar user -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info d-flex justify-content-between w-100">
          <!-- Menampilkan nama pengguna yang login -->
          @auth('admin')
              <!-- Konten yang hanya boleh diakses oleh admin -->
              <a class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
          @else
              <script>
                  window.location.href = "{{ route('admin.login-admin') }}"; // Arahkan ke halaman login
              </script>
          @endauth
      
          <!-- Tombol Logout -->
          <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Tables
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('table1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('table2') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comment</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.contact') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Contact</p>
          </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <h1>@yield('header', 'Admin Page')</h1>
      </div>
    </section>

    <section class="content">
      <!-- Cek login sebelum menampilkan konten -->
      @auth('admin')
        <div class="row">
          <div class="col-12">
            @yield('content')
          </div>
        </div>
      @else
        <!-- Jika pengguna belum login, arahkan ke halaman login -->
        <script>
          window.location.href = "{{ route('admin.login-admin') }}";
        </script>
      @endauth
    </section>
  </div>
  <!-- /.content-wrapper -->
</div>

<!-- Include JS -->
<script src="{{ asset('/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
