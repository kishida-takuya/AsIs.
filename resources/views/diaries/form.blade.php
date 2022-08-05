{!! Form::open(['route' => 'diaries.store', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('myfile', 'Select daily scene.') !!}
        {!! Form::file('myfile', null) !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
    </div>
    <div>
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}
