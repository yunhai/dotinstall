const option = {
    title: 0,
    portrait: 0,
    byline: 0
}
const player = new Vimeo.Player('j-vimeo_player', option);

if ($('#j-vimeo_player').hasClass('j-video_deny')) {
    player.on('play', function(data) {
        player.pause();
        $('#modal_video_deny').modal()
    });
}

