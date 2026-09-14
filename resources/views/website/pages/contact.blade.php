@extends('website.layouts.app')

@section('title', 'Contact')

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
                    // Scroll to form
                    document.getElementById('contact-form').scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
@endif
    <!-- PAGE HERO -->
    <section class="hero" id="hero" style="min-height: 50vh; height: auto; padding: 8rem 2rem;">
        <div class="hero-content">
            <p class="hero-subtitle">Let's Talk</p>
            <h1 style="font-size: 3.5rem; margin-bottom: 1rem;">Start Your<br>Next Project.</h1>
            <p class="hero-description">We're here to discuss your creative vision and bring it to life.</p>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="contact">
        <div class="container-max">
            <div class="contact-container" id="contact-form">
                <div class="contact-info">
                    <h2>Let's Talk About<br>Your Next Story.</h2>

                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-label">STUDIO ADDRESS</span>
                            <div class="contact-value">
                                Snap Spirit Studio<br>
                                8th Floor, 834 to 838 Krupal Pathsala,<br>
                                Near Kheti Bank, Ashram Road,<br>
                                Ahmedabad, Gujarat - 380005<br>
                                India
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">PHONE</span>
                            <div class="contact-value">
                                <a href="tel:+918488888494">+91 8488888494</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">WHATSAPP</span>
                            <div class="contact-value">
                                <a href="https://wa.me/918488888494?text=Hello%20Snap%20Spirit%20Studio!">+91 8488888494</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">EMAIL</span>
                            <div class="contact-value">
                                <a href="mailto:snapstudio.gmail.com">snapstudio.gmail.com</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">INSTAGRAM</span>
                            <div class="contact-value">
                                <a href="https://instagram.com/snapspiritstudio" target="_blank" rel="noopener noreferrer">@snapspiritstudio</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <span class="contact-label">BUSINESS HOURS</span>
                            <div class="contact-value">
                                Monday - Saturday: 10:00 AM - 7:00 PM<br>
                                Sunday: 12:00 PM - 6:00 PM
                            </div>
                        </div>
                    </div>
                </div>

                <form class="contact-form" method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" class="form-control" name="name" placeholder="Your full name" required value="{{ old('name') }}">
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
                                <option value="">-- Select project type --</option>
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
                        <textarea class="form-control" name="message" placeholder="Tell us about your project, vision, and any specific requirements...">{{ old('message') }}</textarea>
                        @error('message') <div class="form-error">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">SEND ENQUIRY →</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq" style="background-color: var(--color-ivory); padding: var(--spacing-3xl) var(--spacing-xl);">
        <div class="container-max">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="faq-container">
                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">What is your response time?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            We typically respond to all inquiries within 24 hours during business days. For urgent queries, you can reach us directly via WhatsApp or phone call.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">Do you offer customized packages?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Yes! Every project is unique. We create customized packages based on your specific needs, budget, and vision. Let's discuss what works best for you.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">What is your cancellation policy?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Our cancellation policy is discussed during the booking process and included in the agreement. We're flexible and understand that circumstances can change. Contact us to discuss your specific situation.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">How long does post-production take?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            Post-production timelines vary based on project complexity. Typically, edited photos are delivered within 2-3 weeks, and cinematic videos within 4-6 weeks. Rush deliveries can be arranged for additional fees.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <button class="accordion-header">
                        <h3 class="accordion-title">Do you provide albums and prints?</h3>
                        <div class="accordion-icon">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </button>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            We can arrange premium albums, prints, and other physical deliverables through our trusted vendors. Quality and customization options are available across all price ranges.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FINAL CTA -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>Ready to Start?</h2>
                <p>Send us your project details or reach out directly via WhatsApp.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#contact" class="btn btn-primary btn-large">FILL THE FORM ABOVE</a>
                    <a href="https://wa.me/918488888494?text=Hello%20Snap%20Spirit%20Studio!" class="btn btn-outline btn-large">WHATSAPP NOW</a>
                </div>
            </div>
        </div>
    </section>
@endsection
