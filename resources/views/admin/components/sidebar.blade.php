<aside class="admin-sidebar">
    <div class="sidebar-header">
        <h2>snap sprit studio</h2>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link @if(Route::currentRouteName() === 'admin.dashboard') active @endif">Dashboard</a></li>
            <li><a href="{{ route('admin.portfolio.index') }}" class="nav-link @if(Route::currentRouteName() === 'admin.portfolio.index') active @endif">Project Categories</a></li>
            <li><a href="{{ route('admin.services.index') }}" class="nav-link @if(Route::currentRouteName() === 'admin.services.index') active @endif">Projects</a></li>
            <li><a href="{{ route('admin.team.index') }}" class="nav-link @if(Route::currentRouteName() === 'admin.team.index') active @endif">Experience</a></li>
            <li><a href="{{ route('admin.enquiries.index') }}" class="nav-link @if(Route::currentRouteName() === 'admin.enquiries.index') active @endif">Contact Us / Leads</a></li>
            <li><a href="{{ route('admin.settings.edit') }}" class="nav-link @if(Route::currentRouteName() === 'admin.settings.edit') active @endif">Profile</a></li>
        </ul>
    </nav>
</aside>
