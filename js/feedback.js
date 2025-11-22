document.addEventListener('DOMContentLoaded', () => {
    const starRating = document.getElementById('starRating');
    const stars = starRating.querySelectorAll('.star');
    const starSvgCode = `
        <svg viewBox="0 0 24 24" class="star-svg">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
        </svg>
    `;

    stars.forEach(star => {
        star.innerHTML = starSvgCode;
    });
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

    // Submit Event
    if (ratingForm) {
        ratingForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(ratingForm);

            const ratingVal = formData.get('rating') || '0';
            const commentVal = formData.get('comment') ? formData.get('comment').trim() : '';

            if (ratingVal === '0' && commentVal === '') {
                alert('Please select a star rating or leave a comment.');
                return;
            }

            const dataToSend = {
                rating: ratingVal,
                comment: commentVal
            };

            fetch('../php/feedback.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(dataToSend)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('HTTP error! Status: ' + response.status);
                    }
                    return response.json();
                })
                .then(result => {
                    console.log('Server response:', result);

                    if (result.success) {
                        if (ratingForm && thankYouMessage) {
                            ratingForm.classList.add('hidden');
                            thankYouMessage.classList.remove('hidden');
                        }
                    } else {
                        alert('Error submitting feedback: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    alert('An error occurred while submitting. Please check console for details.');
                });
        });
    }
});