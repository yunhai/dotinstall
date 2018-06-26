<div class="card">
    <div class="card-header">
        <i class="fa fa-edit"></i>
        {{ $form_label }}
    </div>
    <div class="card-body">
        <form method="post" action="{{ $form_action }}">
            @csrf

            <table class="table table-bordered">
                <tbody>
                    @foreach ($form_field as $field)
                        @include('backend.component.form.' . $field['field_type'], $field)
                    @endforeach
                </tbody>
            </table>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary btn-sm" value="{{ $form_btn }}">
            </div>
        </form>
    </div>
</div>
