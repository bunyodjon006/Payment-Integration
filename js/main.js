document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.querySelector('.file-input');
    const imagesContent = document.querySelector('.images_content');
    const contentValue = document.querySelector('.content_value');
    const uploadedImage = document.querySelector('.images_content img');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = (e) => {
                // Set the uploaded image's src
                uploadedImage.src = e.target.result;
                uploadedImage.style.display = 'block'; // Show the image
                contentValue.style.display = 'none'
                // Hide the content_value (text and button)
               
            };

            reader.readAsDataURL(file); // Read the image file
        }
    });
});
