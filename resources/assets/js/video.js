document.addEventListener('DOMContentLoaded', () => {
  const player = new Plyr('#j-player',
      {
          controls: ['play-large', 'restart', 'play', 'rewind', 'fast-forward', 'progress', 'current-time', 'mute', 'volume', 'settings', 'fullscreen'],
          settings: ['speed'],
          loadSprite: true,
          iconUrl: 'https://cdn.plyr.io/3.3.20/plyr.svg',
          blankUrl: 'https://cdn.plyr.io/static/blank.mp4',
          seekTime: 20,
          volume: 1,
          muted: true
      }
  );
  $('#j-player').removeClass('hidden')
});