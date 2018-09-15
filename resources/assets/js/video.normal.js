function plyr(id) {
    const i18n = {
        speed: '再生速度',
        normal: '通常',
    }

    const player = new Plyr(id, {
        controls: [
            'play-large',
            'restart',
            'play',
            'rewind',
            'fast-forward',
            'progress',
            'current-time',
            'mute',
            'volume',
            'settings',
            'fullscreen',
        ],
        settings: ['speed'],
        loadSprite: true,
        iconUrl: 'https://cdn.plyr.io/3.3.20/plyr.svg',
        blankUrl: 'https://cdn.plyr.io/static/blank.mp4',
        seekTime: 20,
        volume: 1,
        muted: false,
        i18n: i18n,
        tooltips: { controls: false, seek: true },
        speed: { selected: 0.75, options: [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2] },
    })

    if ($(id).hasClass('j-video_deny')) {
        player.on('playing', event => {
            player.stop()
            $('#modal_video_deny').modal()
        })
    }
    
    player.on('ready', event => {
        $('[data-plyr="settings"]').click(e => {
            e.preventDefault()
            const $target = $(e.target)
            $target
                .parent()
                .find('form')
                .css('display', 'none')
            $('#modal_diamond_user').modal()
        })
    });
    
    $(document).on('switch_voice', () => {
        player.stop()
    });
}

document.addEventListener('DOMContentLoaded', () => {
    plyr('#j-player');
    plyr('#j-playerFemale');
});
