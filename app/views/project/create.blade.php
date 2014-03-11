@extends('layout.main')

@section('content')
<div class="row margin-null-auto">
	<div class="large-12 sign-in-margin columns">
		<h1 class="text-center">Create project</h1>
		<div class="margin-null-auto sign-in">
			<form action="{{ URL::route('project-create-post') }}" method="post">
				
				<div class="row">
					<div class="small-12 field columns">
						<input type="text" name="project_name" placeholder="Project name" {{ (Input::old('project_name')) ? ' value="' . e(Input::old('project_name')) . '"' : '' }}>	
						@if($errors->has('project_name'))
							{{ $errors->first('project_name') }}
						@endif
					</div>
				</div>
				<div class="row">
					<div class="small-12 field columns">
						<textarea name="info" placeholder="Info" class="info" id="info">{{ (Input::old('info')) ? e(Input::old('info')) : '' }}</textarea>
						@if($errors->has('info'))
							{{ $errors->first('info') }}
						@endif
					</div>
				</div>
				<?php $results = DB::select('SELECT * FROM status'); ?>
				<div class="row">
					<div class="small-12 field columns">
						<select name="status_ID">
				          <option></option>

				          	@foreach($results as $result)
								<option value="{{ $result->ID }}">{{ $result->status }}</option>
				           	@endforeach
				        </select>
				        @if($errors->has('status_ID'))
							{{ $errors->first('status_ID') }}
						@endif
					</div>
				</div>
				<div class="row">
					<div class="small-12 text-center field create-input-margin columns">
						<input type="submit" class="button small" value="Create project">
					</div>
				</div>
					
					{{ Form::token() }}
			</form>
@stop