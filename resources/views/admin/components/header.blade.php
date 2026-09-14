<header class="admin-header">
    <button class="hamburger-menu" id="sidebar-toggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="header-brand"></div>

    <div class="header-right">
        <div class="user-profile-dropdown">
            <button class="user-profile-btn" id="userDropdownToggle">
                <div class="user-avatar">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</div>
                <span class="user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                <svg class="dropdown-arrow" width="12" height="8" viewBox="0 0 12 8" fill="none">
                    <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="user-dropdown-menu" id="userDropdownMenu">
                <a href="#" class="dropdown-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <circle cx="8" cy="5" r="3" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M2 14c0-2.2 2.7-4 6-4s6 1.8 6 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    <span>My Profile</span>
                </a>
                <form method="POST" action="{{ route('admin.logout') }}" class="dropdown-form">
                    @csrf
                    <button type="submit" class="dropdown-item logout-item">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10 3H13C13.5 3 14 3.5 14 4V12C14 12.5 13.5 13 13 13H10M9 9L12 6M9 9L12 12M9 9H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('sidebar-toggle').addEventListener('click', function() {
        document.querySelector('.admin-sidebar').classList.toggle('active');
    });

    // Close sidebar when clicking on a link
    document.querySelectorAll('.sidebar-nav a').forEach(link => {
        link.addEventListener('click', function() {
            document.querySelector('.admin-sidebar').classList.remove('active');
        });
    });

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(e) {
        const sidebar = document.querySelector('.admin-sidebar');
        const toggle = document.getElementById('sidebar-toggle');
        if (window.innerWidth <= 768 && !sidebar.contains(e.target) && !toggle.contains(e.target)) {
            sidebar.classList.remove('active');
        }
    });

    // User dropdown menu
    const userDropdownToggle = document.getElementById('userDropdownToggle');
    const userDropdownMenu = document.getElementById('userDropdownMenu');

    userDropdownToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        userDropdownMenu.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-profile-dropdown')) {
            userDropdownMenu.classList.remove('active');
        }
    });
</script>
