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
      title: "Image / Slide",
      field: "img",
      formatter: "html",
      width: "20%",
      cssClass: "text-wrap",
    },
    {
      title: "Judul Keterangan",
      field: "judul_ket",
      sorter: "string",
      width: "20%",
    },
    {
      title: "Keterangan",
      field: "keterangan",
      formatter: "html",
      sorter: "string",
      cssClass: "text-wrap",
      width: "40%",
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
  ajaxURL: base_url + "setting/slider/lists",
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
