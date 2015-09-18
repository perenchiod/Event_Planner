<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<span class="bg-danger" id="failedLogin">@if(Session::has('failedLogin')) {{{ Session::get('failedLogin') }}} @endif</span>
	<span id="loginForm">
		<div class="modal-dialog">
		<div class="modal-content">
		  	<div class="modal-header">
			  	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			  	<h1 class="text-center">Login Here</h1>
		 	</div>
		  	<div class="modal-body">
			  	<form class="form col-md-12 center-block">
					<div class="form-group">
					  	<input type="text" name="username" class="form-control focusedInput" placeholder="Username" value="{{{ Input::old('username') }}}">
					</div>
					<div class="form-group">
					  	<input type="password" name="password" class="form-control focusedInput" placeholder="Password">
					</div>
					<div class="form-group">
					  	<button class="btn btn-info btn-lg btn-block">Sign In</button>
					  	<span class="pull-right"><a href="{{{ action('HomeController@registerUser')}}}">Register</a></span><span><a href="">Need help?</a></span>
					</div>
			 	</form>
		  	</div>
	  	</div>
	  </div>
</span>
</div>

