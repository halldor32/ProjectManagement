<?php
class ProjectController extends BaseController {

	public function getCreate() {
		return View::make('project.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), 
			array(
				'project_name'        	=> 'required',
				'info'         			=> 'required',
				'status_ID' 			=> 'required'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('project-create')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$project_name 	= Input::get('project_name');
			$info 			= Input::get('info');
			$status_ID		= Input::get('status_ID');

			$insertProject = DB::insert('insert into project (project_name, info, status_ID) values (?, ?, ?)', array($project_name, $info, $status_ID));

			if ($insertProject) {
				return Redirect::route('home');
			}
		}
	}

	public function getID($ID) {
		//$projectID = DB::select('SELECT ID FROM project WHERE ID = ?', array($ID));
		$projectID = DB::table('project')->where('ID', '=', $ID)->get();
		$projectCount = DB::table('project')->where('ID', '=', $ID)->count();

		if ($projectCount) {
			$projectID = $projectID[0]->ID;
			return 	View::make('project.project')
					->with('ID', $projectID);
		}
		return App::abort(404);
	}

}