  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
          <img src="{{ asset('dist/img/umk.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Inventory</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item menu-open">

                  <li class="nav-item">
                      <a href="/" class="nav-link active">
                          <i class="fas fa-tachometer-alt nav-icon"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Data Master
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('kategori.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kategori Produk</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('supplier.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Supplier</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('produk.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Produk</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('produk_masuk.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Produk Masuk

                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('produk_keluar.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Produk Keluar
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('user.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Kelola User
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
