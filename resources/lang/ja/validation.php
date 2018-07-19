<?php  // resources/lang/ja/validation.php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted' => '承認してください。',
    'active_url' => '不正なURLです。',
    'after' => ':date以降の日付にしてください。',
    'alpha' => '半角英字で入力してください。',
    'alpha_dash' => '英数字とハイフンのみにしてください。',
    'alpha_num' => '半角英数字で入力してください。',
    'array' => '配列にしてください。',
    'before' => ':date以前の日付にしてください。',
    'between' => [
        'numeric' => ':min〜:maxの値を入力してください。',
        'file' => ':min〜:max KBまでのファイルにしてください。',
        'string' => ':min〜:max文字にしてください。',
        'array' => ':min〜:max個までにしてください。',
    ],
    'boolean' => '不正な値です。',
    'confirmed' => '確認用項目と一致していません。',
    'date' => '日付はyyyy/mm/ddの形式(ex.2017/1/12)で入力してください。',
    'date_format' => '日付は:formatの形式(ex.:example)で入力してください。',
    'date_multi_format' => '日付は:formatの形式(ex.:example)で入力してください。',
    'date_format_time' => '時間は:formatの形式で入力してください。',
    'different' => ':otherと違うものにしてください。',
    'digits' => ':digits桁の数値で入力してください。',
    'digits_between' => ':minまたは:max桁の数値で入力してください。',
    'email' => '不正なメールアドレスです。',
    'exists' => '不正なIDです。システム管理者に連絡して下さい。',
    'file' => '不正なファイルです。',
    'filled' => '必須です。',
    'image' => '画像にしてください。',
    'in' => '選択された正しくありません。',
    'integer' => '半角数値で入力してください。',
    'ip' => '正しいIPアドレスにしてください。',
    'max' => [
        'numeric' => ':max以内の数値で入力してください。',
        'file' => 'ファイルサイズは:maxMB以内でアップロードしてください。',
        'string' => ':max文字以内で入力してください。',
        'array' => ':max個までで入力してください。',
    ],
    'mimes' => 'ファイルの拡張子を:valuesのいずれかにしてください。',
    'min' => [
        'numeric' => ':min以上の数値で入力してください。',
        'file' => ':min KB以上で入力してください。',
        'string' => ':min文字以上で入力してください。',
        'array' => ':min個以上で入力してください。',
    ],
    'not_in' => '選択された正しくありません。',
    'numeric' => '半角数値（小数も可能）で入力してください。',
    'regex' => '書式が正しくありません。',
    'required' => ':attributeを入力してください',
    'required_if' => '「:other」が「:value」の場合、必須項目です。',
    'required_unless' => '「:other」が「:value」以外の場合、必須項目です。',
    'required_with' => ':valuesが存在する時、必須項目です。',
    'required_with_all' => ':valuesが存在する時、必須項目です。',
    'required_without' => ':valuesが存在しない時、必須項目です。',
    'required_without_all' => ':valuesが存在しない時、必須項目です。',
    'same' => 'と:otherは一致していません。',
    'size' => [
        'numeric' => ':sizeにしてください。',
        'file' => 'ファイルサイズは:sizeKB以内でアップロードしてください。',
        'string' => ':size文字にしてください。',
        'array' => ':size個にしてください。',
    ],
    'string' => '文字を入力してください。',
    'timezone' => '正しいタイムゾーンをしていしてください。',
    'unique' => '既に存在します。',
    'uploaded' => 'ファイルのアップロードが失敗しました。',
    'url' => '正しい書式にしてください。',
    ///////////////////////////////////////////////////////////////////
    'exists_config' => '不正な値です。システム管理者に連絡して下さい。',
    'fullkana' => '全角カタカナで入力してください。',
    'latin_alpha' => '半角英字で入力してください。',
    'latin_alpha_num' => '半角英数字で入力してください。',
    'ng_words' => 'NGワード":ng_words"が含まれています',
    'phone' => '10または11桁の数値で入力してください。',
    'phone_digits_between' => '10または11桁の数値で入力してください。',

    'exists_recruit_pic_user_id' => '企業組織の人材紹介担当が登録されていないため保存できません',
    'exists_recruit_job_category' => '求人_職種が登録されていないため保存できません',
    'exists_recruit_employment_type' => '雇用形態が登録されていないため保存できません',
    'exists_recruit_employment_period' => '雇用期間定めなしが登録されていない場合、求人にかかる雇用期間が登録されていない状態では保存できません。',
    'recruit_published_flag' => '企業組織ページの人材紹介求人掲載可否が「求人Web掲載不可」または「検討中」または「利用可否確認メール送信済」または「掲載可不可未確認」の場合、Web掲載可が「掲載可」では保存できません。',

    'unique_company' => '既に同一のBP(:company)タブが存在しているため、保存できません',
    'unique_enable_flag' => ':attributeが有効な営業情報が存在するため保存できません',
    'is_digits' => '半角数値で入力してください。',
    'before_now_with_day' => ':days日以上先の:attributeは入力できません',
    'file_extension' => 'ファイルの拡張子を:extensionsのいずれかにしてください。',
    'fullkananumber' => '全角カタカナか数値で入力してください。',
    'fullkanaspecialchar' => '全角カタカナかカッコで入力してください。',
    'halfkanaspecialchar' => '半角カタカナかカッコで入力してください。',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
    'custom' => [

    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes' => [
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'current_password' => '現在のパスワード',
        'new_password' => '新パスワード',
        'new_password_confirmation' => '新パスワード (確認)',
    ],
];
