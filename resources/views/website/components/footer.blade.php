<footer>
    <div class="footer-container">
        <div class="footer-brand">
            <h3>{{ strtoupper($company['company_name'] ?? 'SNAP SPIRIT STUDIO') }}</h3>
            @if(!empty($company['tagline']))
                <p>{{ $company['tagline'] }}</p>
            @endif
            @if(!empty($company['about_short']))
                <p style="font-size: 0.95rem; margin-top: 1rem; opacity: 0.85;">{{ $company['about_short'] }}</p>
            @endif
        </div>

        <div class="footer-section">
            <h4>NAVIGATION</h4>
            <ul>
                <li><a href="{{ route('portfolio') }}">Work</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('team') }}">Team</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>LEGAL</h4>
            <ul>
                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>FOLLOW US</h4>
            <ul class="footer-socials">
                @if(!empty($company['instagram_url']))
                    <li><a href="{{ $company['instagram_url'] }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a></li>
                @endif
                @if(!empty($company['facebook_url']))
                    <li><a href="{{ $company['facebook_url'] }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a></li>
                @endif
                @if(!empty($company['youtube_url']))
                    <li><a href="{{ $company['youtube_url'] }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube"></i></a></li>
                @endif
                @if(!empty($company['linkedin_url']))
                    <li><a href="{{ $company['linkedin_url'] }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a></li>
                @endif
                @if(!empty($company['twitter_url']))
                    <li><a href="{{ $company['twitter_url'] }}" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a></li>
                @endif
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div>{{ $company['copyright_text'] ?? ('© ' . date('Y') . ' Snap Spirit Studio. All Rights Reserved.') }}</div>
        @if(!empty($company['developer_name']))
            <div>
                Developed by
                @if(!empty($company['developer_url']))
                    <a href="{{ $company['developer_url'] }}" target="_blank" rel="noopener noreferrer" style="color: var(--color-champagne); text-decoration: none; font-weight: 500;">{{ $company['developer_name'] }}</a>
                @else
                    <span style="color: var(--color-champagne); font-weight: 500;">{{ $company['developer_name'] }}</span>
                @endif
            </div>
        @endif
        @if(!empty($company['location_short']))
            <div>{{ $company['location_short'] }}</div>
        @endif
    </div>
</footer>
