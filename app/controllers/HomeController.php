<?php
class HomeController extends BaseController {
	public function showHome()
	{
		return View::make('home');
	}
	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$rules = array(
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);
			if (Auth::attempt($userdata)) {
				echo 'SUCCESS!';

			} else {
				return Redirect::to('login');
			}

		}
	}
}
