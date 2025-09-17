// Custom JavaScript for Econ Fresh - public/js/custom.js

document.addEventListener('DOMContentLoaded', function() {
    console.log('Econ Fresh custom JavaScript loaded!');
    
    // Flash message auto-dismiss
    setTimeout(function() {
        const flashMessages = document.querySelectorAll('.bg-green-50, .bg-red-50');
        flashMessages.forEach(function(message) {
            message.style.transition = 'opacity 0.5s ease';
            message.style.opacity = '0';
            setTimeout(function() {
                if (message.parentNode) {
                    message.parentNode.removeChild(message);
                }
            }, 500);
        });
    }, 5000);

    // Add to cart functionality
    var addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            var productId = this.getAttribute('data-product-id');
            alert('Added product ' + productId + ' to cart!');
            
            // Visual feedback
            this.textContent = 'Added!';
            this.classList.add('bg-green-700');
            setTimeout(function() {
                button.textContent = 'Add to Cart';
                button.classList.remove('bg-green-700');
            }, 2000);
        });
    });

    // Product card animations
    var productCards = document.querySelectorAll('.product-card');
    productCards.forEach(function(card, index) {
        card.style.animationDelay = (index * 0.1) + 's';
    });
});