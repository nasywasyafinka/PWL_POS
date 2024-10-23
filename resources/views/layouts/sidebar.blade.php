<div class="sidebar">
    <style>
        .sidebar {
            background-color: #003c5b; /* Navy blue background */
            color: #ffffff; /* White text for contrast */
            height: 100vh; /* Full height */
            padding: 20px; /* Padding around sidebar */
            font-family: 'Georgia', serif; /* Elegant font */
        }

        .sidebar .user-panel {
            border-bottom: 2px solid #d5a65d; /* Gold divider line */
            padding-bottom: 10px; /* Padding below user panel */
        }

        .sidebar .user-panel .image img {
            border-radius: 50%; /* Circular image */
            width: 60px; /* Width of the image */
            height: 60px; /* Height of the image */
        }

        .sidebar .info a {
            color: #d5a65d; /* Gold link color */
            font-weight: bold; /* Bold font */
            text-decoration: none; /* Remove underline */
            font-size: 1.1rem; /* Slightly larger font */
        }

        .sidebar .form-inline {
            margin-top: 20px; /* Margin above search form */
        }

        .sidebar .nav-link {
            color: #f8f9fa; /* Light text for links */
            transition: background-color 0.3s; /* Smooth background color transition */
        }

        .sidebar .nav-link:hover {
            color: #d5a65d; /* Gold link color on hover */
            background-color: #004e7c; /* Darker navy on hover */
        }

        .sidebar .nav-link.active {
            color: #ffffff; /* Active link color */
            background-color: #d5a65d; /* Gold background for active link */
            border-radius: 4px; /* Rounded corners */
        }

        .sidebar .nav-header {
            color: #d5a65d; /* Gold for headers */
            font-size: 0.9rem; /* Slightly smaller font size */
            text-transform: uppercase; /* Uppercase letters */
            margin-top: 15px; /* Margin above header */
            margin-bottom: 5px; /* Margin below header */
        }
    </style>

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img @if (file_exists(public_path(
                        'storage/uploads/profile_pictures/' .
                            auth()->user()->username .
                            '/' .
                            auth()->user()->username .
                            '_profile.png'))) src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.png') }}" @endif
                @if (file_exists(public_path(
                            'storage/uploads/profile_pictures/' .
                                auth()->user()->username .
                                '/' .
                                auth()->user()->username .
                                '_profile.jpg'))) src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.jpg') }}" @endif
                @if (file_exists(public_path(
                            'storage/uploads/profile_pictures/' .
                                auth()->user()->username .
                                '/' .
                                auth()->user()->username .
                                '_profile.jpeg'))) src="{{ asset('storage/uploads/profile_pictures/' . auth()->user()->username . '/' . auth()->user()->username . '_profile.jpeg') }}" @endif
                class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/profile') }}" class="d-block">{{ auth()->user()->username }}</a>
        </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
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
                <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>Data Barang</p>
                </a>
            </li>
            <li class="nav-header">Data Transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link {{ $activeMenu == 'stok' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Stok Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/transaksi') }}" class="nav-link {{ $activeMenu == 'penjualan' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Transaksi Penjualan</p>
                </a>
            </li>
            <li class="nav-header">Data Supplier</li>
            <li class="nav-item">
                <a href="{{ url('/supplier') }}" class="nav-link {{ $activeMenu == 'supplier' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data Supplier</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
