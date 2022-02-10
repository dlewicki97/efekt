function loadServerPhoto(name, link, photo_nr) {
  document.getElementById('photoViewer_' + photo_nr).innerHTML =
    '<i class="fas fa-spinner fa-pulse loader"></i>';
  var source =
    link +
    'uploads/' +
    document.getElementById('server_photo_' + photo_nr).value;
  setTimeout(function () {
    document.getElementById('photoViewer_' + photo_nr).innerHTML =
      '<img class="img-fluid img-thumbnail" src="' + source + '" width="75%">';
  }, 500);
}

window.addEventListener('load', function () {
  let formPhotosPlaceholders = (function () {
    for (
      let i = 1;
      i < +document.querySelector('#loadPhotoScript').dataset.modalPhotos + 1;
      i++
    ) {
      let photo = document.getElementById(`photo_${i}`);
      if (!photo) return;
      photo.addEventListener('change', function () {
        document.getElementById(`photoViewer_${i}`).innerHTML =
          '<i class="fas fa-spinner fa-pulse loader"></i>';

        if (this.files && this.files[0]) {
          var img = document.querySelector('img');
          img.src = URL.createObjectURL(this.files[0]);
          setTimeout(function () {
            img.onload = imageIsLoaded;
            var photoName = document.getElementById(`photo_${i}`).value;
            document.getElementById(`photoViewer_${i}`).innerHTML =
              '<img class="img-fluid img-thumbnail" src="' +
              img.src +
              '" width="75%">';
            document.getElementById(`name_photo_${i}`).value =
              photoName.replace(/^.*[\\\/]/, '');
          }, 500);
        }
      });
    }
  })();

  let headerPhotosPlaceholders = (function () {
    let headerLogoRows = document.querySelectorAll('.header-logo-row');

    headerLogoRows.forEach((headerLogoRow) => {
      let fileInput = headerLogoRow.querySelector('input[type="file"]');

      fileInput.addEventListener('change', function () {
        let photoViewer = headerLogoRow.querySelector('.photo-viewer');
        photoViewer.innerHTML =
          '<i class="fas fa-spinner fa-pulse loader"></i>';

        if (this.files && this.files[0]) {
          let src = URL.createObjectURL(this.files[0]);
          setTimeout(function () {
            photoViewer.innerHTML = `<img class="img-fluid img-thumbnail" src="${src}" width="74">`;
          }, 500);
        }
      });
    });
  })();
});
