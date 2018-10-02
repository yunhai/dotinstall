$(document).ready(function() {
    const $slider = $('.carousel');
    $slider.carousel({ interval: 8000 })
    $slider.bcSwipe({ threshold: 50 });

    $slider.bind('slide.bs.carousel', function (e) {
        $('.youtube-video').each((i, target) => {
            target.contentWindow.postMessage('{"event":"command", "func":"' + 'pauseVideo' + '", "args":""}', '*');
        });
        $('.vimeo-video').each((i, target) => {
            const player_ptv = new Vimeo.Player(target);
            player_ptv.pause();
        });
    });

    $('.j-lessonFilter').on('change', (e) => {
        const difficulty = $('#filter-difficulty').val();
        const category = $('#filter-category').val();
        const keyword = $('#filter-keyword').val();
        const data = {difficulty, category, keyword};
        $.get('/ajax/top/filter', data, (result) => {
            $('#j-lessonFilterResult').html(result);
            $('#j-topPage').hide();
        })
    });
});
