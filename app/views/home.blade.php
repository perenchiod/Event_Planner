@extends('layout.master')

@section('content')
<script type="text/javascript" src="/js/party.js"></script>
<div ng-app="planner" ng-controller="PartyController as PC">
	<span id="homeBody">	
		
		@if (Session::has('successfulLogin'))
    		<div class="alert alert-success">{{{ Session::get('successfulLogin') }}}</div>
		@endif

		@if (Session::has('loggedOut'))
    		<div class="alert alert-success">{{{ Session::get('loggedOut') }}}</div>
		@endif
		
		@if (Session::has('failedLogin'))
    		<div class="alert alert-danger">{{{ Session::get('failedLogin') }}}</div>
		@endif

		{{ Form::open(array('action' => 'HomeController@doLogin')) }}
			@include('partials.login')	
		{{ Form::close() }}
		
		{{ Form::open(array('action' => 'CalendarEventController@store', 'files' => true)) }}

			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  	<div class="modal-dialog">
			    	<div class="modal-content">
				      	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        	<h4 class="modal-title">Create a party!</h4>
				      	</div>

				      	<div class="modal-body">
				      		Location: <select name="locationID" id="locationSelect" multiple="multiple"> 
				      			@foreach ($locations as $location)    	
									<option value="{{$location->id}}">{{$location->city}}, {{$location->state}}, Address: {{$location->address}}</option>
								@endforeach
							</select>
							Location not here? <a href="{{{ action('LocationController@create')}}}">Create location</a>

							<input class="form-control @if($errors->has('title')) has-error @endif" id="focusedInput title" type="text" name="title" placeholder="Title for event" value="@{{calendarEvent.title}}" required>
							<textarea rows="5" class="form-control" id="focusedInput description" type="text" name="description" placeholder="Description" value="@{{calendarEvent.description}}" required></textarea>
			                <div class='input-group date' id='datetimepicker1'>
			                    <input name="start" class="form-control" id="start" placeholder="Starting time" required>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
						    </div>
			                <div class='input-group date' id='datetimepicker2'>
			                    <input name="end" class="form-control" id="end" placeholder="Ending time" required>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
							<input class="form-control" id="focusedInput price" type="text" name="price" placeholder="Price" value="@{{calendarEvent.price}}">
							<div class="input-group">
					            Upload Image {{ Form::file('img', null, array('class' => 'form-control')) }}					     					     
						    </div>
						</div>
				      	<div class="modal-footer">
				        	 {{ Form::submit('Send this form!') }}
				      	</div>
			    	</div>
				</div>
			</div>
		{{ Form::close() }}
		<h1 id="homeH1">Event planner of the ages</h1>
		<div class="row">
			@if(Auth::check())
				<button ng-click="editModal()" class="col-md-3 btn btn-primary">Create Event!</button>
				<div class="col-md-1"></div>
				{{ Form::open(array('action' => 'HomeController@doLogout')) }}
		      		<button type="submit" class="col-md-3 btn btn-info">Logout</button>
				{{ Form::close() }}
	      	@else
				<button ng-click="loginModal()" class="col-md-3 btn btn-info">Login!</button>
	      	@endif
		</div>
	</span>
</div>
<div id="homeEvents">
	@foreach ($events as $event)
		<div class="event">
			<span id="title"> <a href="{{{ action('CalendarEventController@show' , $event->id)}}}">{{{ $event->title }}}</a> </span>
			@if(Auth::check())
				<button class="RSVP">RSVP</button>
			@endif
			<p id="description">{{{Str::words($event->description, 35) }}}</p>
			<span class="glyphicon glyphicon-time" id="time">&nbsp;Start: {{{ $event->start }}} End: {{{ $event->end }}}</span>
		</div>
	@endforeach
</div>

<!-- Pagination -->
{{$events->links()}}

@stop

@section('script')
 <script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
    });

    $(document).ready(function() {
        $('#locationSelect').multiselect({
        	nonSelectedText: 'Pick location!',
        	maxHeight: 500,
        	onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = $('#locationSelect option:selected');

        	if (selectedOptions.length >= 1) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = $('#locationSelect option').filter(function() {
                        return !$(this).is(':selected');
                    });
 
                    var dropdown = $('#locationSelect').siblings('.multiselect-container');
                    nonSelectedOptions.each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });
                }
                else {
                    // Enable all checkboxes.
                    var dropdown = $('#locationSelect').siblings('.multiselect-container');
                    $('#locationSelect option').each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }            
        });
    });
</script>




@stop

