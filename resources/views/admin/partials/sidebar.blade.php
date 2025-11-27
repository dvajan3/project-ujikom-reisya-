<div class="sidebar text-white p-3" style="width: 250px;">
    <h4 class="mb-4">Admin Panel</h4>
    <nav>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.articles') }}">
                    <i class="fas fa-newspaper me-2"></i> Articles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.categories') }}">
                    <i class="fas fa-tags me-2"></i> Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.users') }}">
                    <i class="fas fa-users me-2"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('home') }}" target="_blank">
                    <i class="fas fa-eye me-2"></i> View Site
                </a>
            </li>
        </ul>
    </nav>
</div>