@extends('layouts.default')
@section('content')

{{ Form::open(array('url' => 'foo/bar')) }}
  echo Form::label('email', 'E-Mail Address', array('class' => 'awesome'));
{{ Form::close() }}
@stop