var player = new Plyr('#player', {
	controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'pip', 'airplay', 'fullscreen'],
	settings: ['speed', 'loop'],
	loadSprite: true,
	iconUrl: 'https://cdn.plyr.io/3.3.20/plyr.svg',
	blankUrl: 'https://cdn.plyr.io/static/blank.mp4',
	seekTime: 20,
	volume: 1,
	muted: true
});