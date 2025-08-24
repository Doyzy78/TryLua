document.getElementById('uploadForm').addEventListener('submit', function(e) {
    const fileInput = document.querySelector('input[type="file"]');
    if (fileInput.files.length === 0) {
        alert("Please upload an image.");
        e.preventDefault();
    }
});