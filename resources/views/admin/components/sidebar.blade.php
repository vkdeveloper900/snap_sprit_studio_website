<aside class="admin-sidebar">
    <div class="sidebar-header">
        <h2>Admin Panel</h2>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.portfolio.index') }}">Portfolio</a></li>
            <li><a href="{{ route('admin.services.index') }}">Services</a></li>
            <li><a href="{{ route('admin.team.index') }}">Team</a></li>
            <li><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
            <li><a href="{{ route('admin.enquiries.index') }}">Enquiries</a></li>
            <li><a href="{{ route('admin.faqs.index') }}">FAQs</a></li>
            <li><a href="{{ route('admin.media.index') }}">Media</a></li>
            <li><a href="{{ route('admin.settings.edit') }}">Settings</a></li>
        </ul>
    </nav>
</aside>
