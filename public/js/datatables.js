$(function () {
    'use strict';

    // init datatables
    var datatables1 = $('.datatables').dataTable({
        sDom: 'rt<"table-footer"<"pull-right"i>p>',
        sPaginationType: 'bs_normal',
        oLanguage: {
            sInfoFiltered: '<span class="label label-info"><i class="fa fa-filter"></i> encontrados  _MAX_ registros</span>',
            sInfoEmpty: "Nenhum registro encontrado",
            sEmptyTable: "Nenhum registro encontrado",
            sInfo:"Exibindo de _START_ à _END_ em _TOTAL_ registros",
            sLengthMenu: "",
            oPaginate:{
                sNext: 'Próximo',
                sPrevious: 'Anterior'
            }
            
        },
        
        fnInitComplete: function (oSettings, json) {
            var aoData = oSettings.aoData;

            // adding uniquen id to TR
            $.each(aoData, function (i, val) {
                var $ntr = $(val.nTr);

                $ntr.attr('data-id', 'datatables1_' + i);
            });

            var $nTable = $(oSettings.nTable);
            $nTable.closest('.dataTables_wrapper').find('.dataTables_paginate').children('.pagination')
                    .addClass('pagination-rounded');
        }
    });

    // adding custom styles to all .datatables
    $('.datatables').each(function () {
        var datatables = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var searchInput = datatables.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        searchInput.attr('placeholder', 'Buscar');
        searchInput.addClass('form-control input-sm');
        // LENGTH - Inline-Form control
        var lengthSel = datatables.closest('.dataTables_wrapper').find('div[id$=_length] select');
        lengthSel.addClass('form-control input-sm');
        // lengthSel.wrap( '<label class="select select-sm"></label>' );
        // Paginations
        var paginations = datatables.closest('.dataTables_wrapper').find('.dataTables_paginate').children('.pagination');

        paginations.addClass('pagination-sm');
    }).on('draw.dt', function () {
        // update sidebar height
        $('.sidebar').wrapkitSidebar('updateHeight');
    });

});