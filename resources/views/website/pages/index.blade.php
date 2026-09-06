@extends('website.layouts.app')

@section('title', 'Home')

@section('content')
    <!-- HERO SECTION -->
    <section class="hero" id="hero">
        <!-- Background Video -->
        <video class="hero-video" muted playsinline autoplay>
            <source src="{{ asset('assets/videos/v1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="hero-content">
            <h1>Every Frame<br>Tells a<br>Story.</h1>
            <p class="hero-description">
                Cinematic photography & videography that captures raw emotions<br>
                • Weddings • Events • Brands • Creative Visions
            </p>
        </div>

        <div class="scroll-indicator">
            <span class="">SCROLL TO EXPLORE</span>
            <i class="bi bi-chevron-down"></i>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="about" id="about">
        <div class="container-max">
            <div class="about-content">
                <div class="about-text">
                    <h2>We Capture More<br>Than Moments.<br>We Capture Stories.</h2>
                    <p>Snap Spirit Studio is an Ahmedabad-based photography and cinematography studio creating visual stories for weddings, brands, businesses, agencies and creative projects.</p>

                    <div class="about-founder">
                        <strong>Founded by Chintan Mali</strong>, a cinematographer and visual storyteller passionate about capturing authentic moments and bringing creative visions to life.
                    </div>

                    <p>From intimate ceremonies to grand celebrations, from brand campaigns to creative productions, we bring technical excellence, artistic vision, and an unwavering commitment to your story.</p>

                    <a href="{{ route('about') }}" class="btn btn-primary">DISCOVER OUR STORY →</a>
                </div>

                <div class="about-image">
                    <img src="{{ asset('assets/images/team.jpg') }}" alt="Photography Studio - Snap Spirit Studio">
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED WORK SECTION -->
    <section class="featured-work" id="work">
        <div class="container-max">
            <div class="section-header">
                <h2>Selected Work</h2>
                <p>A collection of stories, moments and ideas we've brought to life.</p>
            </div>

            <div class="work-grid">
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
            </div>

            <a href="{{ route('portfolio') }}" class="btn btn-secondary" style="display: block; margin: 3rem auto 0;">EXPLORE ALL WORK →</a>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services" id="services">
        <div class="container-max">
            <div class="section-header">
                <h2>What We Create</h2>
                <p>Comprehensive visual services for every project type and vision.</p>
            </div>

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
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3>Commercial & Corporate</h3>
                    <ul>
                        <li>Corporate Shoots</li>
                        <li>Brand Photography</li>
                        <li>Advertising Content</li>
                        <li>Promotional Materials</li>
                        <li>Corporate Videos</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3>Fashion & Models</h3>
                    <ul>
                        <li>Fashion Photography</li>
                        <li>Model Shoots</li>
                        <li>Editorial Content</li>
                        <li>Fashion Videography</li>
                        <li>Portfolio Development</li>
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
                        <li>Virtual Tours</li>
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
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- WEDDINGS & PRE-WEDDINGS SECTION -->
    <section class="weddings">
        <div class="container-max">
            <div class="weddings-content">
                <div class="weddings-text">
                    <h2>For Your Most<br>Important Moments.</h2>
                    <p>From intimate ceremonies to grand celebrations, we capture the emotions, details and moments that make your story uniquely yours. Every glance, every laugh, every tear is preserved with cinematic beauty.</p>
                    <a href="{{ route('portfolio') }}" class="btn btn-primary">EXPLORE WEDDING STORIES →</a>
                </div>

                <div class="weddings-images">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&q=80" alt="Wedding Ceremony">
                    <img src="https://images.unsplash.com/photo-1518895949257-7621c3c786d7?w=600&q=80" alt="Pre-Wedding Portrait">
                </div>
            </div>
        </div>
    </section>

    <!-- COMMERCIAL & BRAND WORK SECTION -->
    <section class="commercial">
        <div class="container-max">
            <div class="commercial-content">
                <div class="commercial-images">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80" alt="Brand Photography">
                    <img src="https://images.unsplash.com/photo-1552168324-d7da38ad4789?w=600&q=80" alt="Commercial Shoot">
                </div>

                <div class="commercial-text">
                    <h2>For Your Next<br>Big Idea.</h2>
                    <p>From brand campaigns and corporate shoots to advertising, interiors and social content, we create visuals designed to make businesses stand out. We understand your brand, your market, and your goals.</p>
                    <a href="{{ route('portfolio') }}" class="btn btn-primary">EXPLORE COMMERCIAL WORK →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CINEMATIC SHOWREEL SECTION -->
    <section class="showreel">
        <div class="container-max">
            <h2>Every Frame<br>Tells a Story.</h2>
            <button class="showreel-button">
                <i class="bi bi-play-fill"></i>
            </button>
            <p class="showreel-subtitle">Wedding Films • Brand Films • Commercials • Creative Productions</p>
        </div>
    </section>

    <!-- TEAM SECTION -->
    <section class="team" id="team">
        <div class="container-max">
            <div class="section-header">
                <h2>The People<br>Behind the Lens</h2>
                <p>Our talented team of photographers, cinematographers, and creative professionals.</p>
            </div>

            <div class="team-marquee" aria-label="Team profiles marquee">
                <div class="team-track">
                    <div class="team-member marquee-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="Chintan Mali - Founder">
                        </div>
                        <h3>Chintan Mali</h3>
                        <p>Founder & Cinematographer</p>
                    </div>

                    <div class="team-member marquee-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80" alt="Team Member">
                        </div>
                        <h3>Team Member</h3>
                        <p>Photographer</p>
                    </div>

                    <div class="team-member marquee-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=600&q=80" alt="Team Member">
                        </div>
                        <h3>Team Member</h3>
                        <p>Cinematographer</p>
                    </div>

                    <div class="team-member marquee-card">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=600&q=80" alt="Team Member">
                        </div>
                        <h3>Team Member</h3>
                        <p>Video Editor</p>
                    </div>

                    <div class="team-member marquee-card" aria-hidden="true">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="">
                        </div>
                        <h3>Chintan Mali</h3>
                        <p>Founder & Cinematographer</p>
                    </div>

                    <div class="team-member marquee-card" aria-hidden="true">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80" alt="">
                        </div>
                        <h3>Team Member</h3>
                        <p>Photographer</p>
                    </div>

                    <div class="team-member marquee-card" aria-hidden="true">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=600&q=80" alt="">
                        </div>
                        <h3>Team Member</h3>
                        <p>Cinematographer</p>
                    </div>

                    <div class="team-member marquee-card" aria-hidden="true">
                        <div class="team-image">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=600&q=80" alt="">
                        </div>
                        <h3>Team Member</h3>
                        <p>Video Editor</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CLIENTS SECTION -->
    <section class="clients">
        <div class="container-max">
            <div class="clients-header">
                <h2>Creative Collaborations</h2>
                <p>We collaborate with brands, advertising agencies, designers, creators and businesses to bring ideas to life.</p>
            </div>

            <div class="clients-marquee" aria-label="Brand collaborations marquee">
                <div class="clients-track">
                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-camera-reels"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Aperture House</span>
                            <span class="client-tag">Brand Films</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-stars"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Frame & Co.</span>
                            <span class="client-tag">Creative Agency</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-building"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Northline Studio</span>
                            <span class="client-tag">Commercial Brand</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-palette"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Bloom Atelier</span>
                            <span class="client-tag">Fashion House</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-award"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Prism Collective</span>
                            <span class="client-tag">Design Studio</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-bag-check"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Urban Craft</span>
                            <span class="client-tag">Retail Brand</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-play-circle"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Motion House</span>
                            <span class="client-tag">Production Partner</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card">
                        <div class="client-icon"><i class="bi bi-lightning-charge"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Atlas Media</span>
                            <span class="client-tag">Agency Partner</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-camera-reels"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Aperture House</span>
                            <span class="client-tag">Brand Films</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-stars"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Frame & Co.</span>
                            <span class="client-tag">Creative Agency</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-building"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Northline Studio</span>
                            <span class="client-tag">Commercial Brand</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-palette"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Bloom Atelier</span>
                            <span class="client-tag">Fashion House</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-award"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Prism Collective</span>
                            <span class="client-tag">Design Studio</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-bag-check"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Urban Craft</span>
                            <span class="client-tag">Retail Brand</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-play-circle"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Motion House</span>
                            <span class="client-tag">Production Partner</span>
                        </div>
                    </div>

                    <div class="client-logo marquee-card" aria-hidden="true">
                        <div class="client-icon"><i class="bi bi-lightning-charge"></i></div>
                        <div class="client-copy">
                            <span class="client-name">Atlas Media</span>
                            <span class="client-tag">Agency Partner</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY SNAP SPIRIT SECTION -->
    <section class="why-us">
        <div class="container-max">
            <div class="section-header">
                <h2>Why Snap Spirit</h2>
                <p>Four reasons clients trust us to turn important moments into polished visual stories.</p>
            </div>

            <div class="why-us-grid">
                <div class="why-item">
                    <div class="why-number">01</div>
                    <h3>Creative Vision</h3>
                    <p>We bring artistic excellence and technical mastery to every project, creating visuals that stand out.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">02</div>
                    <h3>Story-First Approach</h3>
                    <p>Your story is our priority. We listen, understand, and capture what matters most to you.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">03</div>
                    <h3>Photography + Cinematography</h3>
                    <p>We deliver both still photography and cinematic video under one roof for seamless storytelling.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">04</div>
                    <h3>Built to Collaborate</h3>
                    <p>We work closely with agencies, brands, and creators to bring complex visions to life.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="testimonials">
        <div class="container-max">
            <div class="section-header">
                <h2>Words From<br>The People We've Worked With</h2>
            </div>

            <div class="testimonials-marquee" aria-label="Client testimonials slider">
                <div class="testimonials-track">
                    <div class="testimonial-card marquee-card">
                        <div class="testimonial-quote">"</div>
                        <p class="testimonial-text">"[PLACEHOLDER CLIENT TESTIMONIAL — REPLACE WITH REAL CLIENT REVIEW.]"</p>
                        <div class="testimonial-footer">
                            <div class="testimonial-author">Client Name</div>
                            <div class="testimonial-role">Wedding Client</div>
                        </div>
                    </div>

                    <div class="testimonial-card marquee-card">
                        <div class="testimonial-quote">"</div>
                        <p class="testimonial-text">"[PLACEHOLDER CLIENT TESTIMONIAL — REPLACE WITH REAL CLIENT REVIEW.]"</p>
                        <div class="testimonial-footer">
                            <div class="testimonial-author">Brand Name</div>
                            <div class="testimonial-role">Commercial Client</div>
                        </div>
                    </div>

                    <div class="testimonial-card marquee-card">
                        <div class="testimonial-quote">"</div>
                        <p class="testimonial-text">"[PLACEHOLDER CLIENT TESTIMONIAL — REPLACE WITH REAL CLIENT REVIEW.]"</p>
                        <div class="testimonial-footer">
                            <div class="testimonial-author">Agency Name</div>
                            <div class="testimonial-role">Creative Agency</div>
                        </div>
                    </div>

                    <div class="testimonial-card marquee-card" aria-hidden="true">
                        <div class="testimonial-quote">"</div>
                        <p class="testimonial-text">"[PLACEHOLDER CLIENT TESTIMONIAL — REPLACE WITH REAL CLIENT REVIEW.]"</p>
                        <div class="testimonial-footer">
                            <div class="testimonial-author">Client Name</div>
                            <div class="testimonial-role">Wedding Client</div>
                        </div>
                    </div>

                    <div class="testimonial-card marquee-card" aria-hidden="true">
                        <div class="testimonial-quote">"</div>
                        <p class="testimonial-text">"[PLACEHOLDER CLIENT TESTIMONIAL — REPLACE WITH REAL CLIENT REVIEW.]"</p>
                        <div class="testimonial-footer">
                            <div class="testimonial-author">Brand Name</div>
                            <div class="testimonial-role">Commercial Client</div>
                        </div>
                    </div>

                    <div class="testimonial-card marquee-card" aria-hidden="true">
                        <div class="testimonial-quote">"</div>
                        <p class="testimonial-text">"[PLACEHOLDER CLIENT TESTIMONIAL — REPLACE WITH REAL CLIENT REVIEW.]"</p>
                        <div class="testimonial-footer">
                            <div class="testimonial-author">Agency Name</div>
                            <div class="testimonial-role">Creative Agency</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section class="gallery" id="gallery">
        <div class="container-max">
            <div class="section-header">
                <h2>The Gallery</h2>
            </div>

            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">ALL</button>
                <button class="filter-btn" data-filter="weddings">WEDDINGS</button>
                <button class="filter-btn" data-filter="preweddings">PRE-WEDDINGS</button>
                <button class="filter-btn" data-filter="events">EVENTS</button>
                <button class="filter-btn" data-filter="commercial">COMMERCIAL</button>
                <button class="filter-btn" data-filter="fashion">FASHION</button>
                <button class="filter-btn" data-filter="architecture">ARCHITECTURE</button>
            </div>

            <div class="gallery-grid">
                <!-- Weddings -->
                <div class="gallery-item" data-category="weddings">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80" alt="Wedding Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">WEDDING</span>
                        <h3 class="gallery-item-title">Ceremony Moment</h3>
                    </div>
                </div>

                <!-- Pre-weddings -->
                <div class="gallery-item" data-category="preweddings">
                    <img src="https://images.unsplash.com/photo-1511285541135-f46ad50edbc1?w=600&q=80" alt="Pre-Wedding Shoot">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">PRE-WEDDING</span>
                        <h3 class="gallery-item-title">Couple Portrait</h3>
                    </div>
                </div>

                <!-- Events -->
                <div class="gallery-item" data-category="events">
                    <img src="https://images.unsplash.com/photo-1585147394579-a44c8f35ec51?w=600&q=80" alt="Event Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">EVENT</span>
                        <h3 class="gallery-item-title">Celebration</h3>
                    </div>
                </div>

                <!-- Commercial -->
                <div class="gallery-item" data-category="commercial">
                    <img src="https://images.unsplash.com/photo-1533900298318-6b8da08a523e?w=600&q=80" alt="Corporate Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">COMMERCIAL</span>
                        <h3 class="gallery-item-title">Brand Campaign</h3>
                    </div>
                </div>

                <!-- Fashion -->
                <div class="gallery-item" data-category="fashion">
                    <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=600&q=80" alt="Fashion Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">FASHION</span>
                        <h3 class="gallery-item-title">Editorial</h3>
                    </div>
                </div>

                <!-- Architecture -->
                <div class="gallery-item" data-category="architecture">
                    <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=600&q=80" alt="Architecture Photography">
                    <div class="gallery-item-overlay">
                        <span class="gallery-item-category">ARCHITECTURE</span>
                        <h3 class="gallery-item-title">Interior Design</h3>
                    </div>
                </div>

                <!-- More items -->
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

    <!-- INSTAGRAM SECTION -->
    <section class="instagram">
        <div class="container-max">
            <h2>Follow The Stories</h2>
            <p class="instagram-handle">@snapspiritstudio</p>

            <div class="instagram-grid">
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1511285541135-f46ad50edbc1?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1533900298318-6b8da08a523e?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1585147394579-a44c8f35ec51?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=300&q=80" alt="Instagram Post">
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1518895949257-7621c3c786d7?w=300&q=80" alt="Instagram Post">
                </div>
            </div>

            <a href="https://instagram.com/snapspiritstudio" target="_blank" rel="noopener noreferrer" class="btn btn-primary">FOLLOW ON INSTAGRAM →</a>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq">
        <div class="container-max">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="faq-container">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">Do you travel outside Ahmedabad?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Yes, we regularly travel to nearby cities and across India for weddings, events, and commercial projects. We specialize in destination shoots and have extensive experience working in different locations.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">Do you cover destination weddings?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Absolutely! We have covered destination weddings across India and internationally. We handle all logistics and provide comprehensive coverage for your special day, no matter where you choose to celebrate.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">Do you provide both photography and cinematography?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Yes, we specialize in providing both photography and cinematography services. You can book either service individually or combine them for comprehensive coverage with beautifully coordinated styles.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">Do you offer pre-wedding shoots?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Yes, we offer beautifully curated pre-wedding shoots at locations of your choice. We create romantic, cinematic content that tells your love story and can be used for invitations, albums, and social media.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">Do you work with brands and advertising agencies?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Absolutely! We work extensively with advertising agencies, creative houses, and brands to produce high-quality commercial content, brand campaigns, and advertising materials tailored to your requirements.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">How can we get a quotation?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            You can contact us through our contact form, WhatsApp, or email with details of your project. We'll review your requirements and provide a customized quotation within 24-48 hours.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">How far in advance should we book?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            For weddings, we recommend booking 3-6 months in advance. For events and commercial projects, 2-4 weeks is typically sufficient. However, we accept requests based on availability, so feel free to reach out even with shorter notice.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA SECTION -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>Let's Create Something<br>Worth Remembering.</h2>
                <p>Have a wedding, brand, campaign or creative project in mind?</p>

                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#contact" class="btn btn-primary btn-large">START A PROJECT</a>
                    <a href="https://wa.me/[PHONE_NUMBER]?text=Hello%20Snap%20Spirit%20Studio!" class="btn btn-outline btn-large">WHATSAPP US</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="contact" id="contact">
        <div class="container-max">
            <div class="contact-container">
                <div class="contact-info">
                    <h2>Let's Talk About<br>Your Next Story.</h2>

                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-label">STUDIO</span>
                            <div class="contact-value">
                                Snap Spirit Studio<br>
                                Shop 402, Asthamangal Complex,<br>
                                Near Rajasthan Hospital,<br>
                                Ahmedabad, Gujarat - 380005
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">PHONE</span>
                            <div class="contact-value">
                                <a href="tel:[PHONE_NUMBER]">[PHONE NUMBER]</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">WHATSAPP</span>
                            <div class="contact-value">
                                <a href="https://wa.me/[PHONE_NUMBER]?text=Hello%20Snap%20Spirit%20Studio!">[PHONE NUMBER]</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">EMAIL</span>
                            <div class="contact-value">
                                <a href="mailto:[EMAIL_ADDRESS]">[EMAIL ADDRESS]</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">INSTAGRAM</span>
                            <div class="contact-value">
                                <a href="https://instagram.com/snapspiritstudio" target="_blank" rel="noopener noreferrer">@snapspiritstudio</a>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="contact-form">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Your name" required>
                        <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="your@email.com" required>
                        <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" placeholder="+91 9876543210">
                        <div class="form-error"></div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Project Type</label>
                            <select class="form-control" name="project-type">
                                <option value="">Select project type</option>
                                <option value="wedding">Wedding</option>
                                <option value="prewedding">Pre-Wedding</option>
                                <option value="event">Event</option>
                                <option value="corporate">Corporate</option>
                                <option value="commercial">Commercial</option>
                                <option value="fashion">Fashion</option>
                                <option value="realestate">Real Estate</option>
                                <option value="interior">Interior</option>
                                <option value="content">Content Creation</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="form-error"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Event / Project Date</label>
                            <input type="date" class="form-control" name="event-date">
                            <div class="form-error"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" placeholder="Tell us about your project..."></textarea>
                        <div class="form-error"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">SEND ENQUIRY →</button>
                </form>
            </div>
        </div>
    </section>
@endsection
