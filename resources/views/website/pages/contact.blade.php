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

                    @php
                        $cityLine = $company['city'] ?? '';
                        if (!empty($company['state'])) { $cityLine .= ($cityLine ? ', ' : '') . $company['state']; }
                        if (!empty($company['pincode'])) { $cityLine .= ($cityLine ? ' - ' : '') . $company['pincode']; }
                    @endphp
                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-label">STUDIO ADDRESS</span>
                            <div class="contact-value">
                                {{ $company['company_name'] ?? '' }}<br>
                                @if(!empty($company['address_line_1']))
                                    {{ $company['address_line_1'] }},<br>
                                @endif
                                @if(!empty($company['address_line_2']))
                                    {{ $company['address_line_2'] }},<br>
                                @endif
                                {{ $cityLine }}<br>
                                {{ $company['country'] ?? '' }}
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

                        @if(!empty($company['whatsapp_number']))
                        <div class="contact-item">
                            <span class="contact-label">WHATSAPP</span>
                            <div class="contact-value">
                                <a href="https://wa.me/{{ $company['whatsapp_number'] }}?text=Hello%20{{ urlencode($company['company_name'] ?? '') }}!" target="_blank" rel="noopener noreferrer">{{ $company['contact_phone'] ?? $company['whatsapp_number'] }}</a>
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

                        @if(!empty($company['instagram_url']))
                        <div class="contact-item">
                            <span class="contact-label">INSTAGRAM</span>
                            <div class="contact-value">
                                <a href="{{ $company['instagram_url'] }}" target="_blank" rel="noopener noreferrer">{{ $company['instagram_handle'] ?? '@snapspiritstudio' }}</a>
                            </div>
                        </div>
                        @endif

                        @if(!empty($company['business_hours']))
                        <div class="contact-item">
                            <span class="contact-label">BUSINESS HOURS</span>
                            <div class="contact-value">
                                {!! nl2br(e($company['business_hours'])) !!}
                            </div>
                        </div>
                        @endif
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

    <!-- FINAL CTA -->
    <section class="final-cta">
        <div class="container-max">
            <div class="final-cta-content">
                <h2>Ready to Start?</h2>
                <p>Send us your project details or reach out directly via WhatsApp.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#contact" class="btn btn-primary btn-large">FILL THE FORM ABOVE</a>
                    @if(!empty($company['whatsapp_number']))
                        <a href="https://wa.me/{{ $company['whatsapp_number'] }}?text=Hello%20{{ urlencode($company['company_name'] ?? '') }}!" target="_blank" rel="noopener noreferrer" class="btn btn-outline btn-large">WHATSAPP NOW</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
