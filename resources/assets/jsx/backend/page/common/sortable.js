$(() => {
    $('tbody').sortable({
        update: function(event, ui) {
            const $target = $(event.target);
            const id_list = [];
            $target.find('tr').each((index, row) => {
                const $row = $(row)
                const id = $row.data('id');
                id_list.push(id);

                const $cell = $row.find(`#j-title--${id}`);
                const tpl = $cell.data('tpl');
                const text = tpl.replace('<sort>', index+1);
                $cell.html(text);
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/lesson/sort',
                method: 'POST',
                data: {'id': id_list},
                success: function(data) {
                },
            })
        },
    })
})
