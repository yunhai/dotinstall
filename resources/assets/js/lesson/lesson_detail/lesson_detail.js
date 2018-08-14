$(document).ready(function() {
    $('.j-lessonDetailCloseReopen').click(event => {
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
    })
})
