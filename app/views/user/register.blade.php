@extends('layout.master')

@section('content')

<h1 id="title">Create accout page</h1>
<div class="well colors col-sm-offset-2 col-sm-8 col-md-8">
	{{ Form::open(array('action' => 'HomeController@storeUser', 'files' => true)) }}
	    <div class="form-group @if($errors->has('first_name')) has-error @endif">
	        {{ Form::label('first_name', 'First Name') }}
	        {{ Form::text('first_name', null, ['class' => 'form-control focusedInput'])}}
	    </div>

	    <div class="form-group @if($errors->has('last_name')) has-error @endif">
	        {{ Form::label('last_name', 'Last Name') }}
	        {{ Form::text('last_name', null, ['class' => 'form-control focusedInput'])}}
	    </div>

	    <div class="form-group @if($errors->has('email')) has-error @endif">
	        {{ Form::label('email', 'Email') }}
	        {{ Form::text('email', null, ['class' => 'form-control focusedInput'] )}}
	    </div>

	    <div class="form-group @if($errors->has('username')) has-error @endif">
	        {{ Form::label('username', 'Username') }}
	        {{ Form::text('username', null, ['class' => 'form-control focusedInput'])}}
	    </div>
	    
	    Password: <input name="password" ng-model="password" type="password">
		Confirm: <input name="" ng-model="passwordConfirm" type="password" match="password">
    {{ Form::submit('Send this form!') }}
    
</div>

@stop