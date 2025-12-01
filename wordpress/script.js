// Bonsai Website - Interactive JavaScript for WordPress
jQuery(document).ready(function($) {
    
    // Smooth scrolling for navigation links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var targetId = $(this).attr('href').substring(1);
        var targetElement = $('#' + targetId);
        
        if (targetElement.length) {
            var offsetTop = targetElement.offset().top - 80; // Account for fixed header
            $('html, body').animate({
                scrollTop: offsetTop
            }, 800);
        }
    });

    // Header scroll effect
    var header = $('header');
    var lastScroll = 0;
    
    $(window).on('scroll', function() {
        var currentScroll = $(this).scrollTop();
        
        if (currentScroll > 100) {
            header.css({
                'background': 'rgba(255, 255, 255, 0.95)',
                'backdrop-filter': 'blur(10px)',
                'box-shadow': '0 2px 20px rgba(0, 0, 0, 0.1)'
            });
        } else {
            header.css({
                'background': 'var(--bg-white)',
                'backdrop-filter': 'none',
                'box-shadow': '0 2px 10px rgba(0, 0, 0, 0.05)'
            });
        }
        
        lastScroll = currentScroll;
    });

    // Fade-in animation on scroll
    var observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    // Check if IntersectionObserver is supported
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Stagger animation for multiple elements
                    var fadeInElements = entry.target.querySelectorAll('.fade-in');
                    fadeInElements.forEach(function(el, index) {
                        setTimeout(function() {
                            el.classList.add('visible');
                        }, index * 100);
                    });
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        $('.fade-in').each(function() {
            observer.observe(this);
        });
    } else {
        // Fallback for older browsers
        $('.fade-in').addClass('visible');
    }

    // Gallery lightbox functionality
    $('.gallery-item').on('click', function() {
        var img = $(this).find('img');
        var imgSrc = img.attr('src');
        var imgAlt = img.attr('alt');
        
        // Create lightbox
        var lightbox = $('<div class="lightbox"></div>');
        lightbox.html(`
            <div class="lightbox-content">
                <img src="${imgSrc}" alt="${imgAlt}">
                <button class="lightbox-close">&times;</button>
            </div>
        `);
        
        // Add lightbox styles
        lightbox.css({
            'position': 'fixed',
            'top': '0',
            'left': '0',
            'width': '100%',
            'height': '100%',
            'background': 'rgba(0, 0, 0, 0.9)',
            'z-index': '9999',
            'display': 'flex',
            'align-items': 'center',
            'justify-content': 'center',
            'animation': 'fadeIn 0.3s ease'
        });
        
        var lightboxContent = lightbox.find('.lightbox-content');
        lightboxContent.css({
            'position': 'relative',
            'max-width': '90%',
            'max-height': '90%'
        });
        
        var lightboxImg = lightbox.find('img');
        lightboxImg.css({
            'width': '100%',
            'height': 'auto',
            'border-radius': '10px'
        });
        
        var closeButton = lightbox.find('.lightbox-close');
        closeButton.css({
            'position': 'absolute',
            'top': '-40px',
            'right': '0',
            'background': 'none',
            'border': 'none',
            'color': 'white',
            'font-size': '2rem',
            'cursor': 'pointer',
            'transition': 'transform 0.3s ease'
        });
        
        // Add event listeners
        closeButton.on('click', function() {
            lightbox.remove();
        });
        
        lightbox.on('click', function(e) {
            if (e.target === lightbox[0]) {
                lightbox.remove();
            }
        });
        
        // Add to page
        $('body').append(lightbox);
    });

    // Contact form handling
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var submitButton = form.find('button[type="submit"]');
        
        // Disable submit button
        submitButton.prop('disabled', true).text('Sending...');
        
        // Get form data
        var formData = new FormData(this);
        var data = {};
        formData.forEach(function(value, key) {
            data[key] = value;
        });
        
        // Basic validation
        if (!data.name || !data.email || !data.subject || !data.message) {
            showNotification('Please fill in all required fields.', 'error');
            submitButton.prop('disabled', false).text('Send Message');
            return;
        }
        
        // Email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(data.email)) {
            showNotification('Please enter a valid email address.', 'error');
            submitButton.prop('disabled', false).text('Send Message');
            return;
        }
        
        // Submit form via AJAX
        $.ajax({
            url: bonsai_ajax.ajax_url,
            type: 'POST',
            data: data,
            success: function(response) {
                showNotification('Thank you for your message. We will get back to you soon!', 'success');
                form[0].reset();
            },
            error: function() {
                showNotification('An error occurred. Please try again.', 'error');
            },
            complete: function() {
                submitButton.prop('disabled', false).text('Send Message');
            }
        });
    });

    // Notification system
    function showNotification(message, type) {
        type = type || 'info';
        
        var notification = $('<div class="notification notification-' + type + '"></div>');
        notification.text(message);
        
        // Add notification styles
        notification.css({
            'position': 'fixed',
            'top': '100px',
            'right': '20px',
            'background': type === 'success' ? 'var(--secondary-color)' : type === 'error' ? '#e74c3c' : 'var(--primary-color)',
            'color': 'white',
            'padding': '1rem 2rem',
            'border-radius': '5px',
            'box-shadow': '0 5px 20px rgba(0, 0, 0, 0.2)',
            'z-index': '10000',
            'animation': 'slideInRight 0.3s ease',
            'max-width': '300px'
        });
        
        $('body').append(notification);
        
        // Remove after 5 seconds
        setTimeout(function() {
            notification.css('animation', 'slideOutRight 0.3s ease');
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 5000);
    }

    // Mobile menu toggle
    var mobileMenuBtn = $('#mobile-menu-toggle');
    var navLinks = $('.nav-links');
    
    if (mobileMenuBtn.length) {
        mobileMenuBtn.on('click', function() {
            navLinks.toggle();
            
            if (navLinks.is(':visible')) {
                navLinks.css({
                    'position': 'absolute',
                    'top': '100%',
                    'left': '0',
                    'right': '0',
                    'background': 'white',
                    'flex-direction': 'column',
                    'padding': '1rem',
                    'box-shadow': '0 5px 20px rgba(0, 0, 0, 0.1)'
                });
            }
        });
        
        // Handle window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                navLinks.show().css({
                    'position': '',
                    'top': '',
                    'left': '',
                    'right': '',
                    'background': '',
                    'flex-direction': '',
                    'padding': '',
                    'box-shadow': ''
                });
            } else {
                navLinks.hide();
            }
        });
        
        // Initial check
        if ($(window).width() <= 768) {
            navLinks.hide();
        }
    }

    // Add CSS animations
    if (!$('#bonsai-custom-styles').length) {
        var style = $('<style id="bonsai-custom-styles"></style>');
        style.text(`
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            @keyframes slideInRight {
                from { 
                    opacity: 0;
                    transform: translateX(100px);
                }
                to { 
                    opacity: 1;
                    transform: translateX(0);
                }
            }
            
            @keyframes slideOutRight {
                from { 
                    opacity: 1;
                    transform: translateX(0);
                }
                to { 
                    opacity: 0;
                    transform: translateX(100px);
                }
            }
            
            .fade-in.visible {
                opacity: 1 !important;
                transform: translateY(0) !important;
            }
        `);
        $('head').append(style);
    }

    // Performance optimization - Lazy loading images
    if ('IntersectionObserver' in window) {
        var imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var img = entry.target;
                    img.addClass('loaded');
                    observer.unobserve(img);
                }
            });
        }, {
            threshold: 0,
            rootMargin: '0px 0px 50px 0px'
        });

        $('img').each(function() {
            imageObserver.observe(this);
        });
    } else {
        $('img').addClass('loaded');
    }

    // Add loading state to images
    if (!$('#bonsai-img-styles').length) {
        var imgStyle = $('<style id="bonsai-img-styles"></style>');
        imgStyle.text(`
            img {
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            img.loaded {
                opacity: 1;
            }
        `);
        $('head').append(imgStyle);
    }

    console.log('Bonsai WordPress theme initialized successfully');
});
