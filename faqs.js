// Select all FAQ question buttons
const faqQuestions = document.querySelectorAll('.faq-question');

// Function to toggle the display of the answer
faqQuestions.forEach(question => {
    question.addEventListener('click', () => {
        // Toggle the 'open' class on the parent '.faq' element
        const faq = question.parentElement;
        faq.classList.toggle('open');

        // Get the corresponding answer element
        const answer = faq.querySelector('.faq-answer');

        // Check if the answer is currently displayed
        if (faq.classList.contains('open')) {
            // Show the answer
            answer.style.display = 'block';
        } else {
            // Hide the answer
            answer.style.display = 'none';
        }
    });
});
