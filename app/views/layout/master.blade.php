<html lang='en'>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="/bower_components/angular/angular.min.js"></script>
  	<script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>

  	<!-- Datetime components used for date picker -->
  	<link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"/>
  	<script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

  	<!-- CSS sheet -->
  	<link rel="stylesheet" type="text/css" href="/css/CalendarEvent.css">
  	
	<!-- Multiple select plugin -->
	<link rel="stylesheet" href="/bower_components/bootstrap-multiselect/dist/css/bootstrap-multiselect.css" type="text/css"/>
  	<script type="text/javascript" src="/bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
  	<!-- Infinite scrolling -->
  	<script type='text/javascript' src='bower_components/ngInfiniteScroll/build/ng-infinite-scroll.min.js'></script>
  	
  	<title>Events</title>
  	<!-- Google fonts -->
  	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	
	<body>
		@yield('header')
		@yield('content')
		@yield('script')
	</body>
</html>