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

// お問い合わせ
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('home');
    $trail->push('お問い合わせ', route('contact'));
});

// ログイン
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push('ログイン', route('login'));
});

// 新規ユーザー登録
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push('新規ユーザー登録', route('register'));
});

// クレジットカード決済
Breadcrumbs::for('stripe', function ($trail) {
    $trail->parent('home');
    $trail->push('クレジットカード決済', route('stripe'));
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
