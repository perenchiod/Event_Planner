@extends('layout.master')

@section('content')
<script type="text/javascript" src="/js/party.js"></script>
<div ng-app="planner" ng-controller="PartyController as PC">
	<span id="homeBody">
		{{ Form::open(array('action' => 'EventController@store' , 'method' => 'GET')) }}		
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog">
		    	<div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title">Create a party!</h4>
			      	</div>
			      	<div class="modal-body">
							<input class="form-control" id="focusedInput" type="text" name="title" placeholder="Title for event" value="@{{calendarEvent.title}}">
							<textarea rows="5" class="form-control" id="focusedInput" type="text" name="description" placeholder="Description" value="@{{calendarEvent.description}}"></textarea>
			                <div class='input-group date' id='datetimepicker1'>
			                    <input type='text' name="start" class="form-control" placeholder="Starting time" >
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
						    </div>
			                <div class='input-group date' id='datetimepicker2'>
			                    <input type='text' name="end" class="form-control" placeholder="Ending time">
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
							<input class="form-control" id="focusedInput" type="text" name="price" placeholder="Price" value="@{{calendarEvent.price}}">
						</div>
			      	<div class="modal-footer">
			        	 <button class="btn" data-dismiss="modal" ng-click="houdiniModal(); submitEvent();" aria-hidden="true">Next</button>
			      	</div>
		    	</div>
			</div>
		</div>

		<div id="locationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  	<div class="modal-dialog">
		    	<div class="modal-content">
			      	<div class="modal-header">
				    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				    	<h3>Location</h3>
				  	</div>
				  	<div class="modal-body">
				    	<input class="form-control" id="focusedInput" type="text" name="address" placeholder="Address" value="@{{location.address}}">
						<input class="form-control" id="focusedInput" type="text" name="city" placeholder="City" value="@{{location.city}}">
						<input class="form-control" id="focusedInput" type="text" name="state" placeholder="State" value="@{{location.state}}">
						<input class="form-control" id="focusedInput" type="number" name="zip" placeholder="Zip" value="@{{location.zip}}">
				  	</div>
				  	<div class="modal-footer">
						<button type="button" class="btn btn-default" ng-click="submitLocation();" data-dismiss="modal">Submit</button>
					</div>
				</div>
			</div>
		</div>
		{{Form::close()}}
		<h1>Create your own post here</h1>
		<button ng-click="editModal()">Party!</button>
	</span>
</div>
<div id="homeEvents">
	@foreach ($events as $event)
		<div class="event">
			<span id="title"> <a href="{{{ action('EventController@show' , $event->id)}}}">{{{ $event->title }}}</a> </span>
			<p id="description">{{{Str::words($event->description, 100) }}}</p>
			<span class="glyphicon glyphicon-time" id="time">&nbsp;Start: {{{ $event->start }}} End: {{{ $event->end }}}</span>
		</div>
	@endforeach
</div>

<!-- Pagination -->
{{ $locations->links() }}

@stop

@section('script')
 <script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
    });
</script>


@stop

