document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector('.promo-slider-wrapper');
    const cards = document.querySelectorAll('.procard');
    const nextBtn = document.getElementById('next');
    const backBtn = document.getElementById('back');
    
    let currentIndex = 0;
    const totalCards = cards.length;
    const cardWidth = 1200; // Matches your .procard width

    // Exit early if there are no promotional items
    if (totalCards === 0) return;

    function updateSlider() {
        // Shift the long strip left by multiplying the index by the card width
        wrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
    }

    nextBtn.addEventListener('click', function() {
        if (currentIndex < totalCards - 1) {
            currentIndex++;
        } else {
            currentIndex = 0; // Loops back to the first card
        }
        updateSlider();
    });

    backBtn.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalCards - 1; // Loops forward to the last card
        }
        updateSlider();
    });
});