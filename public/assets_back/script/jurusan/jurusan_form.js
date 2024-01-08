CKEDITOR.replace("keterangan");
let nama_jurusan = $("#nama_jurusan");
let judul = $("#judul");
let keterangan = CKEDITOR.instances["keterangan"].getData();
let id = $("#id");

$("#form_tambah").submit(function (e) {
  e.preventDefault();

  let formData = new FormData();
  let file = $("#img")[0].files[0];

  formData.append("nama_jurusan", nama_jurusan.val());
  formData.append("judul", judul.val());
  formData.append("keterangan", CKEDITOR.instances["keterangan"].getData());
  formData.append("file", file);
  formData.append("id", id.val());
  // validasi();

  $.ajax({
    url: base_url + "/jurusan/form",
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
            window.location.href = base_url + "/jurusan";
          }
        });
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
        }).then(function (result) {
          if (result.isConfirmed) {
            window.location.href = base_url + "/jurusan";
          }
        });
      }
    },
  });
});

$("#remember").click(function () {
  if ($(this).is(":checked")) {
    $("#password").attr("type", "text");
    // $('#konfirmasi').attr('type', 'text')
    $("#textShow").text("Sembunyikan Kata Sandi");
  } else {
    $("#password").attr("type", "password");
    // $('#konfirmasi').attr('type', 'password')
    $("#textShow").text("Tampilkan Kata Sandi");
  }
});

function validasi() {
  if ($("#email").val() == "") {
    $("#email").addClass("is-invalid");
  }
  if ($("#password").val() == "") {
    $("#password").addClass("is-invalid");
  }
}

$("input").click(function (e) {
  $(this).removeClass("is-invalid");
});
