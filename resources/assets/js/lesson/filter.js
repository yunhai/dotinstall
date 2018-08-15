$(document).ready(function() {
    $('.j-lessonFilter').on('change', (e) => {
        const difficulty = $('#filter-difficulty').val();
        const category = $('#filter-category').val();
        const keyword = $('#filter-keyword').val();
        const data = {difficulty, category, keyword};
        $.get('/ajax/lesson/filter', data, (result) => {
            $('#j-lessonFilterResult').html(result);
        })
    });
});