@extends('website.layouts.app')

@section('title', 'Portfolio')

@section('content')
    <!-- PAGE HERO -->
    <section class="hero" id="hero" style="min-height: 50vh; height: auto; padding: 8rem 2rem;">
        <div class="hero-content">
            <p class="hero-subtitle">Our Portfolio</p>
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem;">Stories We've<br>Captured.</h1>
            <p class="hero-description">A collection of our best work across weddings, events, commercial, and creative projects.</p>
        </div>
    </section>

    <!-- PORTFOLIO SECTION -->
    <section class="featured-work" style="padding: var(--spacing-3xl) var(--spacing-xl);">
        <div class="container-max">
            <div class="work-grid" style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));">
                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80" alt="Wedding Photography">
                    <div class="work-overlay">
                        <span class="work-category">WEDDING</span>
                        <h3 class="work-title">The Grand Celebration</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1511285541135-f46ad50edbc1?w=600&q=80" alt="Pre-Wedding Shoot">
                    <div class="work-overlay">
                        <span class="work-category">PRE-WEDDING</span>
                        <h3 class="work-title">Love in Motion</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1533900298318-6b8da08a523e?w=600&q=80" alt="Corporate Photography">
                    <div class="work-overlay">
                        <span class="work-category">COMMERCIAL</span>
                        <h3 class="work-title">Brand Identity Campaign</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&q=80" alt="Fashion Photography">
                    <div class="work-overlay">
                        <span class="work-category">FASHION</span>
                        <h3 class="work-title">Editorial Moments</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1585147394579-a44c8f35ec51?w=600&q=80" alt="Event Photography">
                    <div class="work-overlay">
                        <span class="work-category">EVENTS</span>
                        <h3 class="work-title">Moments That Matter</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80" alt="Architecture Photography">
                    <div class="work-overlay">
                        <span class="work-category">ARCHITECTURE</span>
                        <h3 class="work-title">Spaces & Design</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&q=80" alt="Wedding Ceremony">
                    <div class="work-overlay">
                        <span class="work-category">WEDDING</span>
                        <h3 class="work-title">Vows & Tears</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80" alt="Brand Photography">
                    <div class="work-overlay">
                        <span class="work-category">COMMERCIAL</span>
                        <h3 class="work-title">Product Shoot</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80" alt="Concert Event">
                    <div class="work-overlay">
                        <span class="work-category">EVENT</span>
                        <h3 class="work-title">Live Performance</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1500152876223-1a67cd9e91a4?w=600&q=80" alt="Fashion Model">
                    <div class="work-overlay">
                        <span class="work-category">FASHION</span>
                        <h3 class="work-title">Model Portfolio</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1518895949257-7621c3c786d7?w=600&q=80" alt="Couple Shoot">
                    <div class="work-overlay">
                        <span class="work-category">PRE-WEDDING</span>
                        <h3 class="work-title">Love Story</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>

                <div class="work-item">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Interior Design">
                    <div class="work-overlay">
                        <span class="work-category">ARCHITECTURE</span>
                        <h3 class="work-title">Modern Space</h3>
                        <span class="work-link">VIEW STORY →</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>IMPRESSED WITH OUR WORK?</h2>
                <p>Let's create something equally amazing for your project.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-large">START A PROJECT</a>
                    <a href="{{ route('services') }}" class="btn btn-outline btn-large">EXPLORE SERVICES</a>
                </div>
            </div>
        </div>
    </section>
@endsection
