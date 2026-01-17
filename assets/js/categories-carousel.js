// Categories Carousel JS
// Handles left/right arrow scroll for the carousel

document.addEventListener('DOMContentLoaded', function() {
    var carousel = document.querySelector('.categories-carousel');
    var leftArrow = document.querySelector('.carousel-arrow.left');
    var rightArrow = document.querySelector('.carousel-arrow.right');
    if (!carousel || !leftArrow || !rightArrow) return;

    leftArrow.addEventListener('click', function() {
        carousel.scrollBy({ left: -220, behavior: 'smooth' });
    });
    rightArrow.addEventListener('click', function() {
        carousel.scrollBy({ left: 220, behavior: 'smooth' });
    });
});
