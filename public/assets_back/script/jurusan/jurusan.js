// //define some sample data
// var tabledata = [
//   { id: 1, name: "Oli Bob", age: "12", col: "red", dob: "" },
//   { id: 2, name: "Mary May", age: "1", col: "blue", dob: "14/05/1982" },
//   {
//     id: 3,
//     name: "Christine Lobowski",
//     age: "42",
//     col: "green",
//     dob: "22/05/1982",
//   },
//   {
//     id: 4,
//     name: "Brendon Philips",
//     age: "125",
//     col: "orange",
//     dob: "01/08/1980",
//   },
//   {
//     id: 5,
//     name: "Margret Marmajuke",
//     age: "16",
//     col: "yellow",
//     dob: "31/01/1999",
//   },
// ];

// var table = new Tabulator("#example-table", {
//   height: 205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
//   data: tabledata, //assign data to table
//   layout: "fitColumns", //fit columns to width of table (optional)
//   columns: [
//     //Define Table Columns
//     { title: "Name", field: "name", width: 150 },
//     { title: "Age", field: "age", hozAlign: "left", formatter: "progress" },
//     { title: "Favourite Color", field: "col" },
//     {
//       title: "Date Of Birth",
//       field: "dob",
//       sorter: "date",
//       hozAlign: "center",
//     },
//   ],
// });

let dtList = new Tabulator("#dt-list", {
  //   height: 205,
  columns: [
    {
      title: "Aksi",
      field: "aksi",
      formatter: "html",
      sorter: "string",
      cssClass: "text-wrap",
      width: "10%",
    },
    {
      title: "Jurusan",
      field: "nama_jurusan",
      formatter: "html",
      width: "20%",
    },
    {
      title: "Judul",
      field: "judul",
      sorter: "string",
      width: "20%",
    },
    {
      title: "Keterangan",
      field: "keterangan",
      formatter: "html",
      sorter: "string",
      // cssClass: "text-wrap",
      width: "20%",
    },
    {
      title: "Gambar",
      field: "img",
      formatter: "html",
      sorter: "string",
      cssClass: "text-wrap",
      width: "20%",
    },
    {
      title: "Aktif",
      field: "status",
      formatter: "html",
      sorter: "string",
      cssClass: "text-wrap",
      width: "10%",
    },
  ],
  locale: "id",
  placeholder: "Belum ada data",
  ajaxURL: base_url + "jurusan/lists",
  ajaxConfig: "POST",
  ajaxSorting: true,
  ajaxFiltering: true,
  ajaxRequesting: function (url, params) {
    params.start = params.size * (params.page - 1);
    params.length = params.size;
  },
  ajaxResponse: function (url, params, response) {
    let pageSize = dtList.getPageSize();
    let pageNo = dtList.getPage();
    let startRow = pageSize * (pageNo - 1) + 1;
    let endRow = response.data.length + startRow - 1;
    if (response.data.length === 0) {
      startRow = 0;
      endRow = 0;
    }
    let recordsFiltered = parseInt(response.recordsFiltered);
    let recordsTotal = parseInt(response.recordsTotal);

    $("#table-footer .tabulator-startrow").text(startRow);
    $("#table-footer .tabulator-endrow").text(endRow);
    $("#table-footer .tabulator-totalrow").text(recordsFiltered);

    let elTotalFilteredRow = $("#table-footer .tabulator-totalfilteredrow");
    elTotalFilteredRow.text("");
    if (recordsTotal > recordsFiltered) {
      elTotalFilteredRow.text(
        " (disaring dari " + recordsTotal + " entri keseluruhan)"
      );
    }

    return response;
  },
  footerElement:
    '<div id="table-footer" class="pull-left tabulator-info">' +
    'Menampilkan <span class="tabulator-startrow"></span> - <span class="tabulator-endrow"></span> dari ' +
    '<span class="tabulator-totalrow"></span> entri<span class="tabulator-totalfilteredrow"></span></div>',
  pagination: "remote",
  paginationSize: 25,
  paginationButtonCount: 10,
  paginationDataSent: {
    sorters: "order",
  },
  selectable: false,
  //   dataLoaded: () => {
  //     confirmDelete();
  //     confirmActive();
  //   },
});

let searchThread = null;
let elSearch = $("#tb-search");
if (elSearch != null) {
  elSearch.keyup(function (e) {
    if ($(this).val().length < 3 && e.keyCode > 13) {
      return;
    }
    clearTimeout(searchThread);
    searchThread = setTimeout(function () {
      dtList.setFilter("", "like", elSearch.val());
    }, 600);
  });
}

function hapus(param_id) {
  $.ajax({
    url: base_url + "/anggota/hapus/" + param_id,
    dataType: "JSON",
    success: function (respon) {
      if (respon.status == 200) {
        Swal.fire({
          icon: "success",
          title: "Berhasil",
          text: respon.message,
          showDenyButton: false,
          showCancelButton: false,
          confirmButtonText: "Ok",
          denyButtonText: `Don't save`,
          cancelButtonText: "kembali",
        });
        let dtAnggota = getAnggota();

        dtList.setData(dtAnggota);
        dtList.redraw(true);
      }
    },
  });
}
