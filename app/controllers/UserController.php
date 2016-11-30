<?php

class UserController extends BaseController {

	public function register()
	{
		$validator = Validator::make(Input::all(), User::$rules);
		if($validator->fails())
		{
			return Redirect::to('/')
				->withErrors($validator->messages()->first());
		}
		else
		{
			$user = User::create(array(
				'first_name' => Input::get('first_name'),
				'last_name' => Input::get('last_name'),
				'email' => Input::get('email'),
				'password' => Hash::make(Input::get('password'))
			));
		}
		

		if ($user) 
		{
			$deals = Deal::all();
			Auth::login($user);
			return Redirect::to('/')
				->withMessages('You have successfully registered!')
				->with('deals', $deals);
		}
		else
		{
			return Redirect::to('/')
				->withErrors($validator->messages());
		}
	}
	

	//get $ post requests for signup, login $ logout
	
	

	public function postLogin()
	{
		if (Auth::attempt(Input::only('email', 'password')))
		{
			return Redirect::to('/')->withErrors('You have successfully logged in!');
		}
		else
		{
			return Redirect::to('/')->withErrors('Invalid Credentials')->withInput();
		}

	}

	public function postLogout()
	{
		Session::flush();
		Auth::logout();
		return Redirect::to('/')
			->withErrors('You are now logged out.');
	}
	
	//get $ post requests for create_profile, edit_profile $ delete_profile
	

	

	public function getCreateProfile()
	{
		$deals = Deal::all();
		$user = Auth::user();
		return View::make('pages.edit_profile')
			->with('user', $user)
			->with('deals', $deals);
	}

	public function getProfile($id)
	{
		$user = Auth::user();
		return View::make('pages.profile')
			->with('user', $user)
			->with('where', ' ');
	}


	public function getDeleteProfile()
	{
		return View::make('pages.edit_profile');
	}
	
	public function postCreateProfile($id)
	{
		$user = User::find($id);
		if($user->getsProfile)
		{
			$profile = Profile::find($user->getsProfile->id);
			$profile->city = Input::get('city');
			$profile->state = Input::get('state');
			$profile->address = Input::get('address');
			$profile->phone = Input::get('phone');
			$profile->update();
		}
		else
		{
			$profile = new Profile;
			$profile->user_id = Auth::user()->id;
			$profile->city = Input::get('city');
			$profile->state = Input::get('state');
			$profile->address = Input::get('address');
			$profile->phone = Input::get('phone');
			$profile->save();
		}
		return Redirect::back()
			->withErrors('Profile updated');
	}

	public function postEditProfile()
	{
		return Redirect::to('/');
	}

	public function postDeleteProfile()
	{
		return View::make('pages.news');
	}

	//get $ post requests for notification

	public function getNotification($id)
	{
		
		return View::make('pages.notification');
	}

	public function getNotifications()
	{
		
		return View::make('pages.notification');
	}
	
	public function getDeleteNotification($id)
	{
		
		return View::make('pages.notification');
	}

	public function postDeleteNotification()
	{
		
		return Redirect::view('pages.news');
	}
}