// Custom JavaScript for Econ Fresh
document.addEventListener('DOMContentLoaded', function() {
    console.log('Econ Fresh loaded!');
    
    // Flash message auto-dismiss
    const flashMessages = document.querySelectorAll('[class*="bg-green-50"], [class*="bg-red-50"]');
    flashMessages.forEach(message => {
        setTimeout(() => {
            message.style.transition = 'opacity 0.5s ease';
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 500);
        }, 5000);
    });

    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            alert(`Added product ${productId} to cart!`);
        });
    });
});