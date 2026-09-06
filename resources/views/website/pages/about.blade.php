@extends('website.layouts.app')

@section('title', 'About')

@section('content')
    <!-- PAGE HERO -->
    <section class="hero" id="hero" style="min-height: 50vh; height: auto; padding: 8rem 2rem;">
        <div class="hero-content">
            <p class="hero-subtitle">Our Story</p>
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem;">Capturing Stories,<br>Creating Magic.</h1>
            <p class="hero-description">Snap Spirit Studio was born from a passion for visual storytelling and a commitment to excellence.</p>
        </div>
    </section>

    <!-- ABOUT CONTENT -->
    <section class="about">
        <div class="container-max">
            <div class="about-content" style="display: block;">
                <div class="about-text">
                    <h2>Who We Are</h2>
                    <p>Snap Spirit Studio is a premium photography and cinematography studio based in Ahmedabad, Gujarat. We specialize in creating compelling visual narratives for weddings, brands, businesses, advertising agencies, and creative projects throughout Ahmedabad and beyond.</p>

                    <p>Since our inception, we have established ourselves as one of Ahmedabad's leading photography studios, known for combining technical excellence with artistic vision. Our comprehensive services span wedding photography, pre-wedding shoots, corporate events, brand photography, fashion shoots, interior design documentation, real estate photography, and cinematic video productions. We believe in the power of authentic visual storytelling to connect, inspire, and create lasting impressions.</p>

                    <h3 style="margin-top: 2rem; font-size: 1.8rem;">Our Founder</h3>
                    <p><strong>Chintan Mali</strong>, a renowned cinematographer and visual storyteller based in Ahmedabad, founded Snap Spirit Studio with a passion for capturing authentic emotions and bringing creative visions to life. With extensive expertise in both professional photography and cinematography, Chintan leads the studio with an unwavering commitment to artistic excellence, technical mastery, and client satisfaction. His work has been recognized across Ahmedabad's creative community for its distinctive style and storytelling approach.</p>

                    <h3 style="margin-top: 2rem; font-size: 1.8rem;">Our Philosophy</h3>
                    <p>We believe that every moment tells a story. Our approach is rooted in:</p>
                    <ul>
                        <li><strong>Story-First Mindset:</strong> We listen to your vision and understand what matters most to you.</li>
                        <li><strong>Artistic Excellence:</strong> We bring creative vision and technical mastery to every project.</li>
                        <li><strong>Attention to Detail:</strong> We capture the small moments that make stories complete.</li>
                        <li><strong>Collaborative Partnership:</strong> We work closely with our clients to bring their visions to life.</li>
                    </ul>

                    <h3 style="margin-top: 2rem; font-size: 1.8rem;">What Sets Us Apart</h3>
                    <p>Unlike many studios that specialize in only photography or videography, we offer both services under one roof. This integrated approach allows us to create cohesive visual stories where still images and cinematic films complement each other perfectly.</p>

                    <p>We work with advertising agencies, creative houses, brands, and individuals who understand that premium visual content is an investment in their story. Our clients aren't looking for templates—they're looking for artistry, professionalism, and results.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- VALUES SECTION -->
    <section class="why-us" style="background-color: var(--color-ivory);">
        <div class="container-max">
            <div class="section-header">
                <h2>Our Values</h2>
            </div>

            <div class="why-us-grid">
                <div class="why-item">
                    <div class="why-number">01</div>
                    <h3>Authenticity</h3>
                    <p>We capture real emotions and genuine moments, not staged perfection.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">02</div>
                    <h3>Excellence</h3>
                    <p>Technical mastery combined with artistic vision in every frame.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">03</div>
                    <h3>Collaboration</h3>
                    <p>Your vision is our priority. We work as partners, not just service providers.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">04</div>
                    <h3>Innovation</h3>
                    <p>We stay at the forefront of visual storytelling techniques and technology.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>Let's Work Together.</h2>
                <p>Ready to tell your story with us?</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Start a Project</a>
                    <a href="{{ route('portfolio') }}" class="btn btn-outline btn-large">VIEW OUR WORK</a>
                </div>
            </div>
        </div>
    </section>
@endsection