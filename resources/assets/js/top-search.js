$(document).ready(function() {
    $('#j-topSearchBtn').on('click', (e) => {
        e.preventDefault();
        $('.j-lessonFilter').trigger('change');
    });

    $('.j-lessonFilter').on('change', (e) => {
        const difficulty = $('#filter-difficulty').val();
        const category = $('#filter-category').val();
        const keyword = $('#filter-keyword').val();
        const data = {difficulty, category, keyword};
        $('#j-topPage').hide();
        const html = `
            <div style="padding: 10px 20px 20px;">
              <div class="loader"></div>
            </div>
        `;
        $('#j-lessonFilterResult').html(html);
        $.get('/ajax/top/filter', data, (result) => {
            $('#j-lessonFilterResult').html(result);

        })
    });

    $(document).on('click', '.j-lessonDetailCloseReopen', function(event){
        const $target = $(event.target)
        const action = $target.data('action')
        const url = $target.data('href-' + action)
        $.get(url, data => {
            if (data.result) {
                if (action == 'close') {
                    $target.removeClass('bg-button-to-complete')
                    $target.addClass('bg-button-complete')
                    $target.html('完了')
                    $target.data('action', 'reopen')
                } else {
                    $target.removeClass('bg-button-complete')
                    $target.addClass('bg-button-to-complete')
                    $target.html('完了する')
                    $target.data('action', 'close')
                }
            }
        })
    });
});
