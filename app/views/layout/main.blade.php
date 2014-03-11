<!DOCTYPE html>
<html>
	<head>
		<title>Project Management</title>
		{{ HTML::style('css/foundation.css') }}
		{{ HTML::style('css/normalize.css'); }}
		{{ HTML::style('css/main.css') }}

		{{ HTML::script('js/jquery.js') }}
	</head>
	<body>

		@include('layout.navigation')

		@if(Session::has('global'))
			<p>{{ Session::get('global') }}</p>
		@endif
		
		@if(Auth::check())
		<div class="hide-for-medium-down">
			@yield('content')
		</div>
		@else
			<div class="hide-for-medium-down">
				@include('account.signin')
			</div>
		@endif


		<!-- Scripts -->
		{{ HTML::script('js/jquery.js') }}
		{{ HTML::script('js/foundation.min.js'); }}
		<script>
    		$(document).foundation();
  		</script>
	</body>
</html>