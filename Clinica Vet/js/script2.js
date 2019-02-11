function deleteImage() {

    res = false;
    if (confirm('Eliminare l\'imamgine selezionata?')) {
        res = true;
    }
    if (!res) {
        event.stopPropagation();
        event.preventDefault();
    }
    return res;
}

function checkSize(max_img_size) {
    var input = document.getElementById("fileToUpload");
    // check for browser support (may need to be modified)
    if (input.files && input.files.length == 1) {
        if (input.files[0].size > max_img_size) {
            alert("L'immagine deve essere più piccola di  " + (max_img_size / 1024 / 1024) + "MB");
            return false;
        }
    }

    return true;
}