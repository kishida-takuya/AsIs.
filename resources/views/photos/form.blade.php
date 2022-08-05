{!! Form::open(['route' => 'diaries.store', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}

<div class="form-group">
{!! Form::label('myfile', 'Upload a file') !!}
{!! Form::file('myfile', null) !!}
</div>

<div class="form-group">
{!! Form::submit('Upload') !!}
</div>

{!! Form::close() !!}