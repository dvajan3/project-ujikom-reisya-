// ===== REISYA MAJALAH - ENHANCED UI INTERACTIONS =====

document.addEventListener('DOMContentLoaded', function() {
    
    // ===== CURRENT DATE DISPLAY =====
    function updateCurrentDate() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        const dateString = now.toLocaleDateString('en-US', options);
        const dateElement = document.getElementById('current-date');
        if (dateElement) {
            dateElement.textContent = dateString;
        }
    }
    
    updateCurrentDate();
    
    // ===== SCROLL TO TOP BUTTON =====
    function createScrollToTopButton() {
        const scrollBtn = document.createElement('div');
        scrollBtn.className = 'scroll-top';
        scrollBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
        scrollBtn.setAttribute('title', 'Back to Top');
        document.body.appendChild(scrollBtn);
        
        // Show/hide scroll button
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollBtn.classList.add('show');
            } else {
                scrollBtn.classList.remove('show');
            }
        });
        
        // Smooth scroll to top
        scrollBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    createScrollToTopButton();
    
    // ===== SMOOTH SCROLL FOR ANCHOR LINKS =====
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
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
    
    // ===== ANIMATE ON SCROLL =====
    function animateOnScroll() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        elements.forEach(element => {
            observer.observe(element);
        });
    }
    
    animateOnScroll();
    
    // ===== ENHANCED SEARCH FUNCTIONALITY =====
    const searchForms = document.querySelectorAll('.search-form');
    const newsletterForms = document.querySelectorAll('.newsletter-form');
    
    // Handle search forms (don't prevent default)
    searchForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const input = this.querySelector('input[name="q"]');
            if (!input || !input.value.trim()) {
                e.preventDefault();
                showNotification('Please enter a search term', 'warning');
                return;
            }
        });
    });
    
    // Handle newsletter forms (prevent default and show success)
    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            // Add loading state
            button.classList.add('btn-loading');
            button.disabled = true;
            
            // Simulate newsletter submission
            setTimeout(() => {
                button.classList.remove('btn-loading');
                button.disabled = false;
                button.innerHTML = originalText;
                
                showNotification('Successfully subscribed to newsletter!', 'success');
            }, 2000);
        });
    });
    
    // ===== NOTIFICATION SYSTEM =====
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed`;
        notification.style.cssText = `
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.3s ease;
        `;
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-circle' : 'info-circle'} me-2"></i>
                <span>${message}</span>
                <button type="button" class="btn-close ms-auto" onclick="this.parentElement.parentElement.remove()"></button>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }
    
    // ===== ENHANCED IMAGE LOADING =====
    const images = document.querySelectorAll('img');
    images.forEach(img => {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        
        img.addEventListener('error', function() {
            this.src = '/assets/img/blog/default.jpg';
            this.alt = 'Image not available';
        });
    });
    
    // ===== FLOATING LOGO ANIMATION =====
    const floatingLogo = document.querySelector('.floating-logo');
    if (floatingLogo) {
        let isAnimating = false;
        
        window.addEventListener('scroll', function() {
            if (!isAnimating) {
                isAnimating = true;
                requestAnimationFrame(() => {
                    const scrolled = window.pageYOffset;
                    const rate = scrolled * -0.5;
                    floatingLogo.style.transform = `translateY(${rate}px)`;
                    isAnimating = false;
                });
            }
        });
    }
    
    // ===== ENHANCED DROPDOWN BEHAVIOR =====
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');
        
        if (toggle && menu) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                menu.classList.toggle('show');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
        }
    });
    
    // ===== LAZY LOADING FOR IMAGES =====
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // ===== ENHANCED FORM VALIDATION =====
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
            
            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    validateField(this);
                }
            });
        });
    });
    
    function validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        let message = '';
        
        // Required field validation
        if (field.hasAttribute('required') && !value) {
            isValid = false;
            message = 'This field is required';
        }
        
        // Email validation
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                message = 'Please enter a valid email address';
            }
        }
        
        // Update field appearance
        field.classList.toggle('is-invalid', !isValid);
        field.classList.toggle('is-valid', isValid && value);
        
        // Show/hide error message
        let errorElement = field.parentNode.querySelector('.invalid-feedback');
        if (!isValid && message) {
            if (!errorElement) {
                errorElement = document.createElement('div');
                errorElement.className = 'invalid-feedback';
                field.parentNode.appendChild(errorElement);
            }
            errorElement.textContent = message;
        } else if (errorElement) {
            errorElement.remove();
        }
        
        return isValid;
    }
    
    // ===== PERFORMANCE OPTIMIZATION =====
    // Debounce function for scroll events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // ===== ACCESSIBILITY ENHANCEMENTS =====
    // Add keyboard navigation for custom elements
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Close all dropdowns and modals
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
    
    // ===== THEME DETECTION =====
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.body.classList.add('dark-theme');
    }
    
    // ===== CONSOLE WELCOME MESSAGE =====
    console.log('%c🚀 Reisya Majalah', 'color: #2563eb; font-size: 24px; font-weight: bold;');
    console.log('%cWelcome to our digital magazine platform!', 'color: #64748b; font-size: 14px;');
    
});

// ===== UTILITY FUNCTIONS =====
window.ReisyaMajalah = {
    showNotification: function(message, type = 'info') {
        // This function is available globally
        const event = new CustomEvent('showNotification', {
            detail: { message, type }
        });
        document.dispatchEvent(event);
    },
    
    scrollToElement: function(selector) {
        const element = document.querySelector(selector);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    },
    
    toggleTheme: function() {
        document.body.classList.toggle('dark-theme');
        localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
    }
};