<nav class="navbar">
    <div class="navbar-container">
        <a href="{{ route('home') }}" class="navbar-logo">SNAP SPIRIT STUDIO</a>

        <button class="mobile-toggle">
            <i class="bi bi-list"></i>
        </button>

        <ul class="navbar-menu">
            <li><a href="{{ route('about') }}">ABOUT</a></li>
            <li><a href="{{ route('services') }}">SERVICES</a></li>
            <li><a href="{{ route('portfolio') }}">WORK</a></li>
            <li><a href="{{ route('team') }}">TEAM</a></li>
            <li><a href="{{ route('contact') }}">CONTACT</a></li>
            <li class="navbar-cta">
                <a href="{{ route('contact') }}" class="btn btn-outline btn-small">ENQUIRY NOW</a>
            </li>
        </ul>
    </div>
</nav>