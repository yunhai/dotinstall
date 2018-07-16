export default class CaptureVideo {
    capture(info, fcallback, $target, $callback) {
        var video = document.createElement('video');
        video.src = info.url;

        video.addEventListener(
            'loadeddata',
            () => {
                if (!isNaN(video.duration)) {
                    var rand =
                        Math.round(Math.random() * video.duration * 1000) + 1;
                    video.currentTime = rand / 1000;
                }
            },
            false
        );

        video.addEventListener(
            'seeked',
            () => {
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                const name = info.original_name + '.png';
                const data = {
                    content: canvas.toDataURL('image/png'),
                    name:　`poster-${name}`,
                    media_type: 'image',
                    _token: CSRF_TOKEN
                };

                $.ajax({
                    url: '/backend/media/content',
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(result) {
                        fcallback(result, $target, $callback);
                    },
                    error: function(error) {
                    }
                });
            },
            false
        );
    }
}
