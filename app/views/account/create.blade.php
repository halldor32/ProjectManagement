@extends('layout.main')

@section('content')
<div class="row margin-null-auto">
	<div class="large-12 sign-in-margin columns">
		<h1 class="text-center">Create account</h1>
		<div class="margin-null-auto sign-in">
			<form action="{{ URL::route('account-create-post') }}" method="post">
				
				<div class="row">
					<div class="small-12 field columns">
						<input type="text" name="first_name" placeholder="First name" {{ (Input::old('first_name')) ? ' value="' . e(Input::old('first_name')) . '"' : '' }}>	
						@if($errors->has('first_name'))
							{{ $errors->first('first_name') }}
						@endif
					</div>
				</div>
				<div class="row">
					<div class="small-12 field columns">
						<input type="text" placeholder="Last name" name="last_name"{{ (Input::old('last_name')) ? ' value="' . e(Input::old('last_name')) . '"' : '' }}>	
						@if($errors->has('last_name'))
							{{ $errors->first('last_name') }}
						@endif
					</div>
				</div>
				<div class="row">
					<div class="small-12 field columns">
						<input type="text" placeholder="Email" name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) . '"' : '' }}>	
						@if($errors->has('email'))
							{{ $errors->first('email') }}
						@endif
					</div>
				</div>
				<?php $results = DB::select('SELECT role_name, role.ID FROM role'); ?>
				<div class="row">
					<div class="small-12 field columns">
						<select name="role">
				          <option></option>

				          	@foreach($results as $result)
								<option value="{{ $result->ID }}">{{ $result->role_name }}</option>
				           	@endforeach
				        </select>
				        @if($errors->has('role'))
							{{ $errors->first('role') }}
						@endif
					</div>
				</div>
				<div class="row">
					<div class="small-12 text-center field create-input-margin columns">
						<input type="submit" class="button small" value="Create account">
					</div>
				</div>
					
					{{ Form::token() }}
			</form>
@stop