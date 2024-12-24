document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;

            if (answer.style.display === 'block') {
                answer.style.display = 'none';
            } else {
                // Hide all other answers
                document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
                answer.style.display = 'block';
            }
        });
    });
});
