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