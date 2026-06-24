document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector('.promo-slider-wrapper');
    const originalCards = document.querySelectorAll('.procard');
    const nextBtn = document.getElementById('next');
    const backBtn = document.getElementById('back');
    
    const totalCards = originalCards.length;
    const cardWidth = 1250; // 1200px width + 30px gap

    // Exit early if there are no promotional items or just one
    if (totalCards <= 1) return;

    // 1. Clone the first and last cards
    const firstClone = originalCards[0].cloneNode(true);
    const lastClone = originalCards[totalCards - 1].cloneNode(true);

    // 2. Insert clones into the DOM wrapper
    wrapper.appendChild(firstClone); // Add first clone to the very end
    wrapper.insertBefore(lastClone, originalCards[0]); // Add last clone to the very beginning

    // 3. Re-select all cards (now including the 2 clones)
    const allCards = document.querySelectorAll('.procard');

    // Start at index 1 (which is the actual first promotion, index 0 is now the lastClone)
    let currentIndex = 1;

    // Setup initial position instantly without transition animation
    wrapper.style.transition = 'none';
    wrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
    allCards[currentIndex].classList.add('active');

    // Flag to prevent button spamming during transition resets
    let isTransitioning = false;

    function moveSlider() {
        isTransitioning = true;
        wrapper.style.transition = 'transform 0.5s ease-in-out';
        wrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        
        // Update opacity active classes dynamically
        // allCards.forEach((card, index) => {
        //     if (index === currentIndex) {
        //         card.classList.add('active');
        //     } else {
        //         card.classList.remove('active');
        //     }
        // });
    }

    // The Magic: Listen for the moment the slide animation finishes
    wrapper.addEventListener('transitionend', function() {
        isTransitioning = false;

        // If we slid into the First Card Clone (at the very end)
        if (currentIndex === allCards.length - 1) {
            wrapper.style.transition = 'none'; // Turn off animation
            currentIndex = 1; // Snap instantly back to real first card
            wrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
            updateInstantActive();
        }

        // If we slid into the Last Card Clone (at the very beginning)
        if (currentIndex === 0) {
            wrapper.style.transition = 'none'; // Turn off animation
            currentIndex = totalCards; // Snap instantly back to real last card
            wrapper.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
            updateInstantActive();
        }
    });

    // Helper to keep active classes updated during the instant snap reset
    function updateInstantActive() {
        allCards.forEach((card, index) => {
            if (index === currentIndex) {
                card.classList.add('active');
            } else {
                card.classList.remove('active');
            }
        });
    }

    nextBtn.addEventListener('click', function() {
        if (isTransitioning) return;
        currentIndex++;
        moveSlider();
    });

    backBtn.addEventListener('click', function() {
        if (isTransitioning) return;
        currentIndex--;
        moveSlider();
    });
});