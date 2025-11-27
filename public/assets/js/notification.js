// Enhanced notification system
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.notification-alert');
    
    alerts.forEach(function(alert) {
        // Add click to dismiss functionality
        alert.addEventListener('click', function(e) {
            if (!e.target.classList.contains('btn-close')) {
                dismissAlert(alert);
            }
        });
        
        // Auto hide after 5 seconds for auto-hide alerts
        if (alert.classList.contains('auto-hide')) {
            setTimeout(function() {
                dismissAlert(alert);
            }, 5000);
        }
    });
    
    function dismissAlert(alert) {
        if (alert && alert.parentNode) {
            alert.style.animation = 'fadeOut 0.5s ease-in forwards';
            setTimeout(function() {
                if (alert && alert.parentNode) {
                    alert.remove();
                }
            }, 500);
        }
    }
    
    // Add hover pause functionality
    alerts.forEach(function(alert) {
        if (alert.classList.contains('auto-hide')) {
            let timeoutId;
            
            alert.addEventListener('mouseenter', function() {
                alert.style.animationPlayState = 'paused';
            });
            
            alert.addEventListener('mouseleave', function() {
                alert.style.animationPlayState = 'running';
            });
        }
    });
});