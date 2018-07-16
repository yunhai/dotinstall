$(document).ready(function() {
    $('.j-captureVideo').each(function(index, item) {
        const $target = $(item);

        const video = document.createElement('video');
        video.preload = 'auto';
        video.src = $(item).data('url');

        let i = 0;
        video.addEventListener(
            'loadeddata',
            function() {
                video.currentTime = i;
            },
            false
        );

        video.addEventListener(
            'seeked',
            function() {
                if (i === 3) {
                    var c = document.createElement('canvas');
                    var ctx = c.getContext('2d');
                    c.width = 240;
                    c.height = 134;
                    ctx.drawImage(video, 0, 0, 240, 134);
                    $target.append(c);
                }
                i++;
                if (i <= video.duration) {
                    video.currentTime = i;
                }
            },
            false
        );
    });
});
