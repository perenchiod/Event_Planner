@extends('layout.master')

@section('content')

	<div class="showDiv">
		<h1 class="showH1">{{{$event->title}}}</h1>
		<p class="glyphicon glyphicon-time">Created {{ $event->created_at->format('l, F jS Y @ h:i:s A') }} </p> <br>
		<h3>Description:</h3>
		<p class="showDescription">{{{$event->description}}}</p>
		<!-- This is is for checking if the picture  -->
		@if(strchr($event->img,"://"))
			<img src="{{ $event->img }}" width="60%"></div>
		@else
			<img src="/{{ $event->img }}" width="60%"></div>
		@endif
		<span class="locationInfo">
			<h2 id="styleH2">Event location deets</h2>
			<div class="locationDeets">
				Address: <li class="address">{{$location->address}}</li>
				City: <li class="address">{{$location->city}}</li>
				State: <li class="address">{{$location->state}}</li>
				Zip: <li class="address">{{$location->zip}}</li>
			</div>
		</span>
	</div>

	@if(Auth::check())
		@if(Auth::user()->id == $event->user_id)
			<button>Edit</button>
			<button id="delete">Delete</button>
			{{ Form::open(array('action' =>array('CalendarEventController@destroy', $event->id), 'method' => 'DELETE' , 'id' => 'formDelete')) }}
			{{ Form::close() }}
		@endif
	@endif

@stop

@section('script')
	<script type="text/javascript">
		(function (){
			"use strict";
			
			$('#delete').on('click', function(){
				var onConfirm = confirm('Are you sure you want to delete this post?');
				if (onConfirm) {
					$('#formDelete').submit();
				}
			});
		})();
	</script>
	
@stop