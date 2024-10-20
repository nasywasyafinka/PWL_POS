<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PWL - Starter Code</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Data Pengguna</li>
                <li class="nav-item">
                    <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Level User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-header">Data Barang</li>
                <li class="nav-item">
                    <a href="{{ url('/kategori') }}" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-bookmark"></i>
                        <p>Kategori Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/supplier') }}" class="nav-link {{ $activeMenu == 'supplier' ? 'active' : '' }} ">
                        <i class="nav-icon far fa-building"></i>
                        <p>Supplier Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} ">
                        <i class="nav-icon fa fa-ship"></i>
                        <p>Data Barang</p>
                    </a>
                </li>
                <li class="nav-header">Data Transaksi</li>
                <li class="nav-item">
                    <a href="{{ url('/stok') }}"
                        class="nav-link {{ $activeMenu == 'stok' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Stok Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/barang') }}"
                        class="nav-link {{ $activeMenu == 'penjualan' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Transaksi Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ url('/logout') }}" method="POST" id="logout-form" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="border: none; background: none; padding: 5px 10px; color: white; text-align: left;">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p style="margin: 0;">Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
  </aside>