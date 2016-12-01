<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class News extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;



	protected $table = 'blogs';	
	protected $fillable = array('pic_url', 'title', 'content', 'user_id');

	public static $rules = array
	(
		'title' => 'required',
		'content' => 'required',
		'pic_url' => 'image'
	);
	
	//reverse relationship with User model (hasWritten)
	public function getUser()
	{
		return $this->belongsTo('User', 'user_id');	
	}

	//relationship with Comment model
	public function getComments()
	{
		return $this->hasMany('Comment', 'news_id');
	}


	
	
}
