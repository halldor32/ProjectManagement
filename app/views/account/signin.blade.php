<div class="row margin-null-auto">
	<div class="large-12 sign-in-margin columns">
		<h1 class="text-center">Sign in</h1>
		<div class="margin-null-auto sign-in">
			<form action="{{ URL::route('account-sign-in-post') }}" method="post">
				
				<div class="row">
				<div class="small-12 field columns">
					<input type="text" placeholder="Email" name="email"{{ Input::old('email') ? ' value="' . Input::old('email') . '"' : '' }}>
					@if ($errors->has('email'))
						{{ $errors->first('email') }}
					@endif
				</div>
				</div>
				<div class="row">
				<div class="small-12 field columns">
					<input type="password" placeholder="Password" name="password">
					@if ($errors->has('password'))
						{{ $errors->first('password') }}
					@endif
				</div>
				</div>
				<div class="row">
				<div class="small-12 field columns">
					<input type="checkbox" name="remember" id="remember">
					<label for="remember">Remember me</label>
				</div>
				<div class="row">
				<div class="small-12 text-center field columns">
				<input type="submit" class="button small" value="Sign in">
				</div>
				</div>
				{{ Form::token() }}
			</form>
		</div>
	</div>
</div>