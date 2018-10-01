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
});
