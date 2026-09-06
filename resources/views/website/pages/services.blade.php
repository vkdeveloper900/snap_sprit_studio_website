@extends('website.layouts.app')

@section('title', 'Services')

@section('content')
    <!-- PAGE HERO -->
    <section class="hero" id="hero" style="min-height: 50vh; height: auto; padding: 8rem 2rem;">
        <div class="hero-content">
            <p class="hero-subtitle">Our Services</p>
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem;">Comprehensive Visual<br>Solutions.</h1>
            <p class="hero-description">Photography, cinematography, and creative production tailored to your vision.</p>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services">
        <div class="container-max">
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-number">01</div>
                    <h3>Weddings & Events</h3>
                    <ul>
                        <li>Wedding Photography</li>
                        <li>Wedding Cinematography</li>
                        <li>Pre-Wedding Shoots</li>
                        <li>Ceremony Photography</li>
                        <li>Event Coverage</li>
                        <li>Destination Weddings</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3>Commercial & Corporate</h3>
                    <ul>
                        <li>Corporate Photography</li>
                        <li>Brand Photography</li>
                        <li>Advertising Content</li>
                        <li>Promotional Videos</li>
                        <li>Product Photography</li>
                        <li>Corporate Events</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3>Fashion & Models</h3>
                    <ul>
                        <li>Fashion Photography</li>
                        <li>Model Portfolios</li>
                        <li>Editorial Shoots</li>
                        <li>Fashion Videography</li>
                        <li>Lookbook Creation</li>
                        <li>Campaign Production</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-number">04</div>
                    <h3>Architecture & Real Estate</h3>
                    <ul>
                        <li>Interior Photography</li>
                        <li>Interior Videography</li>
                        <li>Architectural Shoots</li>
                        <li>Real Estate Content</li>
                        <li>Virtual Property Tours</li>
                        <li>Renovation Documentation</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-number">05</div>
                    <h3>Content & Production</h3>
                    <ul>
                        <li>Social Media Content</li>
                        <li>Reels & Short-Form</li>
                        <li>Documentary Films</li>
                        <li>Cinematic Production</li>
                        <li>Creative Projects</li>
                        <li>Post-Production</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-number">06</div>
                    <h3>Specialized Services</h3>
                    <ul>
                        <li>Drone Photography</li>
                        <li>360° Photography</li>
                        <li>Time-Lapse Production</li>
                        <li>Animation & Motion</li>
                        <li>Color Grading</li>
                        <li>Custom Packages</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- PROCESS SECTION -->
    <section style="background-color: var(--color-ivory); padding: var(--spacing-3xl) var(--spacing-xl);">
        <div class="container-max">
            <div class="section-header">
                <h2>Our Process</h2>
                <p>How we bring your vision to life.</p>
            </div>

            <div class="why-us-grid">
                <div class="why-item">
                    <div class="why-number">01</div>
                    <h3>Consultation</h3>
                    <p>We listen to your vision, understand your goals, and discuss your requirements in detail.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">02</div>
                    <h3>Planning</h3>
                    <p>We create a comprehensive plan including timeline, locations, and creative direction.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">03</div>
                    <h3>Execution</h3>
                    <p>Our team delivers professional photography and cinematography with attention to every detail.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">04</div>
                    <h3>Delivery</h3>
                    <p>We provide beautifully edited and processed final deliverables exceeding your expectations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>Ready to Work With Us?</h2>
                <p>Let's discuss your project and create something extraordinary.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-large">GET IN TOUCH</a>
                    <a href="{{ route('portfolio') }}" class="btn btn-outline btn-large">SEE OUR WORK</a>
                </div>
            </div>
        </div>
    </section>
@endsection
