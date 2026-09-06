/* ================================================
   SNAP SPIRIT STUDIO - MAIN JAVASCRIPT
   ================================================ */

// ================================================
// MOBILE MENU TOGGLE
// ================================================

document.addEventListener('DOMContentLoaded', function() {
  const mobileToggle = document.querySelector('.mobile-toggle');
  const navbarMenu = document.querySelector('.navbar-menu');

  if (mobileToggle) {
    mobileToggle.addEventListener('click', function() {
      navbarMenu.classList.toggle('show');
    });

    // Close menu when clicking on a link
    const navLinks = navbarMenu.querySelectorAll('a');
    navLinks.forEach(link => {
      link.addEventListener('click', function() {
        navbarMenu.classList.remove('show');
      });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
      if (!event.target.closest('.navbar-container')) {
        navbarMenu.classList.remove('show');
      }
    });
  }
});

// ================================================
// NAVBAR SCROLL EFFECT
// ================================================

window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

// ================================================
// SMOOTH SCROLLING FOR ANCHOR LINKS
// ================================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// ================================================
// INTERSECTION OBSERVER FOR SCROLL ANIMATIONS
// ================================================

const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate-fade-up');
      observer.unobserve(entry.target);
    }
  });
}, observerOptions);

document.querySelectorAll('.work-item, .service-card, .team-member:not(.marquee-card), .testimonial-card:not(.marquee-card), .gallery-item, .client-logo:not(.marquee-card)').forEach(el => {
  observer.observe(el);
});

// ================================================
// GALLERY FILTERING
// ================================================

function initGalleryFilter() {
  const filterButtons = document.querySelectorAll('.filter-btn');
  const galleryItems = document.querySelectorAll('.gallery-item');

  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Remove active class from all buttons
      filterButtons.forEach(btn => btn.classList.remove('active'));
      // Add active class to clicked button
      this.classList.add('active');

      const filterValue = this.getAttribute('data-filter');

      // Filter gallery items
      galleryItems.forEach(item => {
        if (filterValue === 'all') {
          item.classList.remove('hidden');
          setTimeout(() => {
            item.style.opacity = '1';
          }, 10);
        } else {
          const itemCategory = item.getAttribute('data-category');
          if (itemCategory === filterValue) {
            item.classList.remove('hidden');
            setTimeout(() => {
              item.style.opacity = '1';
            }, 10);
          } else {
            item.style.opacity = '0';
            setTimeout(() => {
              item.classList.add('hidden');
            }, 300);
          }
        }
      });
    });
  });

  // Set initial filter to 'all'
  const allButton = document.querySelector('[data-filter="all"]');
  if (allButton) {
    allButton.classList.add('active');
  }
}

// ================================================
// GALLERY LIGHTBOX / MODAL
// ================================================

function initGalleryModal() {
  const galleryItems = document.querySelectorAll('.gallery-item:not(.hidden)');
  const modal = document.querySelector('#galleryModal');

  if (!modal) return;

  const modalContent = modal.querySelector('.modal-content');
  const closeBtn = modal.querySelector('.modal-close');
  const prevBtn = modal.querySelector('.modal-prev');
  const nextBtn = modal.querySelector('.modal-next');

  let currentIndex = 0;

  function openModal(index) {
    const visibleItems = Array.from(galleryItems).filter(item => !item.classList.contains('hidden'));
    if (visibleItems.length === 0) return;

    currentIndex = index % visibleItems.length;
    const img = visibleItems[currentIndex].querySelector('img');

    if (img) {
      modalContent.src = img.src;
      modalContent.alt = img.alt;
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeModal() {
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
  }

  function nextImage() {
    const visibleItems = Array.from(galleryItems).filter(item => !item.classList.contains('hidden'));
    currentIndex = (currentIndex + 1) % visibleItems.length;
    const img = visibleItems[currentIndex].querySelector('img');
    if (img) {
      modalContent.src = img.src;
      modalContent.alt = img.alt;
    }
  }

  function prevImage() {
    const visibleItems = Array.from(galleryItems).filter(item => !item.classList.contains('hidden'));
    currentIndex = (currentIndex - 1 + visibleItems.length) % visibleItems.length;
    const img = visibleItems[currentIndex].querySelector('img');
    if (img) {
      modalContent.src = img.src;
      modalContent.alt = img.alt;
    }
  }

  // Add click listeners to gallery items
  galleryItems.forEach((item, index) => {
    item.addEventListener('click', function() {
      const visibleItems = Array.from(galleryItems).filter(el => !el.classList.contains('hidden'));
      const visibleIndex = visibleItems.indexOf(this);
      openModal(visibleIndex);
    });
  });

  // Close button
  if (closeBtn) {
    closeBtn.addEventListener('click', closeModal);
  }

  // Previous/Next buttons
  if (prevBtn) {
    prevBtn.addEventListener('click', prevImage);
  }
  if (nextBtn) {
    nextBtn.addEventListener('click', nextImage);
  }

  // Close when clicking outside the image
  modal.addEventListener('click', function(e) {
    if (e.target === modal) {
      closeModal();
    }
  });

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (!modal.classList.contains('show')) return;

    if (e.key === 'Escape') {
      closeModal();
    } else if (e.key === 'ArrowLeft') {
      prevImage();
    } else if (e.key === 'ArrowRight') {
      nextImage();
    }
  });
}

// ================================================
// ACCORDION / FAQ
// ================================================

function initAccordion() {
  const accordionHeaders = document.querySelectorAll('.accordion-header');

  accordionHeaders.forEach(header => {
    header.addEventListener('click', function() {
      const item = this.parentElement;
      const body = this.nextElementSibling;
      const isActive = item.classList.contains('active');

      // Close all other accordions
      document.querySelectorAll('.accordion-item').forEach(el => {
        el.classList.remove('active');
        el.querySelector('.accordion-body').classList.remove('active');
      });

      // Open clicked accordion if it wasn't active
      if (!isActive) {
        item.classList.add('active');
        body.classList.add('active');
      }
    });
  });
}

// ================================================
// FORM VALIDATION
// ================================================

function initFormValidation() {
  const form = document.querySelector('.contact-form');
  if (!form) return;

  const submitBtn = form.querySelector('.btn');

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    let isValid = true;
    const fields = form.querySelectorAll('.form-control');

    fields.forEach(field => {
      if (!validateField(field)) {
        isValid = false;
      }
    });

    if (isValid) {
      // Form is valid - you can submit here
      showSuccessMessage();
      form.reset();
      fields.forEach(field => {
        field.classList.remove('error');
      });
    }
  });

  // Real-time validation on blur
  const fields = form.querySelectorAll('.form-control');
  fields.forEach(field => {
    field.addEventListener('blur', function() {
      validateField(this);
    });

    field.addEventListener('input', function() {
      if (this.classList.contains('error')) {
        validateField(this);
      }
    });
  });
}

function validateField(field) {
  const value = field.value.trim();
  const type = field.type;
  const name = field.name;
  let isValid = true;

  // Remove error class initially
  field.classList.remove('error');
  const errorMsg = field.nextElementSibling;
  if (errorMsg && errorMsg.classList.contains('form-error')) {
    errorMsg.textContent = '';
  }

  // Check if empty
  if (value === '' && name !== 'message') {
    isValid = false;
    setFieldError(field, 'This field is required');
  }

  // Email validation
  if (name === 'email' && value !== '') {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(value)) {
      isValid = false;
      setFieldError(field, 'Please enter a valid email address');
    }
  }

  // Phone validation
  if (name === 'phone' && value !== '') {
    const phoneRegex = /^[0-9\s\-\+\(\)]+$/;
    if (!phoneRegex.test(value) || value.length < 8) {
      isValid = false;
      setFieldError(field, 'Please enter a valid phone number');
    }
  }

  return isValid;
}

function setFieldError(field, message) {
  field.classList.add('error');
  let errorMsg = field.nextElementSibling;

  if (!errorMsg || !errorMsg.classList.contains('form-error')) {
    errorMsg = document.createElement('div');
    errorMsg.classList.add('form-error');
    field.parentElement.insertBefore(errorMsg, field.nextElementSibling);
  }

  errorMsg.textContent = message;
}

function showSuccessMessage() {
  // Create and show success message
  const form = document.querySelector('.contact-form');
  const successMsg = document.createElement('div');
  successMsg.classList.add('alert', 'alert-success');
  successMsg.textContent = 'Thank you! We\'ll get back to you soon.';
  successMsg.style.cssText = `
    background-color: #d4edda;
    color: #155724;
    padding: 1rem;
    border-radius: 4px;
    margin-bottom: 1.5rem;
    animation: fadeIn 0.3s ease;
  `;

  form.parentElement.insertBefore(successMsg, form);

  setTimeout(() => {
    successMsg.remove();
  }, 5000);
}

// ================================================
// WORK PORTFOLIO MODAL
// ================================================

function initWorkModal() {
  const workItems = document.querySelectorAll('.work-item');

  workItems.forEach(item => {
    item.addEventListener('click', function() {
      const title = this.querySelector('.work-title')?.textContent || 'Project';
      const category = this.querySelector('.work-category')?.textContent || 'Category';
      const img = this.querySelector('img');

      // Could expand with a detailed project page
      console.log('Clicked work item:', title);
    });
  });
}

// ================================================
// SOCIAL MEDIA LINKS
// ================================================

function setupSocialLinks() {
  const instagramLink = document.querySelector('[href*="instagram"]');
  if (instagramLink) {
    instagramLink.setAttribute('target', '_blank');
    instagramLink.setAttribute('rel', 'noopener noreferrer');
  }

  const facebookLink = document.querySelector('[href*="facebook"]');
  if (facebookLink) {
    facebookLink.setAttribute('target', '_blank');
    facebookLink.setAttribute('rel', 'noopener noreferrer');
  }

  const youtubeLink = document.querySelector('[href*="youtube"]');
  if (youtubeLink) {
    youtubeLink.setAttribute('target', '_blank');
    youtubeLink.setAttribute('rel', 'noopener noreferrer');
  }
}

// ================================================
// WHATSAPP LINK
// ================================================

function setupWhatsAppLink() {
  const whatsappBtn = document.querySelector('[href*="whatsapp"], [href*="wa.me"]');
  if (whatsappBtn) {
    whatsappBtn.setAttribute('target', '_blank');
    whatsappBtn.setAttribute('rel', 'noopener noreferrer');
  }
}

// ================================================
// SHOW REEL BUTTON
// ================================================

function setupShowreelButton() {
  const showreelBtn = document.querySelector('.showreel-button');
  if (showreelBtn) {
    showreelBtn.addEventListener('click', function() {
      // Could open a video modal or navigate to a video page
      alert('Video showreel would play here. Replace with your actual video link.');
    });
  }
}

// ================================================
// LOAD MORE / PAGINATION
// ================================================

function setupLoadMore() {
  const loadMoreBtn = document.querySelector('.load-more');
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function() {
      // Load more projects/items
      console.log('Load more clicked');
    });
  }
}

// ================================================
// LAZY LOAD IMAGES
// ================================================

function initLazyLoadImages() {
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
          }
          imageObserver.unobserve(img);
        }
      });
    });

    document.querySelectorAll('img.lazy').forEach(img => {
      imageObserver.observe(img);
    });
  }
}

// ================================================
// HERO VIDEO HOVER EFFECT
// ================================================

function initHeroVideoHover() {
  const heroSection = document.querySelector('.hero');
  const heroVideo = document.querySelector('.hero-video');

  if (!heroSection || !heroVideo) return;

  // Play video on hover
  heroSection.addEventListener('mouseenter', function() {
    heroVideo.classList.add('play');
    heroSection.classList.add('video-playing');
    heroVideo.play().catch(err => console.log('Video play failed:', err));
  });

  // Pause video on mouse leave
  heroSection.addEventListener('mouseleave', function() {
    heroVideo.classList.remove('play');
    heroSection.classList.remove('video-playing');
    heroVideo.pause();
    heroVideo.currentTime = 0;
  });
}

// ================================================
// SCROLL INDICATOR CLICK TO SCROLL
// ================================================

function initScrollIndicatorClick() {
  const scrollIndicator = document.querySelector('.scroll-indicator');

  if (!scrollIndicator) return;

  scrollIndicator.style.cursor = 'pointer';

  scrollIndicator.addEventListener('click', function() {
    const heroSection = document.querySelector('.hero');
    const nextSection = heroSection.nextElementSibling;

    if (nextSection) {
      nextSection.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });

  // Add hover effect
  scrollIndicator.addEventListener('mouseenter', function() {
    scrollIndicator.style.opacity = '0.8';
  });

  scrollIndicator.addEventListener('mouseleave', function() {
    scrollIndicator.style.opacity = '1';
  });
}

// ================================================
// INITIALIZE ALL
// ================================================

document.addEventListener('DOMContentLoaded', function() {
  // Initialize components
  initGalleryFilter();
  initGalleryModal();
  initAccordion();
  initFormValidation();
  initWorkModal();
  setupSocialLinks();
  setupWhatsAppLink();
  setupShowreelButton();
  setupLoadMore();
  initLazyLoadImages();
  initGoToTopButton();
  initHeroVideoHover();
  initScrollIndicatorClick();

  console.log('Snap Spirit Studio - Website Initialized');
});

// ================================================
// GO TO TOP BUTTON
// ================================================

function initGoToTopButton() {
  const goToTopBtn = document.getElementById('goToTop');

  if (!goToTopBtn) return;

  // Show/hide button on scroll
  window.addEventListener('scroll', function() {
    if (window.scrollY > 300) {
      goToTopBtn.classList.add('show');
    } else {
      goToTopBtn.classList.remove('show');
    }
  });

  // Scroll to top on click
  goToTopBtn.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
}

// ================================================
// PAGE LOAD ANIMATION
// ================================================

window.addEventListener('load', function() {
  document.body.classList.add('loaded');
});

// ================================================
// UTILITY FUNCTIONS
// ================================================

// Get element by ID shorthand
const getById = (id) => document.getElementById(id);

// Add class to element
const addClass = (el, className) => el?.classList.add(className);

// Remove class from element
const removeClass = (el, className) => el?.classList.remove(className);

// Toggle class
const toggleClass = (el, className) => el?.classList.toggle(className);

// Query selector shorthand
const $ = (selector) => document.querySelector(selector);
const $$ = (selector) => document.querySelectorAll(selector);
