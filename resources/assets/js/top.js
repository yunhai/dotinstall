$(document).ready(function() {
    $('.j-paginate').on('click', (e) => {
        const $target = $(e.target);
        const current_page = $target.data('current_page');
        const last_page = $target.data('last_page');
        const next_page = current_page + 1;

        if (next_page <= last_page) {
            const url = $target.data('url') + '?page=' + next_page;
            $target.data('current_page', next_page);
            $.get(url, {}, (result) => {
                $('#j-lessonList').append(result);
                enableEditor();
            })
        }
        if (next_page >= last_page)  {
            $('#j-lessonListPaginator').hide();
        }
    });
    
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
});