$('.j-goback').click((e) => {
    const $target = $(e.target);
    const url = $target.data('url');

    if (url) {
        window.location = url;
        return true;
    }

    if (history.length === 1) {
        window.location = '/backend';
        return true;
    }

    history.back();
});
