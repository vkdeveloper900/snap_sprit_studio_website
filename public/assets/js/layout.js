// ===================================
// GLOBAL LAYOUT JAVASCRIPT
// ===================================

document.addEventListener('DOMContentLoaded', function() {
    console.log('Layout JS loaded');

    // Add any global event listeners or initialization here
});

// Utility Functions
const Utils = {
    // Show alert with message
    alert: function(message, type = 'info') {
        console.log(`[${type.toUpperCase()}] ${message}`);
    },

    // Format currency
    formatCurrency: function(amount) {
        return new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR'
        }).format(amount);
    },

    // Show loading spinner
    showLoader: function() {
        // Add loader element to DOM
    },

    // Hide loading spinner
    hideLoader: function() {
        // Remove loader from DOM
    },

    // API Call wrapper
    apiCall: function(url, method = 'GET', data = null) {
        return fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
            },
            body: data ? JSON.stringify(data) : null
        });
    }
};

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    });
});