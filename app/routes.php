<?php
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));


// Authenticated group
Route::group(array('before' => 'auth'), function() {

	// CSRF protection group
	Route::group(array('before' => 'csrf'), function() {

	// change password (POST)
	Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
	));

	// Create account (POST)
		Route::post('/account/create', array(
				'as' => 'account-create-post',
				'uses' => 'AccountController@postCreate'
		));

		// Create account (POST)
		Route::post('/project/create', array(
				'as' => 'project-create-post',
				'uses' => 'ProjectController@postCreate'
		));

	});

	// change password (GET)
	Route::get('/account/change-password', array(
			'as' => 'account-change-password',
			'uses' => 'AccountController@getChangePassword'
	));

	// Sign out (GET)
	Route::get('/account/sign-out', array(
			'as' => 'account-sign-out',
			'uses' => 'AccountController@getSignOut'
	));

	// Create account (GET)
	Route::get('/account/create', array(
			'as' => 'account-create',
			'uses' => 'AccountController@getCreate'
	));

	// Create project (GET)
	Route::get('/project/create', array(
			'as' => 'project-create',
			'uses' => 'ProjectController@getCreate'
	));

	// Create project (GET)
	Route::get('/project/{ID}', array(
			'as' => 'project-id',
			'uses' => 'ProjectController@getID'
	));

});

// Unauthenticated group
Route::group(array('before' => 'guest'), function() {

	// CSRF protection group
	Route::group(array('before' => 'csrf'), function() {

		// Sign in (POST)
		Route::post('/account/sign-in', array(
				'as' => 'account-sign-in-post',
				'uses' => 'AccountController@postSignIn'
		));

	});

	// Forgot password (GET)
	Route::get('/account/forgot-password', array(
			'as' => 'account-forgot-password',
			'uses' => 'AccountController@getForgotPassword'
	));

	// Sign in (GET)
	Route::get('/account/sign-in', array(
			'as' => 'account-sign-in',
			'uses' => 'AccountController@getSignIn'
	));

});