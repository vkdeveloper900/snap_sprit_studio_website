// ===================================
// WEBSITE LAYOUT JAVASCRIPT
// ===================================

document.addEventListener('DOMContentLoaded', function() {
    console.log('Website Layout JS loaded');

    initWebsite();
});

// Initialize Website
function initWebsite() {
    // Mobile menu toggle
    initMobileMenu();

    // Smooth scroll navigation
    initSmoothScroll();

    // Form validation
    initFormValidation();

    // Gallery/Lightbox
    initGallery();

    // Lazy loading
    initLazyLoad();

    // Scroll animations
    initScrollAnimations();
}

// Mobile Menu
function initMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.navbar-menu');

    if (hamburger) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    // Close menu when link clicked
    const navLinks = document.querySelectorAll('.navbar-menu a');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navMenu.classList.remove('active');
        });
    });
}

// Smooth Scroll
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
}

// Form Validation
function initFormValidation() {
    const form = document.querySelector('form[data-validate]');

    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
            }
        });
    }
}

function validateForm(form) {
    const name = form.querySelector('input[name="name"]');
    const email = form.querySelector('input[name="email"]');
    const phone = form.querySelector('input[name="phone"]');

    let isValid = true;

    // Validate name
    if (name && name.value.trim().length < 2) {
        showError(name, 'Name must be at least 2 characters');
        isValid = false;
    }

    // Validate email
    if (email && !isValidEmail(email.value)) {
        showError(email, 'Invalid email address');
        isValid = false;
    }

    // Validate phone
    if (phone && phone.value && !isValidPhone(phone.value)) {
        showError(phone, 'Invalid phone number');
        isValid = false;
    }

    return isValid;
}

function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function isValidPhone(phone) {
    const regex = /^[\d\s+\-()]+$/;
    return regex.test(phone) && phone.length >= 10;
}

function showError(element, message) {
    element.classList.add('error');
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    element.parentNode.appendChild(errorDiv);
}

// Gallery/Lightbox
function initGallery() {
    const galleryItems = document.querySelectorAll('[data-gallery]');

    galleryItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            openLightbox(this.getAttribute('href'));
        });
    });
}

function openLightbox(imageSrc) {
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.innerHTML = `
        <div class="lightbox-content">
            <img src="${imageSrc}" alt="Gallery Image">
            <button class="lightbox-close">&times;</button>
        </div>
    `;

    document.body.appendChild(lightbox);

    lightbox.querySelector('.lightbox-close').addEventListener('click', function() {
        lightbox.remove();
    });

    lightbox.addEventListener('click', function(e) {
        if (e.target === this) {
            this.remove();
        }
    });

    // Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            lightbox.remove();
        }
    });
}

// Lazy Loading
function initLazyLoad() {
    const images = document.querySelectorAll('img[loading="lazy"]');

    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('loading');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }
}

// Scroll Animations
function initScrollAnimations() {
    const elements = document.querySelectorAll('[data-animate]');

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        elements.forEach(el => observer.observe(el));
    }
}

// Website Utilities
const WebsiteUtils = {
    // Track event
    trackEvent: function(eventName, data = {}) {
        console.log(`Event: ${eventName}`, data);
        // Send to analytics service
    },

    // Submit form via AJAX
    submitFormAJAX: function(form) {
        const formData = new FormData(form);
        return fetch(form.action, {
            method: form.method || 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
            }
        });
    },

    // Format phone for display
    formatPhone: function(phone) {
        return phone.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
    }
};

// Export for use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = WebsiteUtils;
}