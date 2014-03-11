@extends('layout.main')

@section('content')
	@if(Auth::check())
	<div class="width sign-in-margin margin-null-auto">
		
		
		<?php 
		
			$results = DB::select('SELECT project.ID, project_name, info, status FROM project JOIN status ON status.ID=project.status_ID');

			
				$userID = Auth::user()->ID;
			
			
			$YourProjects = DB::select('SELECT project.ID, project_name, project.info, (SELECT status FROM status WHERE status.ID = project.status_ID) as status FROM project JOIN work_part ON project.ID=work_part.project_ID JOIN users_has_work_part ON work_part.ID=users_has_work_part.work_part_ID JOIN users ON users_has_work_part.user_ID=users.ID WHERE users.ID = ?', array($userID));
			
		 ?>
		 <!-- if user is a part of any project -->
		 @if($YourProjects)
		<h1 class="text-center">Your Projects</h1>
		<div class="row">
		<div class="small-12 columns">
		<table class="table">
		  <thead>
		    <tr>
		      <td>name</td>
		      <td>Info</td>
		      <td>Status</td>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($YourProjects as $YourProject)
		    <tr>
		      <td><a href="{{ URL::route('project-id', $YourProject->ID) }}">{{ $YourProject->project_name }}</a></td>
		      <td>{{ $YourProject->info }}</td>
		      <td>{{ $YourProject->status }}</td>
		    </tr>
		  	@endforeach
		  </tbody>
		</table>
		</div>
		</div>
		@endif
		<!-- if user is authenticated as project manager -->
		@if(Auth::check() && Auth::User()->role_ID == 1)
		<h1 class="text-center">All Projects</h1>
		<div class="row">
		<div class="small-12 columns">
		<table class="table">
		  <thead>
		    <tr>
		      <td>name</td>
		      <td>Info</td>
		      <td>Status</td>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($results as $result)
			<tr>
		      <td><a href="{{ URL::route('project-id', $result->ID) }}">{{ $result->project_name }}</a></td>
		      <td>{{ $result->info }}</td>
		      <td>{{ $result->status }}</td>
		    </tr>
		  	@endforeach
		  </tbody>
		</table>
		</div>
		</div>
		@endif
		@endif
	</div>
@stop