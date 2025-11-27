<header>
    <div class="header-area">
        <div class="main-header">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li><i class="fas fa-user-graduate"></i> Siswa Panel</li>
                                    <li><i class="fas fa-calendar-alt"></i> {{ date('l, jS F, Y') }}</li>
                                </ul>
                            </div>
                            <div class="header-info-right d-flex align-items-center">
                                <span class="text-white me-3">Welcome, {{ auth()->user()->nama }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">    
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('siswa.dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('siswa.articles.create') }}">Write Article</a></li>
                                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>