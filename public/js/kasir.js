$(document).ready(function () {
  $('#tabel_barang').DataTable({
    dom: "<'row'<'col-lg-4 col-sm-12 my-1'l><'col-lg-8 col-sm-12 my-1'f>>t<'row'<'col-lg-4 col-sm-12 my-1'i><'col-lg-8 col-sm-12 my-1'p>>r",
    "language": {
      "decimal": ",",
      "thousands": ".",
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
    "columnDefs": [{
      "targets": 2,
      "render": $.fn.dataTable.render.number('.', ',', 0, 'Rp')
      // "render": function (data, type, row, meta) {
      //   return formatRupiah(data, 'Rp');
      // }
    }],
    responsive: true,
    autoWidth: false,
    "drawCallback": function () {
      $('.dataTables_paginate > .pagination').addClass('pagination-sm');
    }
  });
});

function addTableRow(id, namaBarang, price) {
  let check = $('#checkoutTable tbody tr td').filter(function () {
    return $(this).text() == namaBarang;
  });

  if (check.length != 0) {
    check.next('td').find('input[type=number]').val(function (i, oldVal) {
      return ++oldVal;
    }).change();
  } else {
    $("#checkoutTable").find('tbody').append($('<tr>')
      .append($('<td>')
        .addClass('align-middle')
        .text(namaBarang)
      )
      .append($('<td>')
        .addClass('align-middle')
        .append($('<input>')
          .attr({
            type: 'number',
            name: 'qty[]',
            class: 'form-control form-control-sm',
            value: '1',
          })
        )
        // .append($('<div>')
        //   .addClass('input-group bootstrap-touchspin bootstrap-touchspin-injected')
        //   .append($('<input>')
        //     .attr({
        //       type: 'text',
        //       name: 'qty[]',
        //       class: 'form-control',
        //       value: '1',
        //     })
        //   )
        //   .append($('<span>')
        //     .addClass('input-group-btn-vertical')
        //     .append($('<button>')
        //       .attr({
        //         type: 'button',
        //         class: 'btn btn-primary bootstrap-touchspin-up',
        //       })
        //       .text('+')
        //     )
        //     .append($('<button>')
        //       .attr({
        //         type: 'button',
        //         class: 'btn btn-primary bootstrap-touchspin-down',
        //       })
        //       .text('-')
        //     )
        //   )
        // )
      )
      .append($('<td>')
        .addClass('align-middle')
        .append($('<span>')
          .addClass('priceDipslay')
          .text(formatRupiah(price, 'Rp'))
        )
        .append($('<span>')
          .addClass('d-none priceRaw')
          .text(price)
        )
        .append($('<span>')
          .addClass('d-none priceCount')
          .text(price)
        )
      )
      .append($('<td>')
        .addClass('align-middle')
        .append([
          $('<input>')
            .attr({
              type: 'hidden',
              name: 'barangs[]',
              value: id,
            }),
          $('<a>')
            .attr({
              href: 'javascript:void(0);',
              class: 'action-icon text-danger delButton',
            })
            .append(' <i class="mdi mdi-trash-can font-size-18"></i>'),
        ])
      )
    );
  }
  tableChange();
};

$('#checkoutTable').on('click', '.delButton', function (e) {
  $(this).closest('tr').remove();
  tableChange();
});

$('#checkoutTable').on('change keyup', 'input[type=number]', function () {
  if (Math.floor($(this).val()) <= 0) {
    $(this).closest('tr').find('.delButton').trigger('click');
  } else {
    let val = 0;
    let priceCount = $(this).closest('td').next('td').find('.priceCount');
    let priceRaw = $(this).closest('td').next('td').find('.priceRaw');
    let priceDipslay = $(this).closest('td').next('td').find('.priceDipslay');
    val = $(this).val() * priceRaw.text();
    priceCount.text(val);
    priceDipslay.text(formatRupiah(val, 'Rp'));
    tableChange();
  }
});

function tableChange() {
  let jumlahBarang = $('#checkoutTable tbody tr').length;
  $('.jumlahBarang').html(jumlahBarang);
  if (jumlahBarang === 0) {
    $('#checkoutButton button').remove();
  } else {
    $('#checkoutButton:empty').append(
      $('<button>')
        .attr({
          type: 'submit',
          class: 'btn btn-sm btn-success',
        })
        .text('Checkout')
    );
  }

  let sum = 0;
  $('.priceCount').each(function () {
    sum += Number($(this).text());
  });
  $('.jumlahHarga').html(formatRupiah(sum, 'Rp'));
};

function emptyTable() {
  $('#checkoutTable tbody').empty();
  tableChange();
}
