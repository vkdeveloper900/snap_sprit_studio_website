<header class="admin-header">
    <div class="header-content">
        <h1 class="page-title">@yield('title')</h1>

        <div class="header-right">
            <div class="user-menu">
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
