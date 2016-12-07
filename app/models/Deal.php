
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Deal extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	
	protected $table = 'deals';
	protected $fillable = array('user_id', 'pic_url', 'title', 'description', 'price', 'available');

	public static $rules = array
	(
		'title' => 'required',
		'description' => 'required',
		'price' => 'required',
		'pic_url' => 'image',
		'available' => 'number'
	);


	//reverse relationship with User model (hasDeals)
	public function getUser()
	{
		return $this->belongsTo('User', 'user_id');	
	}
	 
	//relationship with Bid model
	public function getBids()
	{
		return $this->hasMany('Bid', 'deal_id');
	}


}