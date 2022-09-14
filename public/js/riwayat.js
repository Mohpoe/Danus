$(document).ready(function () {
  var judulFile = 'Riwayat Transaksi Danus ' + formatDate(new Date());
  $('#tabel_riwayat').DataTable({
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
    },
    {
      extend: 'pdf',
      text: 'Ekspor PDF',
      className: 'dropdown-item',
      title: judulFile,
      orientation: 'landscape',
      exportOptions: {
        modifier: {
          page: 'all'
        }
      }
    }
    ],
    "columnDefs": [{
      "targets": [2, 4, 5, 6, 7],
      "render": $.fn.dataTable.render.number('.', ',', 0, 'Rp')
      // "render": function (data, type, row, meta) {
      //   return formatRupiah(data, 'Rp');
      // }
    }, {
      "targets": 3,
      "data": "coba",
      "render": function (data, type, row, meta) {
        return data + ' item';
      },
    }],
    // responsive: true,
    autoWidth: false,
    "drawCallback": function () {
      $('.dataTables_paginate > .pagination').addClass('pagination-sm');
    }
    // });
  });

  $('#tabel_riwayat').DataTable().buttons().container().find('button').prependTo('.dropdown-menu');
});
