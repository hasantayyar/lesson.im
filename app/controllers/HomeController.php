<?php
class HomeController extends BaseController {
	protected $layout = 'layouts.main';
	public function showHome()
	{
		$this->layout->content = View::make('home');
	}
	public function showLogin()
	{
		$this->layout->content =  View::make('login');
	}

	public function doLogin()
	{
		$rules = array(
			'email'    => 'required|email', 
			'password' => 'required|alphaNum|min:3' 
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
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
