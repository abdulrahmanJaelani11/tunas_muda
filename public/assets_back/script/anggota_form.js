let nama_anggota = $("#nama_anggota");
let panggilan = $("#panggilan");
let email = $("#email");
let no_wa = $("#no_wa");
let status = $("#status");
let id = $("#id");

$("#form_tambah").submit(function (e) {
  e.preventDefault();

  let formData = new FormData();
  let file = $("#file")[0].files[0];

  formData.append("nama_anggota", nama_anggota.val());
  formData.append("panggilan", panggilan.val());
  formData.append("email", email.val());
  formData.append("no_wa", no_wa.val());
  formData.append("status", status.val());
  formData.append("file", file);
  formData.append("id", id.val());
  // validasi();

  $.ajax({
    url: base_url + "/anggota/form",
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
