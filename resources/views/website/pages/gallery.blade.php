@extends('website.layouts.app')

@section('title', 'Gallery')

@section('content')
    <!-- PAGE HERO -->
    <section class="hero" id="hero" style="min-height: 50vh; height: auto; padding: 8rem 2rem;">
        <div class="hero-content">
            <p class="hero-subtitle">The Gallery</p>
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem;">Visual Stories<br>In Frames.</h1>
            <p class="hero-description">Click on any image to view in full size. Use the filters to explore by category.</p>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section class="gallery" id="gallery" style="padding: var(--spacing-2xl) var(--spacing-lg);">
        <div class="container-max">
            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="weddings">Weddings</button>
                <button class="filter-btn" data-filter="preweddings">Pre-Weddings</button>
                <button class="filter-btn" data-filter="events">Events</button>
                <button class="filter-btn" data-filter="commercial">Commercial</button>
                <button class="filter-btn" data-filter="fashion">Fashion</button>
                <button class="filter-btn" data-filter="architecture">Architecture</button>
            </div>

            <div class="gallery-grid masonry-grid">
                <div class="gallery-item" data-category="weddings">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80" alt="Wedding Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">WEDDING</span>
                        <h3 class="gallery-item-title">Ceremony Moment</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="preweddings">
                    <img src="https://images.unsplash.com/photo-1511285541135-f46ad50edbc1?w=600&q=80" alt="Pre-Wedding Shoot">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">PRE-WEDDING</span>
                        <h3 class="gallery-item-title">Couple Portrait</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="events">
                    <img src="https://images.unsplash.com/photo-1585147394579-a44c8f35ec51?w=600&q=80" alt="Event Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">EVENT</span>
                        <h3 class="gallery-item-title">Celebration</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="commercial">
                    <img src="https://images.unsplash.com/photo-1533900298318-6b8da08a523e?w=600&q=80" alt="Corporate Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">COMMERCIAL</span>
                        <h3 class="gallery-item-title">Brand Campaign</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="fashion">
                    <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&q=80" alt="Fashion Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">FASHION</span>
                        <h3 class="gallery-item-title">Editorial</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="architecture">
                    <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80" alt="Architecture Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">ARCHITECTURE</span>
                        <h3 class="gallery-item-title">Interior Design</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="weddings">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&q=80" alt="Wedding Ceremony">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">WEDDING</span>
                        <h3 class="gallery-item-title">Vows & Tears</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="commercial">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80" alt="Brand Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">COMMERCIAL</span>
                        <h3 class="gallery-item-title">Product Shoot</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="events">
                    <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80" alt="Concert Event">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">EVENT</span>
                        <h3 class="gallery-item-title">Live Performance</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="fashion">
                    <img src="https://images.unsplash.com/photo-1500152876223-1a67cd9e91a4?w=600&q=80" alt="Fashion Model">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">FASHION</span>
                        <h3 class="gallery-item-title">Model Portfolio</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="preweddings">
                    <img src="https://images.unsplash.com/photo-1518895949257-7621c3c786d7?w=600&q=80" alt="Couple Shoot">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">PRE-WEDDING</span>
                        <h3 class="gallery-item-title">Love Story</h3>
                    </div>
                </div>

                <div class="gallery-item" data-category="architecture">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Interior Design">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">ARCHITECTURE</span>
                        <h3 class="gallery-item-title">Modern Space</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY MODAL -->
    <div class="modal" id="galleryModal">
        <button class="modal-close">&times;</button>
        <img class="modal-content" src="" alt="Gallery Image">
        <button class="modal-nav modal-prev">&lt;</button>
        <button class="modal-nav modal-next">&gt;</button>
    </div>

    <!-- FINAL CTA -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>Want to Book Us?</h2>
                <p>Let's create beautiful visuals for your next project.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-large">CONTACT US</a>
                    <a href="{{ route('services') }}" class="btn btn-outline btn-large">VIEW SERVICES</a>
                </div>
            </div>
        </div>
    </section>
@endsection
