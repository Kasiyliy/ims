<script>
    $(document).ready(function () {


        // $('#dataTable thead tr').clone(true).appendTo('#dataTable thead');
        // $('#dataTable thead tr:eq(1) th').each(function (i) {
        //     var title = $(this).text();
        //     $(this).html('<input type="text" class="form-control" placeholder="Поиск: ' + title.toLowerCase() + '" />');
        //
        //     $('input', this).on('keyup change', function () {
        //         if (table.column(i).search() !== this.value) {
        //             table
        //                 .column(i)
        //                 .search(this.value)
        //                 .draw();
        //         }
        //     });
        // });

        var table = $('#dataTable').DataTable({
            "responsive": true,
            "lengthMenu": [[10, 25, 50, 100, 200, 500, -1], [10, 25, 50, 100, 200, 500, "Все"]],
            "language": {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                },
                "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                }
            },
            "orderCellsTop": true,
            "fixedHeader": true
        });

        $('.divide').divide({

            // current delimiter
            delimiter: ' ',

            // 1000 or 1,000
            divideThousand: false

        });

        $('.divide').divide();
    });


</script>