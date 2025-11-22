document.addEventListener('DOMContentLoaded', () => {
    const starRating = document.getElementById('starRating');
    const stars = starRating.querySelectorAll('.star');
    const ratingMascot = document.getElementById('ratingMascot');
    const feedbackText = document.getElementById('feedbackText');
    const ratingValueInput = document.getElementById('ratingValue');
    const ratingForm = document.getElementById('ratingCard');
    
    const errorMessage = document.getElementById('errorMessage');
    const errorText = document.getElementById('errorText');
    const summaryDashboard = document.getElementById('summaryDashboard');
    const reviewsList = document.getElementById('reviewsList');
    const avgScoreDisplay = document.getElementById('avgScoreDisplay');
    const avgStarsDisplay = document.getElementById('avgStarsDisplay');
    const totalCountDisplay = document.getElementById('totalCountDisplay');
    const backBtn = document.getElementById('backBtn');

    let allReviews = [];

    const starSvgCode = `
        <svg viewBox="0 0 24 24" class="star-svg">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
        </svg>
    `;
    stars.forEach(star => star.innerHTML = starSvgCode);

    const ratingData = {
        0: { mascotUrl: '../resources/Project_Mascot_Default.png', text: 'Feel free to leave your feedback! :D' },
        1: { mascotUrl: '../resources/Project_Mascot_1.png', text: 'Tell us how we can improve.' },
        2: { mascotUrl: '../resources/Project_Mascot_2.png', text: 'We\'re sorry to hear that. Your feedback matters.' },
        3: { mascotUrl: '../resources/Project_Mascot_3.png', text: 'We appreciate your rating! Feel free to leave a comment.' },
        4: { mascotUrl: '../resources/Project_Mascot_4.png', text: 'We\'re happy you enjoyed it.' },
        5: { mascotUrl: '../resources/Project_Mascot_5.png', text: 'Thank you for the wonderful score! :D' }
    };

    let currentRating = 0;

    const loadReviewsFromServer = async () => {
        try {
            const response = await fetch('../php/feedback.php');
            if (!response.ok) throw new Error('Connect failed');
            
            const data = await response.json();
            
            allReviews = Array.isArray(data) ? data : []; 
            
            console.log("Loaded Real Data:", allReviews);
        } catch (error) {
            console.error("Error loading reviews:", error);
            allReviews = [];
        }
    };

    loadReviewsFromServer();

    const updateRatingUI = (rating) => {
        hideError(); 
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
            if (ratingMascot) ratingMascot.src = data.mascotUrl;
            feedbackText.textContent = data.text;
        }
        currentRating = rating;
        if (ratingValueInput) ratingValueInput.value = currentRating;
    };

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

    const showError = (message) => {
        errorMessage.classList.remove('hidden');
        errorText.textContent = message;
    };
    const hideError = () => {
        errorMessage.classList.add('hidden');
    };
    const getMiniStar = () => `<svg viewBox="0 0 24 24" class="mini-star-icon"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>`;

    const renderDashboard = (reviews) => {
        let totalScore = 0;
        reviews.forEach(r => totalScore += parseInt(r.rating));
        
        const count = reviews.length;
        const average = count > 0 ? (totalScore / count).toFixed(1) : "0.0";

        avgScoreDisplay.textContent = average;
        totalCountDisplay.textContent = count;

        avgStarsDisplay.innerHTML = '';
        const roundedAvg = Math.round(average);
        for(let i=0; i<roundedAvg; i++) {
            avgStarsDisplay.innerHTML += getMiniStar();
        }

        reviewsList.innerHTML = ''; 
        
        const sortedReviews = reviews.slice().sort((a, b) => {
            return new Date(b.timestamp) - new Date(a.timestamp);
        });

        sortedReviews.forEach(review => {
            const card = document.createElement('div');
            card.className = 'review-card';

            let cardStarsHTML = '';
            for(let i=0; i<parseInt(review.rating); i++) {
                cardStarsHTML += getMiniStar();
            }

            const commentHTML = review.comment 
                ? `<p class="review-comment">"${review.comment}"</p>` 
                : `<p class="review-comment no-comment">No comment provided</p>`;

            card.innerHTML = `
                <div class="review-header">
                    <div class="review-rating">${cardStarsHTML}</div>
                    <span class="review-date">${review.timestamp}</span>
                </div>
                ${commentHTML}
            `;
            reviewsList.appendChild(card);
        });
    };

    if (ratingForm) {
        ratingForm.addEventListener('submit', async (e) => {
            e.preventDefault(); 

            const formData = new FormData(ratingForm);
            const ratingVal = parseInt(formData.get('rating') || '0');
            const commentVal = formData.get('comment') ? formData.get('comment').trim() : '';

            if (ratingVal === 0) {
                showError("Please tap a star to rate us!");
                return;
            }

            const newReview = {
                rating: ratingVal.toString(),
                comment: commentVal,
                timestamp: new Date().toISOString().slice(0, 19).replace('T', ' ') 
            };

            try {
                const response = await fetch('../php/feedback.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(newReview)
                });
                
                const result = await response.json();

                if (result.success) {
                    await loadReviewsFromServer(); 
                    
                    ratingForm.classList.add('hidden');
                    summaryDashboard.classList.remove('hidden');
                    
                    renderDashboard(allReviews);
                } else {
                    showError("Server Error: " + result.message);
                }
            } catch (error) {
                console.error("Submit error:", error);
                showError("Something went wrong. Please try again.");
            }
        });
    }

    if(backBtn) {
        backBtn.addEventListener('click', () => {
            window.location.href = "../html/homepage.html";
        });
    }
});