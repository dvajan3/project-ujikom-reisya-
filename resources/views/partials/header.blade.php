<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header">
            <div class="header-top d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul class="d-flex align-items-center mb-0">     
                                    <li class="me-4"><i class="fas fa-thermometer-half me-2"></i> 24ºc, Sunny </li>
                                    <li><i class="fas fa-calendar-alt me-2"></i> <span id="current-date"></span></li>
                                </ul>
                            </div>
                            <div class="header-info-right d-flex align-items-center">
                                <div class="header-contact me-4">
                                    <span class="text-white"><i class="fas fa-envelope me-2"></i> info@reisyamajalah.com</span>
                                </div>
                                <ul class="header-social d-flex mb-0">    
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="YouTube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block py-4">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Reisya Majalah" class="img-fluid" style="max-height: 60px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="header-banner text-center">
                                <h2 class="text-gradient mb-0" style="font-weight: 800; font-size: 32px;">REISYA MAJALAH</h2>
                                <p class="mb-0" style="color: var(--gray-600); font-size: 14px; letter-spacing: 2px;">DIGITAL MAGAZINE PLATFORM</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="header-search text-end">
                                <form class="search-form d-flex" action="{{ route('search') }}" method="GET">
                                    <input type="text" name="q" placeholder="Cari artikel..." class="form-control me-2" style="border-radius: 25px; border: 2px solid var(--gray-200);" value="{{ request('q') }}"
                                    <button type="submit" class="btn btn-primary" style="border-radius: 25px; padding: 8px 20px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky" style="background: var(--gradient-primary); box-shadow: var(--shadow-md);">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-9 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation" class="d-flex align-items-center mb-0">    
                                        @if(request()->is('admin*') && auth()->check() && auth()->user()->isAdmin())
                                            <li><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                            <li><a href="{{ route('admin.articles') }}" class="nav-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}"><i class="fas fa-newspaper me-2"></i>Artikel</a></li>
                                            <li><a href="{{ route('admin.categories') }}" class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}"><i class="fas fa-tags me-2"></i>Kategori</a></li>
                                            <li><a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}"><i class="fas fa-users me-2"></i>Pengguna</a></li>
                                            <li><a href="{{ route('admin.contacts') }}" class="nav-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}"><i class="fas fa-envelope me-2"></i>Kontak</a></li>
                                            <li><a href="{{ route('home') }}" class="nav-link"><i class="fas fa-globe me-2"></i>Situs Web</a></li>
                                        @else
                                            <li><a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home me-2"></i>Home</a></li>
                                            <li><a href="{{ route('category') }}" class="nav-link"><i class="fas fa-th-large me-2"></i>Kategori</a></li>
                                            <li><a href="{{ route('about') }}" class="nav-link"><i class="fas fa-info-circle me-2"></i>Tentang</a></li>
                                            <li><a href="{{ route('latest') }}" class="nav-link"><i class="fas fa-newspaper me-2"></i>Terbaru</a></li>
                                            <li><a href="{{ route('blog') }}" class="nav-link"><i class="fas fa-blog me-2"></i>Blog</a></li>
                                            <li><a href="{{ route('contact') }}" class="nav-link"><i class="fas fa-envelope me-2"></i>Kontak</a></li>
                                            @auth
                                                @if(auth()->user()->isAdmin())
                                                    <li><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                                @elseif(auth()->user()->isSiswa())
                                                    <li><a href="{{ route('siswa.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                                @elseif(auth()->user()->isGuru())
                                                    <li><a href="{{ route('guru.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
                                                @endif
                                                <li><a href="{{ route('profile.show') }}" class="nav-link"><i class="fas fa-user me-2"></i>Profil</a></li>
                                            @endauth
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4">
                            <div class="header-auth d-flex align-items-center justify-content-end">
                                @auth
                                    <a href="{{ route('profile.show') }}" class="btn btn-outline-primary d-flex align-items-center user-profile-link" title="Go to Profile">
                                        <i class="fas fa-user-circle me-2"></i>
                                        <span class="d-none d-lg-inline">{{ Str::limit(auth()->user()->nama, 15) }}</span>
                                        @if(auth()->user()->isAdmin())
                                            <span class="role-icon ms-2" title="Admin">
                                                <i class="fas fa-crown text-warning"></i>
                                            </span>
                                        @elseif(auth()->user()->isGuru())
                                            <span class="role-icon ms-2" title="Guru">
                                                <i class="fas fa-chalkboard-teacher text-info"></i>
                                            </span>
                                        @elseif(auth()->user()->isSiswa())
                                            <span class="role-icon ms-2" title="Siswa">
                                                <i class="fas fa-graduation-cap text-success"></i>
                                            </span>
                                        @else
                                            <span class="role-icon ms-2" title="User">
                                                <i class="fas fa-user text-primary"></i>
                                            </span>
                                        @endif
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                                        <i class="fas fa-user-plus me-2"></i>Masuk
                                    </a>
                                    <a href="{{ route('register') }}" class="btn btn-primary">
                                        <i class="fas fa-user-plus me-2"></i>Daftar
                                    </a>
                                @endauth
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>