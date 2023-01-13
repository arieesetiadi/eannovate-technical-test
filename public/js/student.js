// Preview image
const previewImage = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#imgPreview");
        imagePreviewElement.src = imageSrc;
        imagePreviewElement.classList.remove('d-none');
    }
};

const buttonDisplay = () => {
    const checkboxes = document.querySelectorAll('.checkboxes')
    const deleteManyButton = document.querySelector('button#deleteManyButton');
    let status = false;

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            status = true;
        }
    });

    if (status) {
        deleteManyButton.classList.remove('disabled');
    } else {
        deleteManyButton.classList.add('disabled');
    }
}

// Toggle all student checkboxes
const toggleAllCheckboxes = () => {
    const checkboxMaster = document.querySelector('#checkboxMaster')
    const checked = checkboxMaster.checked;
    const checkboxes = document.querySelectorAll('.checkboxes')

    checkboxes.forEach((checkbox) => {
        checkbox.checked = checked;
    })

    buttonDisplay();
}

// Submit delete many students
const deleteMany = (event) => {
    event.preventDefault();

    const confirmed = confirm('Delete all selected students ?');
    if (!confirmed) return;

    const formDeleteMany = document.querySelector('#formDeleteMany');
    const checkboxes = document.querySelectorAll('.checkboxes')
    const ids = [];

    // Get id from checked student, and push to ids[]
    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            ids.push(checkbox.dataset.id);
        }
    })

    // Assign final ids to input ids on form#formDeleteMany
    const inputIds = formDeleteMany.querySelector('input[name=ids]')
    inputIds.value = ids;

    formDeleteMany.submit();
}