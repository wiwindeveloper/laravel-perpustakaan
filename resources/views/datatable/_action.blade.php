{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message] ) !!}
    <a href="{{ $edit_url }}">Ubah</a> &nbsp;|&nbsp;
    {!! Form::submit('Hapus', ['class'=>'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}