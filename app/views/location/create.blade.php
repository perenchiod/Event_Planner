@extends('layout.master')

@section('content')

{{ Form::open(array('action' => 'LocationController@store', 'files' => true)) }}
	
  	<div class="modal-dialog">
    	<div class="modal-content">
	      	<div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		    	<h3>Location for event</h3>
		  	</div>
		  	<div class="modal-body">
		    	<input class="form-control" id="focusedInput" type="text" name="address" placeholder="Address" required>
				<input class="form-control" id="focusedInput" type="text" name="city" placeholder="City" required>
				<input class="form-control" id="focusedInput" type="text" name="state" placeholder="State" required>
				<input class="form-control" id="focusedInput" type="number" name="zip" placeholder="Zip" required>
		  	</div>
		  	<div class="modal-footer">
		      	{{ Form::submit('Create') }}
			</div>
		</div>
	</div>
	
{{Form::close()}}


@stop