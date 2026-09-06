<header class="admin-header">
    <button class="hamburger-menu" id="sidebar-toggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="header-brand"></div>

    <div class="header-right">
        <div class="user-profile">
            <div class="user-avatar">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</div>
            <div class="user-info">
                <span class="user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
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
</script>
