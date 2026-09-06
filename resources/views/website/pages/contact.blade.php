@extends('website.layouts.app')

@section('title', 'Contact')

@section('content')
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
            <div class="contact-container">
                <div class="contact-info">
                    <h2>Let's Talk About<br>Your Next Story.</h2>

                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-label">STUDIO ADDRESS</span>
                            <div class="contact-value">
                                Snap Spirit Studio<br>
                                Shop 402, Asthamangal Complex,<br>
                                Near Rajasthan Hospital,<br>
                                Ahmedabad, Gujarat - 380005<br>
                                India
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

                        <div class="contact-item">
                            <span class="contact-label">BUSINESS HOURS</span>
                            <div class="contact-value">
                                Monday - Saturday: 10:00 AM - 7:00 PM<br>
                                Sunday: 12:00 PM - 6:00 PM
                            </div>
                        </div>
                    </div>
                </div>

                <form class="contact-form">
                    <div class="form-group">
                        <label class="form-label">Name *</label>
                        <input type="text" class="form-control" name="name" placeholder="Your full name" required>
                        <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" placeholder="your@email.com" required>
                        <div class="form-error"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone *</label>
                        <input type="tel" class="form-control" name="phone" placeholder="+91 9876543210" required>
                        <div class="form-error"></div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Project Type *</label>
                            <select class="form-control" name="project-type" required>
                                <option value="">-- Select project type --</option>
                                <option value="wedding">Wedding</option>
                                <option value="prewedding">Pre-Wedding</option>
                                <option value="event">Event</option>
                                <option value="corporate">Corporate</option>
                                <option value="commercial">Commercial / Brand</option>
                                <option value="fashion">Fashion</option>
                                <option value="realestate">Real Estate</option>
                                <option value="interior">Interior Design</option>
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
                        <textarea class="form-control" name="message" placeholder="Tell us about your project, vision, and any specific requirements..."></textarea>
                        <div class="form-error"></div>
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
                    <a href="https://wa.me/[PHONE_NUMBER]?text=Hello%20Snap%20Spirit%20Studio!" class="btn btn-outline btn-large">WHATSAPP NOW</a>
                </div>
            </div>
        </div>
    </section>
@endsection
