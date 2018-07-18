let editor;
$('.ace__item--body').each((index, item) => {
    const $target = $(item);
    const language = $target.data('language');
    const id = $target.data('id');

    editor = ace.edit(id);
    editor.setTheme("ace/theme/chrome");
    editor.getSession().setMode(`ace/mode/${language}`);
})