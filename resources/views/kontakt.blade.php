@extends('app')

@section('content')
    <h1>Kontakt</h1>
    @if ( $errors->count() > 0 )
        <div class="col-sm-offset-2 col-sm-10">
            <div class="alert alert-danger" role="alert">
                <p>Leider sind folgende Fehler aufgetreten:</p>
                <ul>
                    @foreach( $errors->all() as $message )
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if (session('sendsuccess'))
        <div class="col-sm-offset-2 col-sm-10">
            <div class="alert alert-success" role="alert">Wir haben Ihre Nachricht erhalten. Vielen Dank dafür!</div>
        </div>
    @endif
    {!! Form::open(array('action' => 'PageController@kontakt', 'method' => 'post', 'class' => 'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('email', 'E-Mail Adresse', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Deine E-Mail Adresse')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('message', 'Nachricht', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('message', '', array('class' => 'form-control', 'placeholder' => 'Deine Nachricht')) !!}
        </div>
    </div>
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit('NACHRICHT ABSENDEN', array('class' => 'btn btn-default'));  !!}
    </div>
    {!! Form::close() !!}
@endsection