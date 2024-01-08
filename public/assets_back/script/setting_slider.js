$("#slide1").on("change", function () {
  let inputGambar = this;
  let previewImage = $("#preview-image");

  if (inputGambar.files && inputGambar.files[0]) {
    let reader = new FileReader();

    reader.onload = function (e) {
      previewImage.attr("src", e.target.result);
      previewImage.show();
    };

    reader.readAsDataURL(inputGambar.files[0]);
  } else {
    previewImage.hide();
  }
});
