@extends('website.layouts.app')

@section('title', 'Home')

@section('content')

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Thank You! 🎉',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#d4af37',
                confirmButtonText: 'Got it',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('home-contact-form').reset();
                }
            });
        });
    </script>
@endif
    <!-- HERO SECTION -->
    <section class="hero" id="hero">
        <!-- Background Video -->
        <video class="hero-video" muted playsinline autoplay>
            <source src="{{ asset('assets/videos/v1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="hero-content">
            <h1>Premium Photography<br>& Cinematography<br>in Ahmedabad</h1>
            <p class="hero-description">
                Award-winning visual storytelling for weddings, events, and brands<br>
                Professional • Cinematic • Authentic
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
                    <h2>We Capture More Than Moments. We Capture Stories.</h2>

                    <p>Based in Ahmedabad, Snap Spirit Studio specializes in creating compelling visual narratives for weddings, brands, and creative projects. With expertise in both photography and cinematography, we transform your vision into timeless imagery.</p>

                    <p><strong style="color: var(--color-champagne);">Founded by Chintan Mali</strong>, our studio brings technical excellence and artistic vision to every project. Whether it's an intimate ceremony or a grand celebration, a brand campaign or commercial production, we deliver authentic storytelling with cinematic excellence.</p>

                    <a href="{{ route('about') }}" class="btn btn-primary">DISCOVER OUR STORY →</a>
                </div>

                <div class="about-image">
                    <img src="{{ asset('assets/images/team.jpg') }}" alt="Photography Studio - Snap Spirit Studio">
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section class="services" id="services">
        <div class="container-max">
            <div class="section-header">
                <h2>What We Create</h2>
                <p>Professional photography and cinematography services tailored for every vision and moment.</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <h3>Weddings & Events</h3>
                    <p>Capture love, joy and celebration with timeless imagery</p>
                    <ul>
                        <li>Wedding Photography</li>
                        <li>Pre-Wedding Shoots</li>
                        <li>Wedding Cinematography</li>
                        <li>Event Coverage</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Commercial & Brand</h3>
                    <p>Elevate your brand story with professional visual content</p>
                    <ul>
                        <li>Brand Photography</li>
                        <li>Corporate Videos</li>
                        <li>Advertising Content</li>
                        <li>Promotional Materials</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Fashion & Editorial</h3>
                    <p>Create stunning visual narratives for models and designers</p>
                    <ul>
                        <li>Fashion Photography</li>
                        <li>Model Shoots</li>
                        <li>Editorial Content</li>
                        <li>Portfolio Development</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Architecture & Real Estate</h3>
                    <p>Showcase spaces with cinematic precision and beauty</p>
                    <ul>
                        <li>Interior Photography</li>
                        <li>Architectural Shoots</li>
                        <li>Real Estate Content</li>
                        <li>Virtual Tours</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Content & Production</h3>
                    <p>Create engaging content for every platform and audience</p>
                    <ul>
                        <li>Social Media Content</li>
                        <li>Reels & Short-Form</li>
                        <li>Documentary Films</li>
                        <li>Cinematic Production</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- WEDDINGS & PRE-WEDDINGS SECTION -->
    @php
        $weddingImages = $weddingHighlights
            ->map(fn($h) => [
                'src'   => $h->type === 'video' ? $h->thumbnail_full_url : $h->media_full_url,
                'alt'   => $h->title,
                'title' => $h->title,
            ])
            ->filter(fn($i) => !empty($i['src']))
            ->values();
    @endphp
    <section class="weddings">
        <div class="container-max">
            <div class="weddings-content">
                <div class="weddings-text">
                    <h2>For Your Most<br>Important Moments.</h2>
                    <p>From intimate ceremonies to grand celebrations, we capture the emotions, details and moments that make your story uniquely yours. Every glance, every laugh, every tear is preserved with cinematic beauty.</p>
                    <a href="{{ route('portfolio') }}" class="btn btn-primary">EXPLORE WEDDING STORIES →</a>
                </div>

                <div class="weddings-images" id="wedding-images">
                    @if($weddingImages->count() >= 1)
                        <img src="{{ $weddingImages[0]['src'] }}" alt="{{ $weddingImages[0]['alt'] }}" data-slot="0" style="transition: opacity 0.6s ease;">
                        <img src="{{ $weddingImages[1]['src'] ?? $weddingImages[0]['src'] }}" alt="{{ $weddingImages[1]['alt'] ?? $weddingImages[0]['alt'] }}" data-slot="1" style="transition: opacity 0.6s ease;">
                    @else
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&q=80" alt="Wedding Ceremony">
                        <img src="https://images.unsplash.com/photo-1518895949257-7621c3c786d7?w=600&q=80" alt="Pre-Wedding Portrait">
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if($weddingImages->count() > 2)
        <script>
        (function () {
            const imgs = @json($weddingImages->values());
            const container = document.getElementById('wedding-images');
            if (!container) return;
            const slots = container.querySelectorAll('img[data-slot]');
            if (slots.length < 2) return;

            let idx = 0;
            const INTERVAL = 4000;
            const FADE_MS  = 600;

            function step() {
                idx = (idx + 2) % imgs.length;
                const a = imgs[idx];
                const b = imgs[(idx + 1) % imgs.length];

                slots[0].style.opacity = '0';
                slots[1].style.opacity = '0';

                setTimeout(() => {
                    slots[0].src = a.src;
                    slots[0].alt = a.alt;
                    slots[1].src = b.src;
                    slots[1].alt = b.alt;
                    slots[0].style.opacity = '1';
                    slots[1].style.opacity = '1';
                }, FADE_MS);
            }

            setInterval(step, INTERVAL);
        })();
        </script>
    @endif

    <!-- COMMERCIAL & BRAND WORK SECTION -->
    @php
        $commercialImages = $commercialHighlights
            ->map(fn($h) => [
                'src'   => $h->type === 'video' ? $h->thumbnail_full_url : $h->media_full_url,
                'alt'   => $h->title,
                'title' => $h->title,
            ])
            ->filter(fn($i) => !empty($i['src']))
            ->values();
    @endphp
    <section class="commercial">
        <div class="container-max">
            <div class="commercial-content">
                <div class="commercial-images" id="commercial-images">
                    @if($commercialImages->count() >= 1)
                        <img src="{{ $commercialImages[0]['src'] }}" alt="{{ $commercialImages[0]['alt'] }}" data-slot="0" style="transition: opacity 0.6s ease;">
                        <img src="{{ $commercialImages[1]['src'] ?? $commercialImages[0]['src'] }}" alt="{{ $commercialImages[1]['alt'] ?? $commercialImages[0]['alt'] }}" data-slot="1" style="transition: opacity 0.6s ease;">
                    @else
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80" alt="Brand Photography">
                        <img src="https://images.unsplash.com/photo-1552168324-d7da38ad4789?w=600&q=80" alt="Commercial Shoot">
                    @endif
                </div>

                <div class="commercial-text">
                    <h2>For Your Next<br>Big Idea.</h2>
                    <p>From brand campaigns and corporate shoots to advertising, interiors and social content, we create visuals designed to make businesses stand out. We understand your brand, your market, and your goals.</p>
                    <a href="{{ route('portfolio') }}" class="btn btn-primary">EXPLORE COMMERCIAL WORK →</a>
                </div>
            </div>
        </div>
    </section>

    @if($commercialImages->count() > 2)
        <script>
        (function () {
            const imgs = @json($commercialImages->values());
            const container = document.getElementById('commercial-images');
            if (!container) return;
            const slots = container.querySelectorAll('img[data-slot]');
            if (slots.length < 2) return;

            let idx = 0;
            const INTERVAL = 4000;
            const FADE_MS  = 600;

            function step() {
                idx = (idx + 2) % imgs.length;
                const a = imgs[idx];
                const b = imgs[(idx + 1) % imgs.length];

                slots[0].style.opacity = '0';
                slots[1].style.opacity = '0';

                setTimeout(() => {
                    slots[0].src = a.src;
                    slots[0].alt = a.alt;
                    slots[1].src = b.src;
                    slots[1].alt = b.alt;
                    slots[0].style.opacity = '1';
                    slots[1].style.opacity = '1';
                }, FADE_MS);
            }

            setInterval(step, INTERVAL);
        })();
        </script>
    @endif

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
                    @forelse($teamMembers as $member)
                        <div class="team-member marquee-card">
                            <div class="team-image">
                                <img src="{{ $member->avatar_url }}" alt="{{ $member->name }}">
                            </div>
                            <h3>{{ $member->name }}</h3>
                            <p>{{ $member->designation }}</p>
                        </div>
                    @empty
                        <p>No team members found</p>
                    @endforelse

                    @forelse($teamMembers as $member)
                        <div class="team-member marquee-card" aria-hidden="true">
                            <div class="team-image">
                                <img src="{{ $member->avatar_url }}" alt="">
                            </div>
                            <h3>{{ $member->name }}</h3>
                            <p>{{ $member->designation }}</p>
                        </div>
                    @empty
                    @endforelse
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
                    @forelse($clients as $client)
                        <div class="client-logo marquee-card">
                            <div class="client-icon">
                                <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" style="width: 60px; height: 60px; object-fit: contain;">
                            </div>
                            <div class="client-copy">
                                <span class="client-name">{{ $client->name }}</span>
                                <span class="client-tag">{{ $client->category }}</span>
                            </div>
                        </div>
                    @empty
                        <p>No clients found</p>
                    @endforelse

                    @forelse($clients as $client)
                        <div class="client-logo marquee-card" aria-hidden="true">
                            <div class="client-icon">
                                <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" style="width: 60px; height: 60px; object-fit: contain;">
                            </div>
                            <div class="client-copy">
                                <span class="client-name">{{ $client->name }}</span>
                                <span class="client-tag">{{ $client->category }}</span>
                            </div>
                        </div>
                    @empty
                    @endforelse
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
                    @forelse($testimonials as $testimonial)
                        <div class="testimonial-card marquee-card">
                            <div class="testimonial-quote">"</div>
                            <p class="testimonial-text">"{{ $testimonial->testimonial_text }}"</p>
                            <div class="testimonial-footer">
                                <div class="testimonial-author">{{ $testimonial->client_name }}</div>
                                <div class="testimonial-role">{{ $testimonial->designation }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="testimonial-card marquee-card">
                            <div class="testimonial-quote">"</div>
                            <p class="testimonial-text">"No testimonials available."</p>
                            <div class="testimonial-footer">
                                <div class="testimonial-author">Coming Soon</div>
                                <div class="testimonial-role">Client</div>
                            </div>
                        </div>
                    @endforelse

                    @forelse($testimonials as $testimonial)
                        <div class="testimonial-card marquee-card" aria-hidden="true">
                            <div class="testimonial-quote">"</div>
                            <p class="testimonial-text">"{{ $testimonial->testimonial_text }}"</p>
                            <div class="testimonial-footer">
                                <div class="testimonial-author">{{ $testimonial->client_name }}</div>
                                <div class="testimonial-role">{{ $testimonial->designation }}</div>
                            </div>
                        </div>
                    @empty
                    @endforelse
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

            @if($highlights->isNotEmpty())
                <div class="gallery-filters">
                    <button class="filter-btn active" data-filter="all">ALL</button>
                    @foreach($highlightTags as $tag => $label)
                        <button class="filter-btn" data-filter="{{ $tag }}">{{ strtoupper($label) }}</button>
                    @endforeach
                </div>

                <div class="gallery-grid">
                    @foreach($highlights as $h)
                        @php $thumb = $h->type === 'video' ? $h->thumbnail_full_url : $h->media_full_url; @endphp
                        <a href="{{ route('highlight.show', $h) }}" class="gallery-item gallery-item-link" data-category="{{ $h->tag }}" data-type="{{ $h->type }}" style="text-decoration: none; color: inherit; display: block; position: relative;">
                            @if($thumb)
                                <img src="{{ $thumb }}" alt="{{ $h->title }}" loading="lazy">
                            @else
                                <div style="width:100%; aspect-ratio:4/3; background: linear-gradient(135deg,#2a2a2a,#1a1a1a); display:flex; align-items:center; justify-content:center; color:#666; font-size:14px;">No preview</div>
                            @endif
                            @if($h->type === 'video')
                                <span class="gallery-video-badge" style="position:absolute; top:12px; right:12px; background:rgba(0,0,0,0.65); color:#fff; padding:4px 10px; border-radius:4px; font-size:11px; font-weight:600; letter-spacing:1px; z-index:2;">▶ VIDEO</span>
                            @endif
                            <div class="gallery-item-overlay">
                                <h3 class="gallery-item-title">{{ $h->title }}</h3>
                                @if($h->description)
                                    <p class="gallery-item-desc" style="margin-top:8px; font-size:0.9rem; opacity:0.9; line-height:1.5;">{{ \Illuminate\Support\Str::limit($h->description, 140) }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
                <script>
                    // Prevent modal from opening for anchor gallery items — allow default navigation
                    document.querySelectorAll('.gallery-item-link').forEach(a => {
                        a.addEventListener('click', function (e) {
                            e.stopImmediatePropagation();
                        }, true);
                    });
                </script>
            @else
                <p style="text-align:center; color: var(--text-secondary); padding: 3rem 0;">No highlights to display yet.</p>
            @endif
        </div>
    </section>

    <!-- GALLERY MODAL -->
    <div class="modal" id="galleryModal">
        <button class="modal-close">&times;</button>
        <img class="modal-content" src="" alt="Gallery Image">
        <button class="modal-nav modal-prev">&lt;</button>
        <button class="modal-nav modal-next">&gt;</button>
    </div>

    <!-- FAQ SECTION -->
    <section class="faq">
        <div class="container-max">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="faq-container">
                @forelse($faqs as $faq)
                    <div class="accordion-item">
                        <button class="accordion-header">
                            <h3 class="accordion-title">{{ $faq->question }}</h3>
                            <div class="accordion-icon">
                                <i class="bi bi-chevron-down"></i>
                            </div>
                        </button>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                {!! nl2br(e($faq->answer)) !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <p style="text-align: center; color: var(--text-secondary);">No FAQs available at the moment.</p>
                @endforelse
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
                    @if(!empty($company['whatsapp_number']))
                        <a href="https://wa.me/{{ $company['whatsapp_number'] }}?text=Hello%20{{ urlencode($company['company_name'] ?? '') }}!" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-large">WHATSAPP US</a>
                    @endif
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

                    @php
                        $cityLine = $company['city'] ?? '';
                        if (!empty($company['state'])) { $cityLine .= ($cityLine ? ', ' : '') . $company['state']; }
                        if (!empty($company['pincode'])) { $cityLine .= ($cityLine ? ' - ' : '') . $company['pincode']; }
                    @endphp
                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-label">STUDIO</span>
                            <div class="contact-value">
                                {{ $company['company_name'] ?? '' }}<br>
                                @if(!empty($company['address_line_1']))
                                    {{ $company['address_line_1'] }},<br>
                                @endif
                                @if(!empty($company['address_line_2']))
                                    {{ $company['address_line_2'] }},<br>
                                @endif
                                {{ $cityLine }}
                            </div>
                        </div>

                        @if(!empty($company['contact_phone']))
                        <div class="contact-item">
                            <span class="contact-label">PHONE</span>
                            <div class="contact-value">
                                <a href="tel:{{ preg_replace('/\s+/', '', $company['contact_phone']) }}">{{ $company['contact_phone'] }}</a>
                            </div>
                        </div>
                        @endif

                        @if(!empty($company['contact_email']))
                        <div class="contact-item">
                            <span class="contact-label">EMAIL</span>
                            <div class="contact-value">
                                <a href="mailto:{{ $company['contact_email'] }}">{{ $company['contact_email'] }}</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <form class="contact-form" method="POST" action="{{ route('contact.submit') }}" id="home-contact-form">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" class="form-control" name="name" placeholder="Your name" required value="{{ old('name') }}">
                        @error('name') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" placeholder="your@email.com" required value="{{ old('email') }}">
                        @error('email') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone *</label>
                        <input type="tel" class="form-control" name="phone" placeholder="+91 9876543210" required value="{{ old('phone') }}">
                        @error('phone') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Project Type *</label>
                            <select class="form-control" name="service_interested" required>
                                <option value="">Select project type</option>
                                <option value="Wedding" @if(old('service_interested') == 'Wedding') selected @endif>Wedding</option>
                                <option value="Pre-Wedding" @if(old('service_interested') == 'Pre-Wedding') selected @endif>Pre-Wedding</option>
                                <option value="Event" @if(old('service_interested') == 'Event') selected @endif>Event</option>
                                <option value="Corporate" @if(old('service_interested') == 'Corporate') selected @endif>Corporate</option>
                                <option value="Commercial / Brand" @if(old('service_interested') == 'Commercial / Brand') selected @endif>Commercial / Brand</option>
                                <option value="Fashion" @if(old('service_interested') == 'Fashion') selected @endif>Fashion</option>
                                <option value="Real Estate" @if(old('service_interested') == 'Real Estate') selected @endif>Real Estate</option>
                                <option value="Interior Design" @if(old('service_interested') == 'Interior Design') selected @endif>Interior Design</option>
                                <option value="Content Creation" @if(old('service_interested') == 'Content Creation') selected @endif>Content Creation</option>
                                <option value="Other" @if(old('service_interested') == 'Other') selected @endif>Other</option>
                            </select>
                            @error('service_interested') <div class="form-error">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Event / Project Date</label>
                            <input type="date" class="form-control" name="subject" value="{{ old('subject') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" placeholder="Tell us about your project...">{{ old('message') }}</textarea>
                        @error('message') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-secondary" style="border: 2px solid var(--color-black); border-radius: 20px;">SEND ENQUIRY →</button>
                </form>
            </div>
        </div>
    </section>
@endsection
