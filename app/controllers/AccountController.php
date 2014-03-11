<?php 
class AccountController extends BaseController {

	public function getSignIn() {
		return View::make('account.signin');
	}

	public function postSignIn() {
		$validator = Validator::make(Input::all(), 
			array(
				'email' => 'required|email',
				'password' => 'required'
			)
		);

		if ($validator->fails()) {
			return 	Redirect::route('home')
					->withErrors($validator)
					->withInput();
		} else {

			$remember = Input::has('remember');

			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
			), $remember);
			if ($auth) {
				return Redirect::intended('/');
			}
			else {
				return 	Redirect::route('home')
				->with('global', 'Email/password wrong');
			}

		}

		return 	Redirect::route('home')
				->with('global', 'There was a problem signing you in.');

	}

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), 
			array(
				'first_name'        => 'required',
				'last_name'         => 'required',
				'email' 			=> 'required|max:50|email|unique:users',
				'role' 				=> 'required'
			)
		);

		if ($validator->fails()) {
			return Redirect::route('account-create')
			->withErrors($validator)
			->withInput();
		}
		else
		{
			$first_name = Input::get('first_name');
			$last_name 	= Input::get('last_name');
			$email 		= Input::get('email');
			$password 	= 'mypassword';
			$role		= Input::get('role');

			// Activation code
			$code 		= str_random(60);

			$user = User::create(array(
					'first_name' => $first_name,
					'last_name' => $last_name,
					'email' => $email,
					'password' => Hash::make($password),
					'role_ID' => $role
				)
			);

			if ($user) {

				// Mail::send('emails.auth.change', array('link' => URL::route('account-create', $code), 'first_name' => $first_name), function($message) use ($user) {
				// 	$message->to($user->email, $user->first_name)->subject('Change password');
				// });

				return Redirect::route('home')
						->with('global', 'Your account has been created! We have sent you an email to activate your account.');
			}
		}
	}

}