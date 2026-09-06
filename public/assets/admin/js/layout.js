// ===================================
// ADMIN PANEL JAVASCRIPT
// ===================================

document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin Layout JS loaded');

    initAdminPanel();
});

// Initialize Admin Panel
function initAdminPanel() {
    // Initialize sidebar navigation
    initSidebarNav();

    // Initialize form handlers
    initFormHandlers();

    // Initialize table interactions
    initTableInteractions();

    // Initialize modals
    initModals();
}

// Sidebar Navigation
function initSidebarNav() {
    const navLinks = document.querySelectorAll('.sidebar-nav a');

    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });
}

// Form Handlers
function initFormHandlers() {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // Can add form validation here
            console.log('Form submitted:', this);
        });
    });
}

// Table Interactions
function initTableInteractions() {
    const deleteButtons = document.querySelectorAll('[data-action="delete"]');

    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this item?')) {
                // Perform delete action
                console.log('Delete action confirmed');
            }
        });
    });
}

// Modal Functions
function initModals() {
    // Add modal initialization logic
}

// Admin Utilities
const AdminUtils = {
    // Show notification
    notify: function(message, type = 'info') {
        console.log(`[${type.toUpperCase()}] ${message}`);
        // Create and show notification element
    },

    // Confirm action
    confirm: function(message) {
        return window.confirm(message);
    },

    // Handle API errors
    handleError: function(error) {
        console.error('Error:', error);
        this.notify(error.message || 'An error occurred', 'error');
    },

    // Delete item with confirmation
    deleteItem: function(url, id) {
        if (this.confirm('Are you sure you want to delete this?')) {
            return fetch(`${url}/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                }
            });
        }
    },

    // Redirect to URL
    redirect: function(url) {
        window.location.href = url;
    }
};

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = AdminUtils;
}