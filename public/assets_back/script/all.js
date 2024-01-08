function getAnggota() {
  $.ajax({
    url: base_url + "/anggota/get",
    type: "POST",
    dataType: "JSON",
    success: function (data) {
      console.log(data);
    },
  });
}

function getSlider() {
  $.ajax({
    url: base_url + "/setting/slide/get",
    type: "POST",
    dataType: "JSON",
    success: function (data) {
      console.log(data);
    },
  });
}
