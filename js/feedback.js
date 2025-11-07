document.addEventListener('DOMContentLoaded', () => {
    const starRating = document.getElementById('starRating');
    const stars = starRating.querySelectorAll('.star');
    const ratingMascot = document.getElementById('ratingMascot'); 
    const feedbackText = document.getElementById('feedbackText');
    const ratingValueInput = document.getElementById('ratingValue'); 
    const ratingForm = document.getElementById('ratingCard'); 
    const thankYouMessage = document.getElementById('thankYouMessage');
    const commentInput = document.getElementById('comment'); 
    const ratingData = {
        0: { mascotUrl: '../resources/Project_Mascot_Default.png', text: 'Feel free to leave your feedback! :D' }, 
        1: { mascotUrl: '../resources/Project_Mascot_1.png', text: 'Tell us how we can improve.' },
        2: { mascotUrl: '../resources/Project_Mascot_2.png', text: 'We\'re sorry to hear that. Your feedback matters.' },
        3: { mascotUrl: '../resources/Project_Mascot_3.png', text: 'We appreciate your rating! Feel free to leave a comment.' },
        4: { mascotUrl: '../resources/Project_Mascot_4.png', text: 'We\'re happy you enjoyed it.' },
        5: { mascotUrl: '../resources/Project_Mascot_5.png', text: 'Thank you for the wonderful score! :D' }
    };

    let currentRating = 0; 

    const updateRatingUI = (rating) => {
        stars.forEach(star => {
            const starValue = parseInt(star.dataset.rating);
            if (starValue <= rating && rating > 0) { 
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });

        const data = ratingData[rating];
        if (data) {
            
            if (ratingMascot) { 
                ratingMascot.src = data.mascotUrl; 
            }
            
            feedbackText.textContent = data.text;
        }
        currentRating = rating;
        
        if (ratingValueInput) {
            ratingValueInput.value = currentRating;
        }
    };

    updateRatingUI(currentRating);

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = parseInt(star.dataset.rating);
            
            if (rating === currentRating && rating > 0) {
                updateRatingUI(0);
            } else {
                updateRatingUI(rating);
            }
        });
    });

    if (ratingForm) {
        ratingForm.addEventListener('submit', (e) => {
            e.preventDefault(); 

            console.log('Rating:', currentRating);
            console.log('Comment:', commentInput.value.trim());

            if (ratingForm && thankYouMessage) {
                 ratingForm.classList.add('hidden'); 
                 thankYouMessage.classList.remove('hidden'); 
            }
        });
    }
});