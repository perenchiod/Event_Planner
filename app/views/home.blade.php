@extends('layout.master')

@section('content')
<script type="text/javascript" src="/js/party.js"></script>
<div ng-app="planner" ng-controller="PartyController as PC">
	<h1>Alright</h1>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title">Create a party!</h4>
		      	</div>
		      	<div class="modal-body">
		        	<p>Body</p>
					<input class="form-control" id="focusedInput" type="text" name="title" placeholder="Title for event" value="@{{calendarEvent.title}}">
					<input class="form-control" id="focusedInput" type="text" name="description" placeholder="Description" value="@{{calendarEvent.description}}">
					<input class="form-control" id="focusedInput" type="datetime" name="start" placeholder="Starting time" value="@{{calendarEvent.start}}">
					<input class="form-control" id="focusedInput" type="datetime" name="end" placeholder="Ending time" value="@{{calendarEvent.end}}">
					<input class="form-control" id="focusedInput" type="text" name="price" placeholder="Price" value="@{{calendarEvent.price}}">
		      	</div>
		      	<div class="modal-footer">
		        	 <button class="btn" data-dismiss="modal" ng-click="houdiniModal() submitEvent()" aria-hidden="true">Next</button>
		      	</div>
	    	</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

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
			    	<button class="btn" data-dismiss="modal" aria-hidden="true" ng-click="submitLocation()">OK</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	  	</div>
			</div>
		</div>
	</div>
	<button ng-click="editModal()">Party!</button>
</div>
@stop

