const submitButton = document.querySelector('button[type=submit]');

// Validate class name input
const validateNameInput = (event) => {
    const value = event.target.value;
    const nameError = document.querySelector('#nameError')

    if (!value.length) {
        nameError.classList.remove('d-none');
        nameError.textContent = 'Class name cannot be empty.';
        submitButton.classList.add('disabled');
    } else {
        nameError.classList.add('d-none');
        submitButton.classList.remove('disabled');
    }
}

// Validate major select
const validateMajorSelect = (event) => {
    const value = event.target.value;
    const majorError = document.querySelector('#majorError')

    if (value == '') {
        majorError.classList.remove('d-none');
        majorError.textContent = 'Please select class major.';
        submitButton.classList.add('disabled');
    } else {
        majorError.classList.add('d-none');
        submitButton.classList.remove('disabled');
    }
}