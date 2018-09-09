import Youtube from '../component/youtube/youtube';

$(() => {
    $('#link').change(e => {
        const $target = $(e.target);
        const value = $target.val();
        const type = $('input[type=radio][name=type]:checked').val();

        let id = '';
        if (value) {
            const youtube = new Youtube();
            id = youtube.extractId(value, type);
        }

        $('#youtube_id').val(id);
    });

    $('input[type=radio][name=type]').change(function(e) {
        const $target = $('#link');
        const value = $target.val();
        const type = $('input[type=radio][name=type]:checked').val();

        let id = '';
        if (value) {
            const youtube = new Youtube();
            id = youtube.extractId(value, type);
        }

        $('#youtube_id').val(id);
    });
});
