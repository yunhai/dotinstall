import ChuckUpload from '../component/upload/chunk_upload';

$(() => {
    const upload = new ChuckUpload();
    let query = {_token : $('input[name=_token]').val()}

    $.each($('.dd-container'), (index, item) => {
        if ($(item).data('query')) {
            query = $.extend({}, query, $(item).data('query'));
        }
        upload.bind($(item), query);
    });

    $(document).on('click', '.j-dd-remove', (e) => {
        const $target = e.currentTarget;
        $target.closest('.dd-callback__item').remove();
    })
});