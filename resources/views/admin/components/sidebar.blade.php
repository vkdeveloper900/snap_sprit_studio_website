<aside class="admin-sidebar">
    <div class="sidebar-header">
        <h2>snap sprit studio</h2>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link @if(Route::currentRouteName() === 'admin.dashboard') active @endif">Dashboard</a></li>
            <li><a href="{{ route('admin.portfolio.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.portfolio.')) active @endif">Project Categories</a></li>
            <li><a href="{{ route('admin.services.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.services.')) active @endif">Projects</a></li>
            <li><a href="{{ route('admin.team.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.team.')) active @endif">Team</a></li>
            <li><a href="{{ route('admin.clients.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.clients.')) active @endif">Clients</a></li>
            <li><a href="{{ route('admin.testimonials.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.testimonials.')) active @endif">Testimonials</a></li>
            <li><a href="{{ route('admin.highlights.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.highlights.')) active @endif">Highlights</a></li>
            <li><a href="{{ route('admin.enquiries.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.enquiries.')) active @endif">Contact Us / Leads</a></li>
            <li><a href="{{ route('admin.faqs.index') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.faqs.')) active @endif">FAQs</a></li>
            <li><a href="{{ route('admin.settings.edit') }}" class="nav-link @if(\Str::startsWith(Route::currentRouteName(), 'admin.settings.')) active @endif">Company Settings</a></li>
        </ul>
    </nav>
</aside>
