let judul = $("#judul");
// let keterangan = $("#keterangan");
CKEDITOR.replace("keterangan");
let img = $("#img");
let btn_back = $(".btn_back");
let preview_img = $("#preview-image");
let id = $("#id");

img.on("change", function () {
  let inputGambar = this;
  let previewImage = preview_img;

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

$("#form_tambah").submit(function (e) {
  e.preventDefault();

  let formData = new FormData();
  let file = img[0].files[0];

  formData.append("id", id.val());
  formData.append("judul", judul.val());
  formData.append("keterangan", keterangan.val());
  formData.append("img", file);
  let cek = validasi();
  if (cek == false) {
    return false;
  }

  $.ajax({
    url: base_url + "/berita/form",
    type: "POST",
    dataType: "JSON",
    beforePrint: function () {},
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      if (data.status == 200) {
        Swal.fire({
          icon: "success",
          title: "Berhasil",
          text: data.message,
          showDenyButton: false,
          showCancelButton: false,
          confirmButtonText: "Ok",
          denyButtonText: `Don't save`,
          cancelButtonText: "kembali",
        }).then(function (result) {
          if (result.isConfirmed) {
            window.location.href = "/berita";
          }
        });
        $("input").val("");
      } else {
        Swal.fire({
          icon: "error",
          title: "Gagal",
          text: data.message,
          showDenyButton: false,
          showCancelButton: false,
          confirmButtonText: "Tutup",
          denyButtonText: `Don't save`,
          cancelButtonText: "kembali",
        });
      }
    },
  });
});

function validasi() {
  if (judul.val() == "") {
    judul.addClass("is-invalid");
    Swal.fire({
      icon: "error",
      title: "Ada kesalahan",
      text: "Judul berita harus diisi!",
      showDenyButton: false,
      showCancelButton: false,
      confirmButtonText: "Tutup",
      denyButtonText: `Don't save`,
      cancelButtonText: "kembali",
    });
    return false;
  }
  if (keterangan.val() == "") {
    keterangan.addClass("is-invalid");
    Swal.fire({
      icon: "error",
      title: "Ada kesalahan",
      text: "Keterangan berita harus diisi!",
      showDenyButton: false,
      showCancelButton: false,
      confirmButtonText: "Tutup",
      denyButtonText: `Don't save`,
      cancelButtonText: "kembali",
    });
    return false;
  }
}

$("input").click(function (e) {
  $(this).removeClass("is-invalid");
});

btn_back.click(function (e) {
  e.preventDefault();
  window.location = base_url + "berita";
});
