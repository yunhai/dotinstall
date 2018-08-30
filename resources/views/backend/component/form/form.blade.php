<div class="card">
    <div class="card-header">
        <i class="fa fa-edit"></i>
            {{ $form_label }}
    </div>
    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form method="post"
            @if (!empty($form_attribute))
                @foreach ($form_attribute as $key => $value)
                    {{ $key }}="{{ $value }}"
                @endforeach
            @endif
        >
            @csrf

            <table class="table table-bordered">
                <tbody>
                    @foreach ($form_field as $field)
                        @php
                            $field['field_value'] = @old($field['field_name'], $field['field_value']);
                        @endphp
                        @include('backend.component.form.' . $field['field_type'], $field)
                    @endforeach
                </tbody>
            </table>
            <div class="form-group text-center">
                <span class="btn btn-secondary btn-sm j-goback" data-url={{ $form_back_url ?? '' }}>キャンセル</span>
                <input type="submit" class="btn btn-primary btn-sm j-submit" value="{{ $form_btn }}">
            </div>
        </form>
    </div>
</div>
