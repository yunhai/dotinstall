const option = {
    title: 0,
    portrait: 0,
    byline: 0
}
if ($('#j-vimeo_player').length) {
    const player = new Vimeo.Player('j-vimeo_player', option);

    if ($('#j-vimeo_player').hasClass('j-video_deny')) {
        player.on('play', function(data) {
            player.pause();
            $('#modal_video_deny').modal()
        });
    }
    $(document).on('switch_voice', () => {
        player.pause();
    });
}

if ($('#j-vimeo_player_female').length) {
    if (typeof(player) !== 'undefined'){
        player.pause();
    }
    const player2 = new Vimeo.Player('j-vimeo_player_female', option);
    
    if ($('#j-vimeo_player_female').hasClass('j-video_deny')) {
        player2.on('play', function(data) {
            player2.pause();
            $('#modal_video_deny').modal()
        });
    }

    $(document).on('switch_voice', () => {
        player2.pause();
    });
}

