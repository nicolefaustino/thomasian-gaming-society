// Wait for the DOM to load
document.addEventListener('DOMContentLoaded', () => {
    const validationCheckbox = document.getElementById('validation');
    const deleteButton = document.querySelector('button[value="newGame"]');

    // Disable the delete button by default
    deleteButton.disabled = true;

    // Enable the delete button only if the checkbox is checked
    validationCheckbox.addEventListener('change', () => {
        deleteButton.disabled = !validationCheckbox.checked;
    });

    // Form validation for "NEW GAME" and "UPDATE GAME" forms
    const newGameForm = document.querySelector('form[action="includes/game_insert_handler.php"]');
    const updateGameForm = document.querySelector('form[action="includes/game_update_handler.php"]');

    const validateForm = (form) => {
        const title = form.querySelector('input[name="title"]');
        const genre = form.querySelector('select[name="genre"]');
        const desc = form.querySelector('textarea[name="desc"]');
        const link = form.querySelector('input[name="link"]');

        if (!title.value.trim() || !genre.value || !desc.value.trim() || !link.value.trim()) {
            alert('Please fill in all the fields.');
            return false;
        }

        return true;
    };

    newGameForm.addEventListener('submit', (event) => {
        if (!validateForm(newGameForm)) {
            event.preventDefault();
        }
    });

    updateGameForm.addEventListener('submit', (event) => {
        if (!validateForm(updateGameForm)) {
            event.preventDefault();
        }
    });

    // Highlight the selected form field
    const formFields = document.querySelectorAll('input, select, textarea');

    formFields.forEach(field => {
        field.addEventListener('focus', () => {
            field.style.borderColor = '#4CAF50';
        });

        field.addEventListener('blur', () => {
            field.style.borderColor = '#ccc';
        });
    });
});
