<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('トップ', route('home'));
});

// Home > Lesson
Breadcrumbs::for('lesson', function ($trail) {
    $trail->parent('home');
    $trail->push('レッスン一覧', route('lesson'));
});

// Home > Lesson
Breadcrumbs::for('lesson.detail', function ($trail, $name) {
    $trail->parent('lesson');
    $trail->push($name, route('lesson'));
});

// Home > Lesson
Breadcrumbs::for('lesson_detail', function ($trail) {
    $trail->parent('home');
    $trail->push('レッスン一覧', route('lesson'), ['display_link' => true]);
});
