@extends('website.layouts.app')

@section('title', 'Team')

@section('content')
    <!-- PAGE HERO -->
    <section class="hero" id="hero" style="min-height: 50vh; height: auto; padding: 8rem 2rem;">
        <div class="hero-content">
            <p class="hero-subtitle">Our Team</p>
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem;">The People<br>Behind the Lens.</h1>
            <p class="hero-description">A talented group of photographers, cinematographers, and creative professionals dedicated to storytelling.</p>
        </div>
    </section>

    <!-- TEAM SECTION -->
    <section class="team" style="padding: var(--spacing-3xl) var(--spacing-xl);">
        <div class="container-max">
            <div class="team-grid">
                <div class="team-member">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="Chintan Mali - Founder">
                    </div>
                    <h3>Chintan Mali</h3>
                    <p>Founder & Cinematographer</p>
                </div>

                <div class="team-member">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&q=80" alt="Team Member">
                    </div>
                    <h3>Team Member</h3>
                    <p>Photographer</p>
                </div>

                <div class="team-member">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=600&q=80" alt="Team Member">
                    </div>
                    <h3>Team Member</h3>
                    <p>Cinematographer</p>
                </div>

                <div class="team-member">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=600&q=80" alt="Team Member">
                    </div>
                    <h3>Team Member</h3>
                    <p>Video Editor</p>
                </div>

                <div class="team-member">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="Team Member">
                    </div>
                    <h3>Team Member</h3>
                    <p>Creative Director</p>
                </div>

                <div class="team-member">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=600&q=80" alt="Team Member">
                    </div>
                    <h3>Team Member</h3>
                    <p>Photographer</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CULTURE SECTION -->
    <section style="background-color: var(--color-ivory); padding: var(--spacing-3xl) var(--spacing-xl);">
        <div class="container-max">
            <div class="section-header">
                <h2>Our Culture</h2>
                <p>We're passionate about creating beautiful visual stories and collaborating with amazing people.</p>
            </div>

            <div class="why-us-grid">
                <div class="why-item">
                    <div class="why-number">01</div>
                    <h3>Creativity First</h3>
                    <p>We encourage bold ideas and artistic expression in everything we do.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">02</div>
                    <h3>Collaboration</h3>
                    <p>Our strength lies in teamwork and collective expertise across disciplines.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">03</div>
                    <h3>Continuous Learning</h3>
                    <p>We stay updated with the latest techniques, technology, and creative trends.</p>
                </div>

                <div class="why-item">
                    <div class="why-number">04</div>
                    <h3>Client Focus</h3>
                    <p>Our success is measured by our clients' satisfaction and the quality of our work.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>Let's Create Together.</h2>
                <p>Ready to collaborate with our talented team?</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-large">GET IN TOUCH</a>
                    <a href="{{ route('portfolio') }}" class="btn btn-outline btn-large">SEE OUR WORK</a>
                </div>
            </div>
        </div>
    </section>
@endsection
