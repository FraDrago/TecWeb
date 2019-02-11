function scrollFunction() {

  if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

window.onscroll= scrollFunction;

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


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
    if (input.files && input.files.length == 1) {
        if (input.files[0].size > max_img_size) {
            alert("L'immagine deve essere più piccola di  " + (max_img_size / 1024 / 1024) + "MB");
            return false;
        }
    }

    return true;
}
