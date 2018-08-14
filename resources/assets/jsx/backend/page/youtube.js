import Youtube from '../component/youtube/youtube';

$(() => {
    $('#link').change(e => {
        const $target = $(e.target);
        const value = $target.val();

        let id = '';
        if (value) {
            const youtube = new Youtube();
            id = youtube.extractId(value);
        }

        $('#youtube_id').val(id);
    });
});
