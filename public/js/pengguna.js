$(document).ready(function () {
  var judulFile = 'Daftar Pengguna ' + formatDate(new Date());
  $('#tabel_pengguna').DataTable({
    dom: "<'d-none'B><'row'<'col-lg-4 col-sm-12 my-1'l><'col-lg-8 col-sm-12 my-1'f>><'table-responsive't><'row'<'col-lg-4 col-sm-12 my-1'i><'col-lg-8 col-sm-12 my-1'p>>r",
    "language": {
      "zeroRecords": "Tidak ada data!",
      "lengthMenu": "Lihat _MENU_ baris",
      "search": "Cari: ",
      "info": "_START_ s/d _END_ dari _TOTAL_",
      "infoEmpty": "",
      "paginate": {
        "next": "Maju",
        "previous": "Mundur",
        "first": "Awal",
        "last": "Akhir"
      }
    },
    buttons: [{
      extend: 'excel',
      text: 'Ekspor Spreadsheet',
      className: 'dropdown-item',
      title: judulFile,
      exportOptions: {
        modifier: {
          page: 'all'
        }
      }
    }],
    autoWidth: false,
    "drawCallback": function () {
      $('.dataTables_paginate > .pagination').addClass('pagination-sm');
    }
  });

  $('#tabel_riwayat').DataTable().buttons().container().find('button').prependTo('.dropdown-menu');
});
