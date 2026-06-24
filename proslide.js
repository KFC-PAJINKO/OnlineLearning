document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector('.promo-slider-wrapper');
    const cards = document.querySelectorAll('.procard');
    const nextBtn = document.getElementById('next');
    const backBtn = document.getElementById('back');
    
    let currentIndex = 0;
    const totalCards = cards.length;
    const cardWidth = 1230; // Matches your .procard width

    // Exit early if there are no promotional items
    if (totalCards === 0) return;
    cards[0].classList.add('active');

    function updateSlider() {
        // 1. Move the slider (Wait, check the 'Important Catch' below about the math!)
        wrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;

        // 2. Loop through all cards to change their opacity
        cards.forEach(function(card, index) {
            if (index === currentIndex) {
                card.classList.add('active'); // Highlight the current card
            } else {
                card.classList.remove('active'); // Fade out the others
            }
        });
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