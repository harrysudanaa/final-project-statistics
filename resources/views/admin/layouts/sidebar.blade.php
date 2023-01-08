  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('images/logo-cs.png') }}" alt="Ilkom Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN STATISTIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/profile-photo.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.index') }}" class="d-block">Harry Sudana</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.data_tunggal.index') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Tunggal
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.deskripsi_data.index') }}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Deskripsi Data
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.frekuensi_data.index') }}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Frekuensi Data
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
