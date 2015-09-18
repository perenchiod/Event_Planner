@extends('layout.master')

@section('content')

    {{ Form::open(array('action' => 'CalendarEventController@store', 'files' => true)) }}

        @include('partials.event_form')

    {{Form::close()}}

@stop