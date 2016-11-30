<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';	

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('first_name', 'last_name', 'email', 'password');

	public static $rules = array(
		'first_name' => 'required|alpha|min:6',
		'last_name' => 'required|alpha|min:6',
		'email' => 'required|email|unique:users',
		'password' => 'required|min:6|alpha_num',
		'password1' => 'same:password'
		);
	
	public function cantBid(Deal $deal)
	{
		$bid = Bid::where('item_id', '=', $deal->id)->where('user_id', '=', $this->id)->get();
		return $bid;
	}
 
	//relationship with Profile model
	public function getsProfile()
	{
		return $this->hasOne('Profile', 'user_id');
	}

	//write relationship with News model
	public function hasWritten()
	{
		return $this->hasMany('News', 'user_id');
	}

	

	//relationship with Deal model
	public function hasDeals()
	{
		return $this->hasMany('Deal', 'user_id');
	}

	//relationship with Bid model
	public function hasBids()
	{
		return $this->hasMany('Bid', 'user_id');
	}
	
}
