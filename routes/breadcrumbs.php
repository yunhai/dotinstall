<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('トップ', route('home'));
});

// 利用規約
Breadcrumbs::for('terms', function ($trail) {
    $trail->parent('home');
    $trail->push('利用規約', route('terms'));
});

// プライバシーポリシー
Breadcrumbs::for('privacy', function ($trail) {
    $trail->parent('home');
    $trail->push('プライバシーポリシー', route('privacy'));
});

// 運営者情報
Breadcrumbs::for('company', function ($trail) {
    $trail->parent('home');
    $trail->push('運営者情報', route('company'));
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
