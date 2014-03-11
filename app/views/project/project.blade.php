@extends('layout.main')

@section('content')
	<?php $project = DB::table('project')->where('ID', '=', $ID)->get(); 
		$projectAll = DB::select('SELECT project_name FROM project JOIN work_part ON project.ID=work_part.project_ID JOIN users_has_work_part ON work_part.ID=users_has_work_part.work_part_ID JOIN users ON users_has_work_part.user_ID=users.ID WHERE project.ID = ?', array($ID));

	?>
	@if($projectAll)
	<div class="row">
		<div class="large-12 columns">
			<h1 class="text-center">{{ $projectAll[0]->project_name }}</h1>
		  	
		</div>
	</div>
	@else
	<div class="row">
		<div class="large-12 columns">
			<h1 class="text-center">{{ $project[0]->project_name }}</h1>
			
			
		</div>
	</div>
	@endif

@stop