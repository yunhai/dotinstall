<?php
// Home
Breadcrumbs::for('top', function ($trail) {
    $trail->push('トップ', route('top'));
});

// マイページ
Breadcrumbs::for('home', function ($trail) {
    $trail->parent('top');
    $trail->push('マイページ', route('home'));
});

// 利用規約
Breadcrumbs::for('terms', function ($trail) {
    $trail->parent('top');
    $trail->push('利用規約', route('terms'));
});

// プライバシーポリシー
Breadcrumbs::for('privacy', function ($trail) {
    $trail->parent('top');
    $trail->push('プライバシーポリシー', route('privacy'));
});

// 運営者情報
Breadcrumbs::for('company', function ($trail) {
    $trail->parent('top');
    $trail->push('運営者情報', route('company'));
});

// お問い合わせ
Breadcrumbs::for('contact', function ($trail) {
    $trail->parent('top');
    $trail->push('お問い合わせ', route('contact'));
});

// ログイン
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('top');
    $trail->push('ログイン', route('login'));
});

// 新規ユーザー登録
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('top');
    $trail->push('新規ユーザー登録', route('register'));
});

// パスワード再設定手続き
Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('top');
    $trail->push('パスワード再設定手続き', route('password.request'));
});

// パスワードの再設定
Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('top');
    $trail->push('パスワードの再設定');
});

// クレジットカード決済
Breadcrumbs::for('stripe', function ($trail) {
    $trail->parent('top');
    $trail->push('クレジットカード決済', route('stripe'));
});

// アフィリエイト
Breadcrumbs::for('affiliate', function ($trail) {
    $trail->parent('top');
    $trail->push('アフィリエイト', route('affiliate'));
});

// Home > Lesson
Breadcrumbs::for('lesson', function ($trail) {
    $trail->parent('top');
    $trail->push('レッスン一覧', route('lesson'));
});

// Home > Lesson
Breadcrumbs::for('lesson.detail', function ($trail, $name) {
    $trail->parent('lesson');
    $trail->push($name, route('lesson'));
});

// Home > Lesson
Breadcrumbs::for('lesson_detail', function ($trail) {
    $trail->parent('top');
    $trail->push('レッスン一覧', route('lesson'), ['enable_link' => true]);
});
