// Handle broken images with fallback
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img');
    
    images.forEach(function(img) {
        img.addEventListener('error', function() {
            const placeholder = document.createElement('div');
            placeholder.className = 'image-placeholder';
            placeholder.style.width = this.offsetWidth + 'px' || '100%';
            placeholder.style.height = this.offsetHeight + 'px' || '200px';
            placeholder.innerHTML = '<i class="fas fa-image"></i><br>Image not found';
            
            this.parentNode.replaceChild(placeholder, this);
        });
    });
});