<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    @if(isset($profilSekolah) && $profilSekolah->logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $profilSekolah->logo) }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    @endif
    <title>{{ $profilSekolah->nama_sekolah ?? 'Website Sekolah' }} | @yield('title')</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/libs/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
    @stack('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- Main wrapper -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <!-- Topbar header -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>

                    <!-- Logo -->
                    <div class="navbar-brand">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-decoration-none">
                            @if ($profilSekolah && $profilSekolah->logo)
                                <img src="{{ asset('storage/' . $profilSekolah->logo) }}"
                                    alt="{{ $profilSekolah->nama_sekolah ?? 'Logo Sekolah' }}"
                                    width="40" height="40" class="rounded-circle" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="Logo Sekolah"
                                    width="40" height="40" class="rounded-circle" style="object-fit: cover;">
                            @endif

                            <span class="font-weight-bold text-dark"
                                style="font-size: 15px; line-height: 20px; max-width: 150px; margin-left: 5px; white-space: nowrap;">
                                {{ $profilSekolah->nama_sekolah ?? 'SMA Negeri 24 Bandung' }}
                            </span>
                        </a>
                    </div>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1"></ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/images/users/user.png') }}" alt="user" class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{ Auth::user()->name ?? 'Administrator' }}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{ route('admin.profile')}}"><i data-feather="user" class="svg-icon mr-2 ml-1"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i> Account Setting</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left Sidebar -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.profil-sekolah.index') }}"
                                class="sidebar-link {{ request()->routeIs('admin.profil-sekolah*') || request()->routeIs('admin.profil*') ? 'active' : '' }}">
                                <i data-feather="briefcase" class="feather-icon"></i>
                                <span class="hide-menu">Profil Sekolah</span>
                            </a>
                        </li>

                        @if(Auth::check() && strcasecmp(Auth::user()->role, 'admin') === 0)
                            <li class="sidebar-item">
                                <a href="{{ route('admin.guru.index') }}"
                                    class="sidebar-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                                    <i data-feather="users" class="feather-icon"></i>
                                    <span class="hide-menu">Kelola Guru</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('admin.siswa.index') }}"
                                    class="sidebar-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                                    <i data-feather="user" class="feather-icon"></i>
                                    <span class="hide-menu">Kelola Siswa</span>
                                </a>
                            </li>
                        @endif

                        <li class="sidebar-item">
                            <a href="{{ route('admin.berita.index') }}"
                                class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                                <i data-feather="file-text" class="feather-icon"></i>
                                <span class="hide-menu">Kelola Berita</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.ekstrakurikuler.index') }}"
                                class="sidebar-link {{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active' : '' }}">
                                <i data-feather="activity" class="feather-icon"></i>
                                <span class="hide-menu">Kelola Ekstrakurikuler</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.galeri.index') }}"
                                class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                                <i data-feather="image" class="feather-icon"></i>
                                <span class="hide-menu">Kelola Galeri</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('admin.prestasi.index') }}"
                                class="sidebar-link {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}">
                                <i data-feather="award" class="feather-icon"></i>
                                <span class="hide-menu">Kelola Prestasi</span>
                            </a>
                        </li>

                        @if(Auth::check() && strcasecmp(Auth::user()->role, 'admin') === 0)
                            <li class="sidebar-item">
                                <a href="{{ route('admin.user.index') }}"
                                    class="sidebar-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                                    <i data-feather="user-check"
                                        class="feather-icon"></i>
                                    <span class="hide-menu">
                                        Kelola User
                                    </span>
                                </a>
                            </li>
                        @endif

                        <li class="sidebar-item">
                            <a href="{{ route('logout')}}" class="sidebar-link">
                                <i data-feather="log-out" class="feather-icon"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Page wrapper -->
         <div class="page-wrapper">
            <div class="container-fluid">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i data-feather="check-circle" class="mr-2"></i>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- 2. Alert Khusus ERROR --}}
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i data-feather="alert-circle" class="mr-2"></i>
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- 3. Alert Validasi Form --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>
                            <i data-feather="alert-triangle" class="mr-2"></i>
                            Terdapat kesalahan pengisian data:
                        </strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @yield('content')
            </div>

    <!-- Footer -->
    <footer class="footer text-center text-muted">
        Copyright &copy; {{ date('Y') }}
                {{ $profilSekolah->nama_sekolah ?? 'Website Sekolah' }} - Media Pembelajaran Siswa SMK
            </footer>
        </div>
    </div>

    <!-- JavaScript Base -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

    @stack('scripts')
    <!-- Dashboard & Chart Scripts -->
    <script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
</body>

</html>
