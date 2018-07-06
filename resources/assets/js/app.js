$(document).ready(function() {
    $('.j-captureVideo').each(function(index, item) {
        $target = $(item);
        $url = $target.data('url');

        var i = 0;
        var video = document.createElement('video');
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
                generateThumbnail($target);

                // when frame is captured, increase
                i++;

                // if we are not passed end, seek to next interval
                if (i <= video.duration) {
                    // this will trigger another seeked event
                    video.currentTime = i;
                } else {
                    // DONE!, next action
                    alert('done!');
                }
            },
            false
        );

        video.preload = 'auto';
        video.src = $url;

        function generateThumbnail(thumbs) {
            var c = document.createElement('canvas');
            var ctx = c.getContext('2d');
            c.width = 160;
            c.height = 90;
            ctx.drawImage(video, 0, 0, 160, 90);
            // thumbs.append(c);
        }
    });
    console.log($('.j-captureVideo'));
});
