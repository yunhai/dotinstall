function vimeo(id, $container, duration_name) {
    const option = {
        title: 0,
        portrait: 0,
        byline: 0,
    }
    const player = new Vimeo.Player(id, option);

    player.getDuration().then(function(duration) {
        const html = `<input type='hidden' name='${duration_name}' value='${duration}' />`;
        $container.append(html);
    });
}

function preview($target, $container, duration_name) {
    const date = new Date;
    const second = date.getSeconds();
    const minute = date.getMinutes();
    const hour = date.getHours();
    const milisecond = date.getMilliseconds();

    const id = `${hour}${minute}${second}${milisecond}`;
    const vimeo_path = $target.val();
    
    if (vimeo_path) {
        const html = `
            <div data-vimeo-url="${vimeo_path}" 
                data-vimeo-title="false"
                data-vimeo-portrait="false"
                data-vimeo-byline="false"
                data-vimeo-width="640" id="${id}">
            </div>
        `;
        $container.html(html);
        vimeo(id, $container, duration_name);
    } else {
        $container.html('');
    }
}

$('#url').change((e) => {
    const $target = $(e.target);
    const $container = $('#j-vimeoUrlContainer');
    preview($target, $container, 'duration');
})

$('#url_female').change((e) => {
    const $target = $(e.target);
    const $container = $('#j-vimeoUrlFemaleContainer');
    preview($target, $container, 'duration_female');
})